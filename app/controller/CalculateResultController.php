<?php

declare(strict_types=1);

namespace App\controller;

use Src\Exceptions\ValidationException;
use Src\Utility;

/**
 * Class CalculateResultController
 * Handles the calculation of purchase decision scores based on user input.
 */
class CalculateResultController
{
    public static function process()
    {
        try {
            // Get input data
            $input = json_decode(file_get_contents('php://input'), true);
        
            if (!$input || !isset($input['whatToBuy']) || !isset($input['scores'])) {
                throw new ValidationException('Invalid Input data');
            }
            $whatToBuy = htmlspecialchars($input['whatToBuy'], ENT_QUOTES, 'UTF-8');
            $scores = $input['scores'];
            $notes = htmlspecialchars($input['notes'] ?? '', ENT_QUOTES, 'UTF-8');

            // Validate scores
            $requiredKeys = ['cost', 'buyingFeeling', 'notImpulsive', 'necessity', 'option', 'paymentSource', 'affordability', 'concerns'];
            foreach ($requiredKeys as $key) {
                if (!isset($scores[$key]) || !is_numeric($scores[$key])) {
                    throw new ValidationException("Missing or Invalid score for $key");
                }
            }

            // Scoring logic
            $noQuestions = 9;
            $maxScoreQ = 5;
            $maxScore = $noQuestions * $maxScoreQ;
            $adjustedScores = $scores;

            if ($scores['paymentSource'] <= 2) {
                $adjustedScores['affordability'] = min($scores['affordability'], 2);
            }
            if ($scores['cost'] <= 2) {
                $adjustedScores['affordability'] = min($scores['affordability'], 2);
            }
            if ($scores['concerns'] <= 2) {
                $adjustedScores['paymentSource'] = min($scores['paymentSource'], 3);
            }
            if ($scores['concerns'] <= 2 && $scores['necessity'] <= 2) {
                $adjustedScores['buyingFeeling'] = min($scores['buyingFeeling'], 2);
            }
            if ($scores['notImpulsive'] <= 2) {
                $adjustedScores['necessity'] = max($scores['necessity'] - 1, 2);
            }
            //🔹 If the user has many alternatives, the item may be less essential.
            if ($scores['option'] >= 4) {
                $adjustedScores['necessity'] = max($adjustedScores['necessity'] - 1, 1);
            }
            //Flag High Impulse + Low Concerns as Risky
            if ($scores['cost'] >= 4 && $scores['necessity'] <= 2) {
                $adjustedScores['buyingFeeling'] = min($adjustedScores['buyingFeeling'], 3);
            }
            //Cap Affordability When Payment Source is Non-Sustainable (e.g., Borrowing)
            if ($scores['paymentSource'] <= 2) {
                $adjustedScores['affordability'] = min($adjustedScores['affordability'], 2);
            }

            $weights = [
                'cost' => 1.4,
                'necessity' => 1.5,
                'affordability' => 1.3,
                'notImpulsive' => 1.2,
                'option' => 1.1,
                'concerns' => 1.1,
                'buyingFeeling' => 1.0,
                'paymentSource' => 1.2,
            ];

            $weightedTotal = 0;
            $maxWeightedScore = 0;

            foreach ($adjustedScores as $key => $value) {
                $weight = $weights[$key] ?? 1;
                $weightedTotal += intval($value) * $weight; // total weighted score
                $maxWeightedScore += $maxScoreQ * $weight; // total max weighted score
            }

            $finalScore = ($weightedTotal / $maxWeightedScore) * 100;
            $finalScore = round($finalScore, 1);

            // Generate AI Advice (Budget Boss)
            $aiAdvice = \App\services\AIService::getDecisionAdvice($whatToBuy, $scores, $notes);

            //summary of what influenced their result most.
            $influences = [];
            foreach ($adjustedScores as $key => $value) {
                $weight = $weights[$key] ?? 1;
                $scoreFraction = $value * $weight;
                $weightFraction = $maxScoreQ * $weight;
                $impact = round($scoreFraction / $weightFraction * 100); // normalized
                $influences[] = [
                    'label' => ucfirst($key),
                    'impact' => $impact,
                    'score' => $value,
                    'weight' => $weight,
                ];
            }

            // Sort by impact descending
            usort($influences, fn ($a, $b) => $b['impact'] <=> $a['impact']);

            // Decision tiers
            $decisions = [
                [
                    'minScore' => 85,
                    'decision' => 'GREEN LIGHT ON! 🚦 - STRONG BUY ✅',
                    'comment' => "The $whatToBuy fits great with your budget and what you need!",
                    'color' => 'success',
                    'badgeText' => '💰 Conscious Spender',
                    'badgeClass' => 'badge-success',
                    'resultImage' => 'public/images/THUMBS_UP.jpg',
                ],
                [
                    'minScore' => 70,
                    'decision' => 'WORTH CONSIDERING! 🛠️ THEN CHECK, AND BUY! 💭',
                    'comment' => "Buying the $whatToBuy seems like a good decision—just double-check that it is affordable!",
                    'color' => 'success-light',
                    'badgeText' => '🧠 Savvy Planner',
                    'badgeClass' => 'badge-success-light',
                    'resultImage' => 'public/images/BUY_DECISION.jpg',
                ],
                [
                    'minScore' => 50,
                    'decision' => 'RECONSIDER ⚖️ OR MAYBE LATER! ⏳',
                    'comment' => "Pause on the $whatToBuy. Make sure it’s a need, not just a want!",
                    'color' => 'warning',
                    'badgeText' => '🧠 Budget Boss',
                    'badgeClass' => 'badge-warning',
                    'resultImage' => 'public/images/standing_scales.jpg',
                ],
                [
                    'minScore' => 1,
                    'decision' => 'HOLD OFF! 🛑 AND DON’T BUY ❌',
                    'comment' => "Skip the $whatToBuy to avoid financial stress!",
                    'color' => 'danger',
                    'badgeText' => '🚫 Frugal Friend',
                    'badgeClass' => 'badge-danger',
                    'resultImage' => 'public/images/disapproval.jpg',
                ],
            ];

            // Filter and get the FIRST tier where score >= minScore (sorted high-to-low)
            $filtered = array_filter($decisions, fn ($d) => $finalScore >= $d['minScore']);
            $decisionData = reset($filtered); // Gets the FIRST matching tier

            // Generate Product Recommendations for affiliate links ONLY if score >= 70 (BUY)
            $recommendations = [];
            if ($finalScore >= 70) {
                $recommendations = \App\services\AIService::getProductRecommendations($whatToBuy);
            }

            $scoreData = [
                'decision' => $decisionData['decision'],
                'score' => $finalScore,
                'color' => $decisionData['color'],
                'comment' => $decisionData['comment'],
                'badgeText' => $decisionData['badgeText'],
                'badgeClass' => $decisionData['badgeClass'],
                'resultImage' => $decisionData['resultImage'],
                'itemToBuy' => $whatToBuy,
                'aiAdvice' => $aiAdvice,
                'influences' => $influences,
                'recommendations' => $recommendations,
            ];

            // --- THE DECISION VAULT ---
            // Only attempt verification if the auth cookie exists to avoid 401 errors for guests
            $tokenName = $_ENV['COOKIE_TOKEN_LOGIN'] ?? 'auth_token';
            $user = null;
            if (isset($_COOKIE[$tokenName])) {
                $user = \Src\functionality\SignIn::verify('users');
            }

            if (!empty($user) && is_array($user)) {
                $pdo = \Src\Db::connect2();
                $isPublic = isset($_POST['isPublic']) ? 1 : 0;
                $stmt = $pdo->prepare("INSERT INTO user_decisions (user_id, item_to_buy, score, decision_json, is_public) VALUES (?, ?, ?, ?, ?)");
                $stmt->execute([$user['id'], $whatToBuy, $finalScore, json_encode($scoreData), $isPublic]);
                
                // Gamification: Award points
                $points = ($finalScore < 50) ? 20 : 5; // More points for NOT buying impulsively
                $pdo->prepare("UPDATE user_profiles SET points = points + ? WHERE user_id = ?")
                    ->execute([$points, $user['id']]);
            }

            // create a session to that will initiate result page
            $_SESSION['QUESTION_PROCESS'] = 'ENABLED';

            Utility::msgSuccess(200, $scoreData);
        } catch (\Throwable $e) {
            Utility::showError($e);
        }
    }
}
