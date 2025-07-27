<?php

declare(strict_types=1);

namespace App\controller;

use Src\CheckToken;
use Src\Delete;
use Src\Exceptions\NotFoundException;
use Src\Exceptions\UnauthorisedException;
use Src\FileUploader;
use Src\Sanitise\CheckSanitise;
use Src\Select;
use Src\SubmitForm;
use Src\Update;
use Src\Utility;

class BlogController extends Select
{
    private const BLOG_TABLE = 'blogs';
    private const VIEW_PATH = 'blog';

    /**
     * Display the form to create a new blog post.
     */
    public function show(): void
    {
        try {
            BaseController::viewWithCsp('create_blog');
        } catch (\Throwable $e) {
            showError($e);
        }
    }

    public function showById($id)
    {
        // find by id

        $query = self::formAndMatchQuery(
            selection: 'SELECT_ONE',
            table: self::BLOG_TABLE,
            identifier1: 'id'
        );
        $blog = self::selectFn2($query, [$id])[0] ?? null;

        BaseController::viewWithCsp('blog-show', compact('blog'));
    }

    /**
     * Create a new blog post.
     */
    public function post()
    {
        header('Access-Control-Allow-Origin: ' . getenv('APP_URL'));
        header('Content-Type: application/json; charset=UTF-8');
        header('Access-Control-Allow-Methods: POST');
        header('Access-Control-Max-Age: 3600');
        header('Access-Control-Allow-Headers: Content-Type, Access-Control-Allow-Headers, Authorization, X-Requested-With');

        try {
            if (!$_POST) {
                throw new NotFoundException('There was no post data', 1);
            }
            // Define min and max limits for input data
            $minMaxData = [
                'data' => ['title', 'content'],
                'min' => [5, 10],
                'max' => [100, 5000],
            ];

            // Sanitize input data
            $sanitisedData = CheckSanitise::getSanitisedInputData($_POST, $minMaxData);

            // Ensure user is logged in and get author ID
            $authorId = $_SESSION['ID'] ?? 'author';
            if (!$authorId) {
                throw new UnauthorisedException('You must be logged in to create a blog post');
            }

            // Prepare data for insertion
            $data = [
                'title' => $sanitisedData['title'],
                'content' => $sanitisedData['content'],
                'author_id' => $authorId,
                'created_at' => date('Y-m-d H:i:s'),
            ];

            if (empty($_FILES['blogImg'])) {
                throw new NotFoundException('No files uploaded', 500);
            }

            CheckToken::tokenCheck();

            $getProcessedFileName = FileUploader::fileUploadSingle('public/images/blog/', 'blogImg', $_ENV['FILE_UPLOAD_CLOUDMERSIVE']);

            $fileName = $getProcessedFileName;
            $data['blogImg'] = Utility::checkInputImage(\str_replace(' ', '', $fileName));

            SubmitForm::submitForm(self::BLOG_TABLE, $data);

            Utility::msgSuccess(201, ' Successfully created blog post');
        } catch (\Throwable $th) {
            showError($th);
        }
    }

    /**
     * Display the form to edit an existing blog post.
     *
     * @param int $id Blog post ID
     */
    public function showEditForm($id)
    {
        try {
            $id = $id['id'];
            // Fetch blog post data
            $query = $this->formAndMatchQuery(
                selection: 'SELECT_ONE',
                table: self::BLOG_TABLE,
                identifier1: 'id'
            );
            $blogData = $this->selectFn2($query, [$id]);

            if (empty($blogData)) {
                msgException(404, 'Blog post not found');
            }

            // // Ensure the user is authorized to edit
            // $authorId = $_SESSION['ID'] ?? null;
            // if ($blogData[0]['author_id'] !== $authorId) {
            //     msgException(403, "You are not authorized to edit this blog post");
            // }

            $formAction = "/blog/edit/{$id}";
            $data = $blogData[0];
            BaseController::viewWithCsp('blogEdit', compact('formAction', 'data'));
        } catch (\Throwable $e) {
            showError($e);
        }
    }

    /**
     * Update an existing blog post.
     *
     * @param int $id Blog post ID
     */
    public function edit($id): void
    {
        header('Access-Control-Allow-Origin: ' . getenv('APP_URL'));
        header('Content-Type: application/json; charset=UTF-8');
        header('Access-Control-Allow-Methods: POST');
        header('Access-Control-Max-Age: 3600');
        header('Access-Control-Allow-Headers: Content-Type, Access-Control-Allow-Headers, Authorization, X-Requested-With');

        try {
            // Define min and max limits for input data
            $id = $id['id'];
            $minMaxData = [
                'data' => ['title', 'content'],
                'min' => [5, 10],
                'max' => [100, 5000],
            ];

            // Sanitize input data
            $sanitisedData = CheckSanitise::getSanitisedInputData($_POST, $minMaxData);

            // Ensure user is logged in
            $authorId = $_SESSION['ID'] ?? null;
            if (!$authorId) {
                Utility::msgException(401, 'You must be logged in to edit a blog post');
            }

            // Verify the blog post exists and belongs to the user
            $query = $this->formAndMatchQuery(
                selection: 'SELECT_ONE',
                table: self::BLOG_TABLE,
                identifier1: 'id'
            );
            $blogData = $this->selectFn2($query, [$id]);

            if (empty($blogData)) {
                throw new NotFoundException('Blog post not found');
            }

            // if ($blogData[0]['author_id'] !== $authorId) {
            //     msgException(403, "You are not authorized to edit this blog post");
            // }

            // Prepare data for update
            $data = [
                'id' => $id,
                'title' => $sanitisedData['title'],
                'content' => $sanitisedData['content'],
                'updated_at' => date('Y-m-d H:i:s'),
            ];

            // Update the blog next
            $update = new Update(self::BLOG_TABLE);
            $result = $update->updateMultiplePOST($data, 'id');

            if ($result) {
                Utility::msgSuccess(200, 'Blog post updated successfully');
            } else {
                Utility::msgException(500, 'Failed to update blog post');
            }
            header('Location: /blogMgt');
            exit;
        } catch (\Throwable $th) {
            Utility::showError($th);
        }
    }

    /**
     * Delete a blog post.
     *
     * @param int $id Blog post ID
     */
    public function delete($id): void
    {
        header('Access-Control-Allow-Origin: ' . getenv('APP_URL'));
        header('Content-Type: application/json; charset=UTF-8');
        header('Access-Control-Allow-Methods: POST');
        header('Access-Control-Max-Age: 3600');
        header('Access-Control-Allow-Headers: Content-Type, Access-Control-Allow-Headers, Authorization, X-Requested-With');

        try {
            // Ensure user is logged in
            $id = $id['id'];
            $authorId = $_SESSION['ID'] ?? null;
            if (!$authorId) {
                throw new UnauthorisedException('You must be logged in to delete a blog post');
            }

            // Verify the blog post exists and belongs to the user
            $query = $this->formAndMatchQuery(
                selection: 'SELECT_ONE',
                table: self::BLOG_TABLE,
                identifier1: 'id'
            );
            $blogData = $this->selectFn2($query, [$id]);

            if (empty($blogData)) {
                throw new NotFoundException('Blog post not found');
            }

            // Delete the blog post
            $delete = new Delete(self::BLOG_TABLE);
            $query = $delete::formAndMatchQuery(
                selection: 'DELETE_ONE',
                table: self::BLOG_TABLE,
                identifier1: 'id'
            );
            $result = $delete::deleteFn($query, [$id]);

            if ($result) {
                Utility::msgSuccess(200, 'Blog post deleted successfully');
            } else {
                Utility::msgException(500, 'Failed to delete blog post');
            }
        } catch (\Throwable $th) {
            Utility::showError($th);
        }
    }

    public function blogMgt(): void
    {
        try {
            // Ensure user is logged in
            $authorId = $_SESSION['ID'] ?? null;
            if (!$authorId) {
                throw new UnauthorisedException('You must be logged in to view blog management');
            }

            // select all blogs from database
            $query = $this->formAndMatchQuery(
                selection: 'SELECT_ALL',
                table: self::BLOG_TABLE
            );
            $blogs = $this->selectFn2($query);
            BaseController::viewWithCsp('blogMgt', compact('blogs'));
        } catch (\Throwable $th) {
            Utility::showError($th);
        }
    }
}
