<?php

declare(strict_types=1);

namespace App\Controller;

use Src\CorsHandler;
use Src\LogoutService;
use Monolog\Logger;
use Monolog\Level;
use Monolog\Handler\StreamHandler;
use Symfony\Component\EventDispatcher\EventDispatcher;
use Src\RedirectInterface;


class LogoutController extends BaseController
{


public function signout(array $redirect): void
{
  // printArr($redirect);
  $redirect = $redirect['redirect'] ?? '/'; // Default to 'home' if not provided
    try {
        CorsHandler::setHeaders();

        // Setup logger
        $logger = new Logger('logout');
        $logger->pushHandler(new StreamHandler(
            __DIR__ . $_ENV['LOGGER_PATH'],
            Level::Debug
        ));

        $dispatcher = new EventDispatcher();
        $redirector = new RedirectInterface(); // implements RedirectInterface

        $logoutService = new LogoutService($logger, $dispatcher, $redirector);
        $logoutService->logout($redirect);

    } catch (\Throwable $e) {
        // Optionally log error
        exit;
    }
}

}
