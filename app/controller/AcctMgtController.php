<?php

declare(strict_types=1);

namespace App\controller;


use Src\functionality\{
    LogoutFunctionality,
    LoginFunctionality,
    SignIn,
    PasswordRecoveryService,
    PasswordResetFunctionality,
    PwdRecoveryCodeFunctionality
};
use Src\{Utility, SelectFn};


class AcctMgtController extends BaseController
{
    /**
     * Renders the login page.
     *
     * This function calls the static method `viewWithCsp` of the `BaseController` class
     * to render the login page. If an exception is thrown during the rendering process,
     * it is caught and passed to the `showError` function for handling.
     *
     * @throws \Throwable If an error occurs during the rendering process.
     * @return void
     */
    public function loginShow()
    {

        try {

            BaseController::viewWithCsp('acctMgt.login');
        } catch (\Throwable $th) {

            Utility::showError($th);
        }
    }

    /**
     * Handles the login process for a user.
     *
     * This function is responsible for processing the login form submission and
     * authenticating the user. If the login is successful, the user is redirected
     * to their respective page. If the login fails, an error message is displayed.
     *
     * @throws \Throwable If an error occurs during the login process.
     * @return void
     */
    public function loginPost()
    {
        try {
            LoginFunctionality::login();
        } catch (\Throwable $th) {
            Utility::showError($th);
        }
    }



    public function showForgot()
    {
        try {
            $verify = $_GET['verify'] ?? null;
            PasswordRecoveryService::show($verify, 'acctMgt/forgot');
        } catch (\Throwable $th) {
            Utility::showError($th);
        }
    }

    public function postForgot()
    {
        try {

            PasswordRecoveryService::process();
        } catch (\Throwable $th) {
            Utility::showError($th);
        }
    }

    // show code page 
    public function showCode()
    {
        try {
            PwdRecoveryCodeFunctionality::show('acctMgt/code');
        } catch (\Throwable $th) {
            Utility::showError($th);
        }
    }

    public function postCode()
    {
        try {
            PwdRecoveryCodeFunctionality::process();
        } catch (\Throwable $th) {
            Utility::showError($th);
        }
    }

    public function showChangePassword()
    {
        try {
            PasswordResetFunctionality::show('acctMgt/changePassword');
        } catch (\Throwable $th) {
            Utility::showError($th);
        }
    }

    public function postChangePassword()
    {
        try {
            PasswordResetFunctionality::process();
        } catch (\Throwable $th) {
            Utility::showError($th);
        }
    }

      public function adminPage()
    {
        try {
            // Use SignIn to verify user role and authentication
            $VerifyJWT = SignIn::verify('admin');
            if ($VerifyJWT) {
                $_SESSION['role'] = 'admin';

                unset($_SESSION['auth'], $_SESSION['imageUploadOutcome'], $_SESSION['token']);

                // GET THE BLOG DATA 
                $blogs = SelectFn::selectAllRows('blogs');

                BaseController::viewWithCsp('admin/adminpage', compact('blogs'));
            } else {
                redirect('/adminlogin');
            }
        } catch (\Throwable $th) {
            Utility::showError($th);
        }
    }

    /**
     * Logs out a user and redirects them to the managed page.
     *
     * @throws \Throwable If an error occurs during the logout process.
     * @return void
     */
    public function appLogout()
    {
        try {
            LogoutFunctionality::signout(['redirect' => '/managed']);
        } catch (\Throwable $th) {
            Utility::showError($th);
        }
    }
}
