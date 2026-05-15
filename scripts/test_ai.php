<?php

require_once __DIR__ . '/../vendor/autoload.php';
$dotenv = Dotenv\Dotenv::createImmutable(__DIR__ . '/../');
$dotenv->load();

use Src\functionality\AIService;

echo "Testing AI Service...\n";

$item = "Premium Mechanical Keyboard";
$scores = [
    'cost' => 3,
    'buyingFeeling' => 5,
    'notImpulsive' => 2,
    'necessity' => 3,
    'option' => 4,
    'paymentSource' => 5,
    'affordability' => 4,
    'concerns' => 5
];
$notes = "I really want a thocky keyboard for work, but it's \$200.";

try {
    $advice = AIService::getDecisionAdvice($item, $scores, $notes);
    echo "--- AI Advice ---\n";
    echo $advice . "\n";
    echo "-----------------\n";
} catch (\Exception $e) {
    echo "Error: " . $e->getMessage() . "\n";
}
