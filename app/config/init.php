<?php

declare(strict_types=1);

namespace App\config;

// Session handling with improved conditions

if (session_status() !== PHP_SESSION_ACTIVE) {
    $isProd = ($_ENV['APP_ENV'] ?? 'production') === 'production';
    $isHttps = (isset($_SERVER['HTTPS']) && ($_SERVER['HTTPS'] === 'on' || $_SERVER['HTTPS'] === 1)) ||
        (isset($_SERVER['HTTP_X_FORWARDED_PROTO']) && $_SERVER['HTTP_X_FORWARDED_PROTO'] === 'https');

    session_start([
        'cookie_httponly' => true, // prevents XSS attacks from accessing the session cookie
        'cookie_secure' => $isProd && $isHttps, // only send cookie over HTTPS in production
        'cookie_samesite' => 'Lax', // prevents CSRF attacks
        'use_strict_mode' => true, // prevents session fixation attacks
    ]);
}

if (!isset($_SESSION['token'])) {
    $token = bin2hex(random_bytes(32));
    $_SESSION['token'] = $token;

}

if (!isset($_COOKIE['XSRF-TOKEN'])) {
    $token = $_SESSION['token'];
    setcookie('XSRF-TOKEN', $token, [
        'expires' => time() + 900,
        'path' => '/',
        'samesite' => 'Lax',
        'secure' => ($_ENV['APP_ENV'] ?? 'production') === 'production',
        'httponly' => false,
    ]);
    // Manually populate $_COOKIE so it's available for the rest of this request
    $_COOKIE['XSRF-TOKEN'] = $token;
}




require_once __DIR__ . '/_env.php';

define('BR', '<br>');
define('URL', $_ENV['APP_URL'] ?? '');

// Put this right after: include __DIR__ . "/app/config/init.php";
if (file_exists(__DIR__ . '/vendor/modernman00/shared-lib/src/data/EmailData.php') && !class_exists('Src\Data\EmailData', false)) {
    class_alias('Src\data\EmailData', 'Src\Data\EmailData');
}


/*
 * You should use the mb_internal_encoding() function at the top of every PHP script you write (or at the top of your global include script), and the mb_http_output() function right after it if your script is outputting to a browser. Explicitly defining the encoding of your strings in every script will save you a lot of headaches down the road.
 * https://phptherightway.com/
 */
/*
 * Encoding settings as per PHP The Right Way recommendations
 */
mb_internal_encoding('UTF-8');
mb_http_output('UTF-8');

date_default_timezone_set('Europe/London');

// Load environment (from .env or server environment variable)
$env = $_ENV['APP_ENV'] ?: 'production'; // Options: development, staging, production


// Configure error handling based on environment
switch ($env) {
    case 'development':
        ini_set('display_errors', '1');
        ini_set('display_startup_errors', '1');
        error_reporting(E_ALL); // Show everything for debugging
        break;

    case 'staging':
        ini_set('display_errors', '0');
        ini_set('display_startup_errors', '0');
        error_reporting(E_ALL & ~E_DEPRECATED & ~E_NOTICE); // Hide deprecated & notices
        ini_set('log_errors', '1');
        ini_set('error_log', __DIR__ . '/../../bootstrap/log/ini.log');
        break;

    case 'production':
    default:
        ini_set('display_errors', '0');
        ini_set('display_startup_errors', '0');
        error_reporting(E_ALL & ~E_DEPRECATED & ~E_NOTICE); // Hide deprecated & notices
        ini_set('log_errors', '1');
        ini_set('error_log', __DIR__ . '/../../bootstrap/log/ini.log');
        break;
}



// Initialize ErrorHandler with the new implementation
// $errorHandler = new ErrorHandler();
// $errorHandler->outputError(__DIR__ . '/../../bootstrap/log');
