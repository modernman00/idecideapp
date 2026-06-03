<?php

declare(strict_types=1);

namespace App\controller;


use Src\functionality\{
    LogoutFunctionality,
    LoginFunctionality,
    SubmitPostData,
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
            LoginFunctionality::login(isCaptchaV3: true, captchaAction:'LOGIN');
        } catch (\Throwable $th) {
            Utility::showError($th);
        }
    }

    public function userLoginShow()
    {
        try {
            BaseController::viewWithCsp('acctMgt.user_login');
        } catch (\Throwable $th) {
            Utility::showError($th);
        }
    }

    public function userLoginPost()
    {
        try {
            LoginFunctionality::login(isCaptchaV3: true, captchaAction:'LOGIN');
        } catch (\Throwable $th) {
            Utility::showError($th);
        }
    }

    public function registerShow()
    {
        try {
            BaseController::viewWithCsp('acctMgt.register');
        } catch (\Throwable $th) {
            Utility::showError($th);
        }
    }

    public function registerPost()
    {
        try {
            $removeKey = ['button', 'token', 'grecaptcharesponse', 'confirm_password'];
            
            //get name from post data
            $name = checkInput($_POST['name']);

            //generate id
            $id = $this->setId(name: $name, table: 'account');

            $_POST['id'] = $id;
            
            $returnLastId = SubmitPostData::submitToOneTablenImage(
                table: 'account',
                removeKeys: $removeKey,
                isCaptchaV3: true,
                captchaAction: 'REGISTER'
            );

            if ($returnLastId) {
                // Initialize user profile for gamification
                $pdo = \Src\Db::connect2();
                $pdo->prepare("INSERT INTO user_profiles (user_id, points, level) VALUES (?, 0, 1)")
                    ->execute([$returnLastId]);
                
                Utility::msgSuccess(200, 'Registration successful! Please login.', $returnLastId);
            }
        } catch (\Throwable $th) {
            Utility::showError($th);
        }
    }



    public function showForgot()
    {
        try {
            $verify = $_GET['verify'] ?? null;
            if(!$verify){
                redirect('/adminlogin');
            }
            PasswordRecoveryService::show('acctMgt.forgot');
        } catch (\Throwable $th) {
            Utility::showError($th);
        }
    }

    public function postForgot()
    {
        try {

            PasswordRecoveryService::process(isCaptchaV3: true, captchaAction:'FORGOT');
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

                // GET ALL USERS
                $users = SelectFn::selectAllRows('account');

                // GET ALL DECISIONS (Activities)
                $decisions = SelectFn::selectAllRows('user_decisions');

                BaseController::viewWithCsp('admin/adminpage', compact('blogs', 'users', 'decisions'));
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
