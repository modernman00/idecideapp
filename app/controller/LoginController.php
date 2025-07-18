<?php
declare(strict_types=1);

namespace App\controller;

use Src\Utility;
use Src\CheckToken;
use Src\SubmitForm;
use Src\Exceptions\NotFoundException;
use Src\Exceptions\UnauthorisedException;
use Src\Sanitise\CheckSanitise;
use Src\LoginUtility;
use Src\Select;
use Src\Update;
use Src\Delete;

use App\controller\BaseController;


class LoginController extends BaseController
{
    public function show()
    {
        try {
            BaseController::viewWithCsp('login');
        } catch (\Throwable $e) {
            showError($e);
        }
    }

    public function login()
    {
        try {
               header("Access-Control-Allow-Origin: " . getenv("APP_URL"));
        header("Content-Type: application/json; charset=UTF-8");
        header("Access-Control-Allow-Methods: POST");
        header("Access-Control-Max-Age: 3600");
        header("Access-Control-Allow-Headers: Content-Type, Access-Control-Allow-Headers, Authorization, X-Requested-With");


            if (!$_POST) {
                throw new NotFoundException("There was no post data", 1);
            }

                 // Define min and max limits for input data
            $minMaxData = [
                'data' => ['email', 'password'],
                'min' => [5, 5],
                'max' => [30, 100]
            ];

             // Sanitize input data
            $sanitisedData = CheckSanitise::getSanitisedInputData($_POST, $minMaxData);

            $data = LoginUtility::useEmailToFindData($sanitisedData);

            if (empty($data)) {
                throw new NotFoundException("User not found", 404);
            } 

            $validatePsw = LoginUtility::checkPassword($sanitisedData, $data);



            if (!$validatePsw) {
                throw new NotFoundException("Invalid password", 404);
            }

            $_SESSION['ID'] = $data['id'];

            CheckToken::tokenCheck();

            // check if checkbox is ticked 
            if (!isset($_POST['rememberMe'])) {
                $_SESSION['REMEMBER_ME'] = "true";
            }

            session_regenerate_id(true);

            header("Location: /blogMgt");
            exit;

        } catch (\Throwable $e) {
            showError($e);
        }
    }

    public function logout()
    {
        try {
            BaseController::viewWithCsp('login');
        } catch (\Throwable $e) {
            showError($e);
        }
    }
}