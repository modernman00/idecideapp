<?php

declare(strict_types=1);

namespace App\controller;

use Src\{CheckToken, Limiter, Select, Utility};
use Src\functionality\SendEmailFunctionality;
use Src\Recaptcha;

use Src\functionality\SubmitPostData;

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
        if ($_SESSION['QUESTION_PROCESS'] !== 'ENABLED') {
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

    public function testPost()
    {
        $remove = ['confirm_password', 'token',  'grecaptcharesponse'];
        $minMax = [
            'data' => ['email',  'james'],
            'min' => [3,  5],
            'max' => [50,  100],
        ];
        $ALLOWED_TABLES = ['account1', 'account2', 'account3'];
        $filename = 'children';
        $imgPath = 'public/images/testPost/';
        SubmitPostData::submitToMultipleTable($ALLOWED_TABLES, $minMax, $remove, $filename, $imgPath, "account2");
    }

    public function testGet()
    {
        BaseController::viewWithCsp('result2');
    }

    public function postContact()
    {
        Recaptcha::verifyCaptcha($_POST);
        Limiter::limit('email');
        CheckToken::tokenCheck();

        // build the email data 
        $emailData = [
            'name' => checkInput($_POST['name']),
            'email' => checkInputEmail($_POST['email']),
            'message' => checkInput($_POST['message']),
        ];

        $subject = "Contact from {$_POST['name']}";
        SendEmailFunctionality::email('msg/contact', $subject, $emailData, 'member');
        unset($_SESSION['token']);
        Utility::msgSuccess(200, 'Message sent successfully');
    }
}
