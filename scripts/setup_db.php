<?php

require_once __DIR__ . '/../vendor/autoload.php';
$dotenv = Dotenv\Dotenv::createImmutable(__DIR__ . '/../');
$dotenv->load();

$host = '127.0.0.1';
$db   = $_ENV['DB_NAME'];
$user = $_ENV['DB_USERNAME'];
$pass = $_ENV['DB_PASSWORD'];
$charset = 'utf8mb4';

$dsn = "mysql:host=$host;dbname=$db;charset=$charset";

try {
    $pdo = new \PDO($dsn, $user, $pass);

    $sql = "
    CREATE TABLE IF NOT EXISTS user_decisions (
        id INT AUTO_INCREMENT PRIMARY KEY,
        user_id INT NULL,
        item_to_buy VARCHAR(255) NOT NULL,
        score DECIMAL(5,2) NOT NULL,
        decision_json JSON NOT NULL,
        sentiment_score DECIMAL(3,2) DEFAULT 0,
        is_public BOOLEAN DEFAULT FALSE,
        created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
    );

    CREATE TABLE IF NOT EXISTS user_profiles (
        user_id INT PRIMARY KEY,
        points INT DEFAULT 0,
        level INT DEFAULT 1,
        badges JSON NULL
    );

    CREATE TABLE IF NOT EXISTS savings_goals (
        id INT AUTO_INCREMENT PRIMARY KEY,
        user_id INT NOT NULL,
        decision_id INT NOT NULL,
        target_amount DECIMAL(10,2) NOT NULL,
        current_amount DECIMAL(10,2) DEFAULT 0,
        target_date DATE NOT NULL,
        created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
        FOREIGN KEY (decision_id) REFERENCES user_decisions(id)
    );
    ";

    $pdo->exec($sql);
    echo "Database tables created successfully!\n";

} catch (\Exception $e) {
    echo "Error: " . $e->getMessage() . "\n";
}
