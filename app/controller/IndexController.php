<?php

namespace App\controller;

use Src\{Utility, Select};

class IndexController extends BaseController
{
    public function main()
    {
        try {
            BaseController::viewWithCsp('main');
        } catch (\Throwable $th) {
            Utility::showError($th);
        }
    }

    public function result()
    {


        if ($_SESSION['QUESTION_PROCESS'] !== "ENABLED") {
            header('Location: /');
            exit;
        }

        BaseController::viewWithCsp('result');
    }

    // terms

    public function terms()
    {
        BaseController::viewWithCsp('terms');
    }

    public function privacy()
    {
        BaseController::viewWithCsp('privacy');
    }

    // contact
    public function contact()
    {
        BaseController::viewWithCsp('contact');
    }

    // about
    public function about()
    {
        BaseController::viewWithCsp('about');
    }

    // blog
    public function blogs()
    {

        $query = Select::formAndMatchQuery(selection: 'SELECT_ALL', table: 'blogs');
        $blogs = Select::selectFn2(query: $query);

        // get all the blogs from database

        BaseController::viewWithCsp('blogs', compact('blogs'));
    }
}
