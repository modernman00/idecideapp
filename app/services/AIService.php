<?php

declare(strict_types=1);

namespace App\services;

/**
 * Class AIService
 * Handles communication with DeepSeek and OpenAI APIs for decision guidance and content analysis.
 */
class AIService
{
    /**
     * Generates analytical advice for a purchase decision.
     */
    public static function getDecisionAdvice(string $whatToBuy, array $scores, string $notes = ''): string
    {
        $prompt = "As a pragmatic financial advisor (Budget Boss), evaluate this purchase:
        Item: $whatToBuy
        Scores (1-5 scale, where 5 is best/rational):
        - Cost: {$scores['cost']}
        - Necessity: {$scores['necessity']}
        - Affordability: {$scores['affordability']}
        - Impulsiveness: {$scores['notImpulsive']} (5 means not impulsive)
        - Alternatives Available: {$scores['option']}
        - Payment Source: {$scores['paymentSource']} (5 means savings, 1 means borrowing)
        - Personal Concerns: {$scores['concerns']}
        - Emotional Feeling: {$scores['buyingFeeling']} (5 means neutral, 1 means highly emotional)
        
        Additional Notes: $notes

        Provide a 3-sentence maximum 'Budget Boss' verdict. Be sharp, witty, and honest.";

        return self::askAI($prompt);
    }

    /**
     * Generates a 3-bullet point summary for a blog post.
     */
    public static function summarizeBlog(string $content): string
    {
        $prompt = "Summarize the following blog post into exactly 3 punchy bullet points for a quick read:
        
        Content: $content";

        return self::askAI($prompt);
    }

    /**
     * Generates 3 product recommendations for affiliate links.
     */
    public static function getProductRecommendations(string $whatToBuy): array
    {
        $prompt = "The user is looking to buy: $whatToBuy.
        Suggest exactly 3 specific, popular models or versions of this product.
        Categorize them as: 'Value Choice', 'Top Performance', and 'Premium Pick'.
        Return the result as a simple JSON array of objects with keys: 'category', 'model', 'reason'.
        Return ONLY the JSON.";

        $response = self::askAI($prompt);
        // Extract JSON if AI adds markdown
        if (preg_match('/\[.*\]/s', $response, $matches)) {
            $response = $matches[0];
        }
        
        $data = json_decode($response, true);
        return is_array($data) ? $data : [];
    }
    private static function askAI(string $prompt): string
    {
        $deepseekKey = $_ENV['DEEPSEEK_API_KEY'] ?? '';
        $openAIKey = $_ENV['CHATGPT_API'] ?? '';

        if (!empty($deepseekKey)) {
            return self::callDeepSeek($prompt, $deepseekKey);
        } elseif (!empty($openAIKey)) {
            return self::callOpenAI($prompt, $openAIKey);
        }

        return "AI analysis is currently unavailable (API keys not configured).";
    }

    private static function callDeepSeek(string $prompt, string $apiKey): string
    {
        $url = "https://api.deepseek.com/chat/completions";
        $data = [
            "model" => "deepseek-chat",
            "messages" => [
                ["role" => "system", "content" => "You are 'Budget Boss', a sharp, analytical financial advisor. Never mention you are an AI."],
                ["role" => "user", "content" => $prompt]
            ],
            "temperature" => 0.7
        ];

        return self::curlRequest($url, $apiKey, $data, 'deepseek');
    }

    private static function callOpenAI(string $prompt, string $apiKey): string
    {
        $url = "https://api.openai.com/v1/chat/completions";
        $data = [
            "model" => "gpt-4o-mini",
            "messages" => [
                ["role" => "system", "content" => "You are 'Budget Boss', a sharp, analytical financial advisor. Never mention you are an AI."],
                ["role" => "user", "content" => $prompt]
            ]
        ];

        return self::curlRequest($url, $apiKey, $data, 'openai');
    }

    private static function curlRequest(string $url, string $apiKey, array $data, string $provider): string
    {
        $ch = curl_init($url);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($ch, CURLOPT_POST, true);
        curl_setopt($ch, CURLOPT_POSTFIELDS, json_encode($data));
        
        $headers = [
            "Content-Type: application/json",
            "Authorization: Bearer $apiKey"
        ];
        curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
        curl_setopt($ch, CURLOPT_TIMEOUT, 10);

        $response = curl_exec($ch);
        $httpCode = curl_getinfo($ch, CURLINFO_HTTP_CODE);
        curl_close($ch);

        if ($httpCode === 200) {
            $result = json_decode($response, true);
            return $result['choices'][0]['message']['content'] ?? "Error parsing AI response.";
        }

        return "Error: AI Service ($provider) returned status $httpCode.";
    }
}
