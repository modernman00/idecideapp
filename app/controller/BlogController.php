<?php

declare(strict_types=1);

namespace App\controller;

use Src\{
    Select, 
    CorsHandler, 
    Exceptions\NotFoundException, 
    LoginUtility, 
    SelectFn, 
    DeleteFn, 
    Update, 
    Utility
};
use Src\functionality\{SubmitPostData, UpdateExistingData};

class BlogController extends Select
{
    private const BLOG_TABLE = 'blogs';
    private const VIEW_PATH = 'blog';
     // ✅ Remove 'array' type hint from const
    private const MIN_MAX_DATA = [
        'data' => ['title', 'content'],
        'min' => [5, 10],
        'max' => [100, 5000],
    ];

    /**
     * Display the form to create a new blog post.
     */
    public function showCreateBlog(): void
    {
        try {
            if ($_SESSION['role'] !== 'admin') {
                redirect('/adminlogin');
            }
            BaseController::viewWithCsp('blog/create_blog');
        } catch (\Throwable $e) {
            showError($e);
        }
    }


    /**
     * Create a new blog post.
     */
    public function postCreateBlog()
    {

        $removeKey = ['submit', 'button', 'grecaptcharesponse', 'token'];

        $returnLastId = SubmitPostData::submitToOneTablenImage(
            table: 'blogs',
            removeKeys: $removeKey,
            imgPath: 'public/images/blog/',
            fileName: 'blogImg',
            minMaxData: self::MIN_MAX_DATA
        );
        \msgSuccess(200, 'Blog post created successfully!', $returnLastId);
    }

    public function showById($id)
    {
        // find by id
        $blog = SelectFn::selectOneRow(self::BLOG_TABLE, 'id', $id);
        BaseController::viewWithCsp('blog-show', compact('blog'));
    }

    /**
     * Display the form to edit an existing blog post.
     *
     * @param int $id Blog post ID
     */
    public function showEditForm($id)
    {
        try {
            if ($_SESSION['role'] !== 'admin') {
                redirect('/adminlogin');
            }
            $id = Utility::checkInput($id['id']);

            $blogData = SelectFn::selectOneRow(self::BLOG_TABLE, 'id', $id);

            if (empty($blogData)) {
                throw new NotFoundException('Blog post not found');
            }

            $formAction = "/blog/edit/{$id}";
            $data = $blogData;
            BaseController::viewWithCsp('blog/blogEdit', compact('formAction', 'data'));
        } catch (\Throwable $e) {
            showError($e);
        }
    }

    /**
     * Update an existing blog post.
     *
     * @param int $id Blog post ID
     */
    public function postEditForm($id): void
    {
        $id = Utility::checkInput($id['id']);

        UpdateExistingData::updateData(
            table: self::BLOG_TABLE,
            identifierValue: $id,
            minMaxData: self::MIN_MAX_DATA,
            removeKeys: ['submit', 'button']
        );

        redirect('/adminhome');

    
    }

    /**
     * Delete a blog post.
     *
     * @param int $id Blog post ID
     */
    public function delete($id): void
    {

        try {
            $id = Utility::checkInput($id['id']);

            // Delete the blog post
            $result = DeleteFn::deleteOneRow(self::BLOG_TABLE, 'id', $id);

            if (!$result) {
                Utility::msgException(500, 'Failed to delete blog post');
            } 
            header('Location: /adminhome');
            exit;
        } catch (\Throwable $th) {
            Utility::showError($th);
        }
    }

}
