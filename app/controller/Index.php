<?php

namespace App\controller;

class Index 
{

    // public function homePage()
    // {
     
    //     return view('main');
    // }

    public function main()
    {
        return view('main');
    }

    public function result()
    {
        return view('result');
    }

    // terms

    public function terms ()
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
        return view('blogs');
    }

}
   
