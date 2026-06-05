<?php

declare(strict_types=1);

namespace App\controller;


use App\controller\BaseController;
use Src\{Utility, SelectFn};
use Src\functionality\{ LogoutFunctionality, LoginFunctionality, SignIn, PasswordRecoveryService, PasswordResetFunctionality, PwdRecoveryCodeFunctionality };
use Src\functionality\SubmitPostData;


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
            LoginFunctionality::login(isCaptchaV3: true);
        } catch (\Throwable $th) {
            showError($th);
        }
    }

    public function userLoginShow()
    {
        try {
            BaseController::viewWithCsp('acctMgt.user_login');
        } catch (\Throwable $th) {
            showError($th);
        }
    }

    public function userLoginPost()
    {
        try {
            LoginFunctionality::login(isCaptchaV3: true);
        } catch (\Throwable $th) {
            showError($th);
        }
    }

    public function registerShow()
    {
        try {
            BaseController::viewWithCsp('acctMgt.register');
        } catch (\Throwable $th) {
            showError($th);
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
                isCaptchaV3: true
            );

            if ($returnLastId) {
                // Initialize user profile for gamification
                $pdo = \Src\Db::connect2();
                $pdo->prepare("INSERT INTO user_profiles (user_id, points, level) VALUES (?, 0, 1)")
                    ->execute([$returnLastId]);
                
                msgSuccess(200, 'Registration successful! Please login.', $returnLastId);
            }
        } catch (\Throwable $th) {
            showError($th);
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
            showError($th);
        }
    }

    public function postForgot()
    {
        try {

            PasswordRecoveryService::process(isCaptchaV3: true, captchaAction:'FORGOT');
        } catch (\Throwable $th) {
            showError($th);
        }
    }

    // show code page 
    public function showCode()
    {
        try {
            PwdRecoveryCodeFunctionality::show('acctMgt/code');
        } catch (\Throwable $th) {
            showError($th);
        }
    }

    public function postCode()
    {
        try {
            PwdRecoveryCodeFunctionality::process();
        } catch (\Throwable $th) {
            showError($th);
        }
    }

    public function postResendCode()
    {
        try {
            $email = $_SESSION['auth']['email'] ?? null;
            $id = $_SESSION['auth']['identifyCust'] ?? null;

            if (!$email || !$id) {
                throw new \Src\Exceptions\UnauthorisedException('Session expired or invalid. Please log in again.');
            }

            $data = ['id' => $id, 'email' => $email];
            $pathToSentCodeNotification = $_ENV['PATH_TO_SENT_CODE_NOTIFICATION'];

            \Src\Token::generateSendTokenEmail($data, $pathToSentCodeNotification);

            msgSuccess(200, 'Verification code resent successfully.', '');
        } catch (\Throwable $th) {
            showError($th);
        }
    }

    public function showChangePassword()
    {
        try {
            PasswordResetFunctionality::show('acctMgt/changePassword');
        } catch (\Throwable $th) {
            showError($th);
        }
    }

    public function postChangePassword()
    {
        try {
            PasswordResetFunctionality::process();
        } catch (\Throwable $th) {
            showError($th);
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

    /**
     * Initializes the Google OAuth flow.
     */
    public function googleAuth()
    {
        try {
            $provider = new \League\OAuth2\Client\Provider\Google([
                'clientId'     => $_ENV['GOOGLE_CLIENT_ID'],
                'clientSecret' => $_ENV['GOOGLE_CLIENT_SECRET'],
                'redirectUri'  => $_ENV['GOOGLE_REDIRECT_URI'],
            ]);

            $authUrl = $provider->getAuthorizationUrl();
            $_SESSION['oauth2state'] = $provider->getState();
            header('Location: ' . $authUrl);
            exit;
        } catch (\Throwable $th) {
            showError($th);
        }
    }

    /**
     * Handles the callback from Google OAuth.
     */
    public function googleCallback()
    {
        try {
            if (!empty($_GET['error'])) {
                // User cancelled or Google returned an error
                redirect('/login?error=google_failed');
                exit;
            }

            $provider = new \League\OAuth2\Client\Provider\Google([
                'clientId'     => $_ENV['GOOGLE_CLIENT_ID'],
                'clientSecret' => $_ENV['GOOGLE_CLIENT_SECRET'],
                'redirectUri'  => $_ENV['GOOGLE_REDIRECT_URI'],
            ]);

            if (empty($_GET['state']) || (isset($_SESSION['oauth2state']) && $_GET['state'] !== $_SESSION['oauth2state'])) {
                if (isset($_SESSION['oauth2state'])) {
                    unset($_SESSION['oauth2state']);
                }
                redirect('/login?error=invalid_state');
                exit;
            }

            $token = $provider->getAccessToken('authorization_code', [
                'code' => $_GET['code']
            ]);

            $ownerDetails = $provider->getResourceOwner($token);
            $email = checkInput($ownerDetails->getEmail());
            $name = checkInput($ownerDetails->getName());

            if (empty($email)) {
                redirect('/login?error=google_missing_info');
                exit;
            }

            // Check if user exists
            $pdo = \Src\Db::connect2();
            $stmt = $pdo->prepare("SELECT id, name, email FROM account WHERE email = ?");
            $stmt->execute([$email]);
            $user = $stmt->fetch(\PDO::FETCH_ASSOC);

            if (!$user) {
                // Register the user securely
                $password = password_hash(bin2hex(random_bytes(8)), PASSWORD_DEFAULT);
                $id = $this->setId(name: $name, table: 'account');
                
                $stmt = $pdo->prepare("INSERT INTO account (id, name, email, password, role) VALUES (?, ?, ?, ?, ?)");
                $stmt->execute([$id, $name, $email, $password, 'user']);

                // Initialize user profile for gamification
                $pdo->prepare("INSERT INTO user_profiles (user_id, points, level) VALUES (?, 0, 1)")
                    ->execute([$id]); // Use $id directly instead of lastInsertId
                    
                $userId = $id;
            } else {
                $userId = $user['id'];
                $name = $user['name']; // Use name from DB
            }

            // Set global login session variables
            $_SESSION['id'] = $userId;
            $_SESSION['user_id'] = $userId;
            $_SESSION['auth'] = [
                'id' => $userId,
                'name' => $name,
                'email' => $email,
                'role' => 'user'
            ];

            // Issue JWT token (required by SignIn::verify)
            $userForJwt = [
                'id' => $userId,
                'email' => $email,
                'role' => 'user'
            ];
            $generatedToken = \Src\JwtHandler::jwtEncodeData($userForJwt);
            $tokenName = $_ENV['COOKIE_TOKEN_LOGIN'] ?? 'auth_token';
            $env = $_ENV['APP_ENV'] ?? 'production';
            $isHttps = !empty($_SERVER['HTTPS']) && $_SERVER['HTTPS'] !== 'off';
            $secure = !in_array($env, ['local', 'development'], true) && $isHttps;
            $domain = parse_url($_ENV['APP_URL'], PHP_URL_HOST);

            setcookie(
                $tokenName,
                $generatedToken,
                time() + (int)($_ENV['COOKIE_EXPIRE'] ?? 2592000),
                '/',
                $domain,
                $secure,
                true
            );

            redirect('/history');
            exit;
            
        } catch (\Throwable $th) {
            // Log the actual error internally so you can see it in logs
            error_log('Google OAuth Error: ' . $th->getMessage());
            
            // Redirect instead of returning a JSON 500 error
            redirect('/login?error=oauth_error');
            exit;
        }
    }
}
