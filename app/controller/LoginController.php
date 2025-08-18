<?php

declare(strict_types=1);

namespace App\controller;

use Src\{
    CheckToken,
    CorsHandler,
    Exceptions\NotFoundException,
    Limiter,
    LoginUtility,
    Recaptcha,
    Sanitise\CheckSanitise as CleanUp,
    Utility
};

class LoginController extends BaseController
{
    public function show()
    {
        try {
            BaseController::viewWithCsp('login');
        } catch (\Throwable $e) {
            Utility::showError($e);
        }
    }

    public function login()
    {
        try {
            CorsHandler::setHeaders(); // Call the static method to set headers
            Recaptcha::verifyCaptcha();

            $email = Utility::cleanSession($_POST['email']) ?? '';

            // Check rate limit
            Limiter::limit($email);

            if (!$_POST) {
                throw new NotFoundException('There was no post data');
            }

            // Define min and max limits for input data
            $minMaxData = [
                'data' => ['email', 'password'],
                'min' => [5, 5],
                'max' => [30, 100],
            ];

            // Sanitize input data
            $sanitisedData = CleanUp::getSanitisedInputData($_POST, $minMaxData);

            $data = LoginUtility::useEmailToFindData($sanitisedData);

            if (empty($data)) {
                throw new NotFoundException('User not found');
            }

            $validatePsw = LoginUtility::checkPassword($sanitisedData, $data);

            if (!$validatePsw) {
                throw new NotFoundException('Invalid password');
            }

            // Clear attempts on successful login
            Limiter::$argLimiter->reset();
            Limiter::$ipLimiter->reset();

            $_SESSION['ID'] = $data['id'];

            CheckToken::tokenCheck();

            // check if checkbox is ticked
            if (!isset($_POST['rememberMe'])) {
                $_SESSION['REMEMBER_ME'] = 'true';
            }

            session_regenerate_id(true);

            \msgSuccess(200, 'Login Successful');
        } catch (\Throwable $e) {
            showError($e);
        }
    }

    public function logout()
    {
        try {
            // create a log out code
        } catch (\Throwable $e) {
            showError($e);
        }
    }
}
