<?php

require_once __DIR__ . '/../vendor/autoload.php';
$dotenv = Dotenv\Dotenv::createImmutable(__DIR__ . '/../');
$dotenv->load();

class AIServiceMock
{
    public static function testInit()
    {
        $openAIKey = $_ENV['CHATGPT_API'] ?? 'NOT_SET';
        $deepseekKey = $_ENV['DEEPSEEK_API_KEY'] ?? 'NOT_SET';
        
        echo "OpenAI Key: " . (empty($openAIKey) ? "Empty" : "Loaded") . "\n";
        echo "DeepSeek Key: " . (empty($deepseekKey) ? "Empty" : "Loaded") . "\n";
        
        if (!empty($deepseekKey)) {
            echo "Priority: DeepSeek\n";
        } elseif (!empty($openAIKey)) {
            echo "Priority: OpenAI\n";
        } else {
            echo "Priority: None\n";
        }
    }
}

echo "Testing AI Logic (Mock)...\n";
AIServiceMock::testInit();
