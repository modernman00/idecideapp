<?php

namespace App\controller;

use App\classes\CheckToken;
use Src\Select;


class IndexController
{

    public function main()
    {
        return view('main');
    }

    public function result()
    {
        // only show result if the session is set
        if (($_SESSION['QUESTION_PROCESS']) == false) {
            // redirect to main page if session is not set
            header('Location: /');
            exit;
        }

        return view('result');
    }

    // terms

    public function terms()
    {
        return view('terms');
    }

    public function privacy()
    {
        return view('privacy');
    }

    // contact 
    public function contact()
    {
        return view('contact');
    }

    // about
    public function about()
    {
        return view('about');
    }

    // blog
    public function blogs()
    {

        $query = Select::formAndMatchQuery(selection: 'SELECT_ALL', table: 'blogs');
        $blogs = Select::selectFn2(query: $query);
 
        // get all the blogs from database

        return view('blogs', compact('blogs'));
    }
}
