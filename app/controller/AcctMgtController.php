<?php

declare(strict_types=1);

namespace App\controller;


use Src\ErrorReporting;

use Src\functionality\{
    LogoutFunctionality,
    LoginFunctionality,
    SignIn,
    PasswordRecoveryService,
    PasswordResetFunctionality,
    PwdRecoveryCodeFunctiionality
};

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
     
            BaseController::viewWithCsp('acctMgt/login');
        } catch (\Throwable $th) {

            showError($th);
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
            showError($th);
        }
    }



    public function adminPage()
    {
        try {
            // Use SignIn to verify user role and authentication
            SignIn::verify();
            BaseController::viewWithCsp('admin/index');
        } catch (\Throwable $th) {
            showError($th);
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
            showError($th);
        }
    }

    public function forgot()
    {
        try {
            $verify = $_GET['verify'] ?? null;
            PasswordRecoveryService::show($verify, 'acctMgt/forgot');
        } catch (\Throwable $th) {
            showError($th);
        }
    }

    public function forgotPost()
    {
        try {

            PasswordRecoveryService::process('msg/code');
        } catch (\Throwable $th) {
            showError($th);
        }
    }

    // show code page 
    public function code()
    {
        try {
            PwdRecoveryCodeFunctiionality::show('acctMgt/code');
        } catch (\Throwable $th) {
            showError($th);
        }
    }

    public function codePost()
    {
        try {
            PwdRecoveryCodeFunctiionality::process();
        } catch (\Throwable $th) {
            showError($th);
        }
    }

    public function changePassword()
    {
        try {
            PasswordResetFunctionality::show('acctMgt/changePassword');
        } catch (\Throwable $th) {
            showError($th);
        }
    }

    public function changePasswordPost()
    {
        try {
            PasswordResetFunctionality::process('msg/changePassword');
        } catch (\Throwable $th) {
            showError($th);
        }
    }
}
