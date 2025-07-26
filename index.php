<?php

declare(strict_types=1);

ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);


use App\routing\RouteDispatch as dispatcher;

include __DIR__ . "/app/config/init.php";

require __DIR__ . "/app/routing/router.php";

$appUrl = $_ENV['APP_URL'];



$getDispatcher = new dispatcher();
$getDispatcher->dispatch($router);

// Add this temporarily to your index.php
