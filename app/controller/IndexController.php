<?php

declare(strict_types=1);

namespace App\controller;

use Src\{LoginUtility, Select, Utility, SubmitForm};
use RuntimeException;
use Src\Sanitise\Sanitise;
use Src\functionality\middleware\GetRequestData;

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
        // $post = GetRequestData::getRequestData();

        // $cleanD = LoginUtility::getSanitisedInputData($post);


        // // remove non-essential fields
        // unset($cleanD['account2']['confirm_password'], $cleanD['token']);

        // foreach ($cleanD as $tableName => $tableData) {
        //     $allowedTables = ['account1', 'account2', 'account3', 'account4'];
        //     if (!in_array($tableName, $allowedTables, true)) continue;
        //     if (!SubmitForm::submitForm($tableName, $tableData)) {
        //         throw new RuntimeException("$tableName didn't submit");
        //     } else {
        //         echo "$tableName submitted successfully";
        //     }
        // }
        $remove = ['account2.confirm_password', 'token', 'submit', 'g-recaptcha-response'];
        $minMax = [
            'data' => ['email',  'james'],
            'min' => [3,  5],
            'max' => [50,  100],
        ];
        SubmitPostData::submitToMultipleTable(['account1', 'account2', 'account3'], $minMax, $remove);
    }

    public function testGet()
    {
        BaseController::viewWithCsp('testPost');
    }
}
