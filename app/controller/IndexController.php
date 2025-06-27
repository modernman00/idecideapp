<?php

namespace App\controller;

class IndexController 
{

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

    // email funtionality to send the result to the person
    public function emailResult($email, $decision)
    {
        //1. Sanitise the email and $decision

        //2. Use the email functionality to send  
    }

}
   
