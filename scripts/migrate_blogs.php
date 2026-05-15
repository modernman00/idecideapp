<?php

require_once __DIR__ . '/../vendor/autoload.php';
$dotenv = Dotenv\Dotenv::createImmutable(__DIR__ . '/../');
$dotenv->load();

try {
    $pdo = \Src\Db::connect2();
    
    // Add ai_summary to blogs
    $pdo->exec("ALTER TABLE blogs ADD COLUMN IF NOT EXISTS ai_summary TEXT NULL AFTER content");
    
    echo "Migration completed: added ai_summary column to blogs table.\n";

} catch (\Exception $e) {
    echo "Error: " . $e->getMessage() . "\n";
}
