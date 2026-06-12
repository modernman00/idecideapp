<?php

declare(strict_types=1);

namespace App\controller;

use Src\{CheckToken, Limiter, Select, Utility};
use Src\functionality\SendEmailFunctionality;
use Src\functionality\SignIn;
use Src\functionality\SubmitPostData;
use Src\Recaptcha;
use Src\SelectFn;

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

    public function blogs()
    {
        $query = Select::formAndMatchQuery(selection: 'SELECT_ALL', table: 'blogs');
        $blogs = Select::selectFn2(query: $query);

        // get all the blogs from database

        BaseController::viewWithCsp('blogs', compact('blogs'));
    }

    public function community()
    {
        try {
            $pdo = \Src\Db::connect2();
            // Anonymized public decisions
            $stmt = $pdo->prepare("SELECT item_to_buy, score, decision_json, created_at FROM user_decisions WHERE is_public = 1 ORDER BY created_at DESC LIMIT 50");
            $stmt->execute();
            $decisions = $stmt->fetchAll();
            BaseController::viewWithCsp('community', compact('decisions'));
        } catch (\Throwable $th) {
            Utility::showError($th);
        }
    }

    public function history()
    {
        try {
            // Soft-check for cookie before hard verification to avoid 401 JSON error on timeout
            $tokenName = $_ENV['COOKIE_TOKEN_LOGIN'] ?? 'auth_token';
            if (!isset($_COOKIE[$tokenName])) {
                header('Location: /login');
                exit;
            }

            $user = SignIn::verify('users');
            if (empty($user)) {
                header('Location: /login');
                exit;
            }
        
            $id = (string) $user['id'];

            $pdo = \Src\Db::connect2();
            
            $stmt1 = $pdo->prepare("SELECT * FROM user_decisions WHERE user_id = ?");
            $stmt1->execute([$id]);
            $decisions = $stmt1->fetchAll(\PDO::FETCH_ASSOC);
            
            $stmt2 = $pdo->prepare("SELECT * FROM user_profiles WHERE user_id = ?");
            $stmt2->execute([$id]);
            $userProfile = $stmt2->fetchAll(\PDO::FETCH_ASSOC);

            BaseController::viewWithCsp('history', compact('decisions', 'userProfile'));
        } catch (\Throwable $th) {
            error_log('History Page Error: ' . $th->getMessage());
            Utility::showError($th);
        }
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
