<?php

declare(strict_types=1);

namespace App\controller;

use Src\{CheckToken, CorsHandler, Delete, Exceptions\NotFoundException, Exceptions\UnauthorisedException, FileUploader, LoginUtility, SelectFn, DeleteFn, SubmitForm, Update, Utility};
use Src\functionality\middleware\GetRequestData;
use Src\functionality\SubmitPostData;

class BlogController
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


        try {
            $input = GetRequestData::getRequestData();
 
            // Define min and max limits for input data
            $minMaxData = [
                'data' => ['title', 'content'],
                'min' => [5, 10],
                'max' => [100, 5000],
            ];

            
            $sanitisedData['author_id'] = $_SESSION['ID'];
            // Sanitize input data
            $sanitisedData = LoginUtility::getSanitisedInputData($input, $minMaxData);

            $sFile = $input['files'] ?? null;

            if($sFile){
                $getProcessedFileName = SubmitPostData::submitImgDataSingle('public/images/blog/', 'blogImg', $_ENV['FILE_UPLOAD_CLOUDMERSIVE'], $sFile);
                $sanitisedData['blogImg'] =  $getProcessedFileName;  
            }

            // create a tablename and tabledata array
            $tableName = self::BLOG_TABLE;
            $tableData = $sanitisedData;
            $data = [$tableName => $tableData];

            SubmitPostData::submit($data, $sanitisedData);


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
            // Verify the blog post exists and belongs to the user
            $blogData = SelectFn::selectOneRow(self::BLOG_TABLE, 'id', $id);

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
        CorsHandler::setHeaders();

        try {
            // Define min and max limits for input data
            $id = $id['id'];
            $minMaxData = [
                'data' => ['title', 'content'],
                'min' => [5, 10],
                'max' => [100, 5000],
            ];

            // Sanitize input data
            $sanitisedData = LoginUtility::getSanitisedInputData($_POST, $minMaxData);

            // Ensure user is logged in
            $authorId = $_SESSION['ID'] ?? null;
            if (!$authorId) {
                Utility::msgException(401, 'You must be logged in to edit a blog post');
            }

            // Verify the blog post exists and belongs to the user
            $blogData = SelectFn::selectOneRow(self::BLOG_TABLE, 'id', $id);

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
            $update->updateMultiplePOST($data, 'id');

            Utility::msgSuccess(200, 'Blog post updated successfully');

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
        CorsHandler::setHeaders();

        try {
            // Ensure user is logged in
            $id = Utility::checkInput($id['id']);
            // $authorId = $_SESSION['ID'] ?? null;
            // if (!$authorId) {
            //     throw new UnauthorisedException('You must be logged in to delete a blog post');
            // }

            // Verify the blog post exists and belongs to the user
            $blogData = SelectFn::selectOneRow(self::BLOG_TABLE, 'id', $id);

            if (empty($blogData)) {
                throw new NotFoundException('Blog post not found');
            }

            // Delete the blog post
            $result = DeleteFn::deleteOneRow(self::BLOG_TABLE, 'id', $id);

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
            // // Ensure user is logged in
            // $authorId = $_SESSION['ID'] ?? null;
            // if (!$authorId) {
            //     throw new UnauthorisedException('You must be logged in to view blog management');
            // }

            // select all blogs from database

            $blogs = SelectFn::selectAllRows(self::BLOG_TABLE);
            BaseController::viewWithCsp('blogMgt', compact('blogs'));
        } catch (\Throwable $th) {
            Utility::showError($th);
        }
    }
}
