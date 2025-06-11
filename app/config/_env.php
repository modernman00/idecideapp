<?php
declare(strict_types=1);

use Dotenv\Dotenv;


include __DIR__ . "/../../vendor/autoload.php";


$dotenv = Dotenv::createImmutable(__DIR__ . '/../../'); // Path to your project root
$dotenv->load();

