<?php

declare(strict_types=1);

namespace App\config;

// Session handling with improved conditions

if (session_status() !== PHP_SESSION_ACTIVE) {
    session_start([
    'cookie_httponly' => true,  // Blocks JavaScript access
        'cookie_secure' => false,  // Only enable if using HTTPS!
        // 'use_strict_mode' => true  // Prevents session fixation attacks
    ]);
}

use App\classes\ErrorHandler;

require_once __DIR__ . '/_env.php';

define('BR', '<br>');
define('URL', $_ENV['APP_URL'] ?? '');

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

// Initialize ErrorHandler with the new implementation
// $errorHandler = new ErrorHandler();
// $errorHandler->outputError(__DIR__ . '/../../bootstrap/log');
