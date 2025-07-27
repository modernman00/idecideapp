<?php

declare(strict_types=1);

namespace App\controller;

use Src\Exceptions\NotFoundException;
use Src\LoginUtility;
use Src\Sanitise\CheckSanitise;
use Src\Token;
use Src\Utility;

// Remove the Location import since we won't be using it

class ForgotController extends BaseController
{
    public function show()
    {
        try {
            BaseController::viewWithCsp('forgot');
        } catch (\Throwable $e) {
            showError($e);
        }
    }

    public function post()
    {
        try {
            header('Access-Control-Allow-Origin: ' . $_ENV['APP_URL']);
            header('Content-Type: application/json; charset=UTF-8');
            header('Access-Control-Allow-Methods: POST');
            header('Access-Control-Max-Age: 3600');
            header('Access-Control-Allow-Headers: Content-Type, Access-Control-Allow-Headers, Authorization, X-Requested-With');

            if (!$_POST) {
                throw new NotFoundException('There was no post data');
            }

            // sanitise $_POST email
            $sanitisedData = CheckSanitise::getSanitisedInputData($_POST);

            $data = LoginUtility::useEmailToFindData($sanitisedData);

            if (empty($data)) {
                throw new NotFoundException('User not found');
            }

            //  Token::generateSendTokenEmail($data, 'token');

            $_SESSION['FORGOT'] = 'enabled';
            $_SESSION['email'] = $data['email'];

            // redirect to the password change page

            header('Location: /passwordChange');

            exit;
        } catch (\Throwable $th) {
            Utility::showError($th);
        }
    }
}
