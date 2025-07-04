<?php

namespace App\controller;

use Src\Utility;
use Src\Exceptions\ValidationException;

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
                'paymentSource' => 1.2
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
                    'weight' => $weight
                ];
            }

            // Sort by impact descending
            usort($influences, fn($a, $b) => $b['impact'] <=> $a['impact']);



            // Advice configuration
            $adviceConfig = [
                'cost' => [
                    'high' => fn($item) => "Great job ensuring the $item fits comfortably within your budget! Keep prioritising affordable purchases.",
                    'low' => fn($item) => "The $item may strain your budget. Consider cheaper alternatives or saving up to reduce financial pressure."
                ],
                'buyingFeeling' => [
                    'high' => fn($item) => "This $item could bring you joy, and that’s wonderful! Just make sure it fits comfortably with your financial plans—so you can enjoy it without any worries. You’ve got this!",
                    'low' => fn($item) => "If the $item doesn’t excite you, reflect on whether it’s worth the cost or if another option might be more fulfilling."
                ],
                'notImpulsive' => [
                    'high' => fn($item) => "You’ve thought about the $item for a while, which shows great decision-making. Keep planning carefully.",
                    'low' => fn($item) => "Ooooh, the $item caught your eye just now? That’s exciting! 🎉 Since it’s a new idea, why not sleep on it? If you still love it tomorrow, it’ll feel even better to buy it knowing it’s the right choice. Either way, you win!"
                ],
                'necessity' => [
                    'high' => fn($item) => "The $item seems essential, which supports your decision. Ensure it’s the best option available.",
                    'low' => fn($item) => "Since the $item is more of a want, explore if you can delay the purchase or find a more budget-friendly option."
                ],
                'option' => [
                    'high' => fn($item) => "You’ve researched alternatives for the $item, which is smart! Double-check for any last-minute deals.",
                    'low' => fn($item) => "Not exploring other options for the $item could cost you. Shop around to find the best value."
                ],
                'paymentSource' => [
                    'high' => fn($item) => "Using savings or a gift for the $item is a solid choice! This keeps your finances stable.",
                    'low' => fn($item) => "Borrowing or unclear funding for the $item is risky. Try saving up or using existing funds instead."
                ],
                'affordability' => [
                    'high' => fn($item) => "You can afford the $item without strain—well done! Confirm it fits your long-term budget.",
                    'low' => fn($item) => "The $item may stretch your finances. Build a savings plan or consider a less expensive alternative."
                ],
                'concerns' => [
                    'high' => fn($item) => "With no financial concerns, you’re in a strong position to buy the $item. Stay mindful of future expenses.",
                    'low' => fn($item) => "Your financial concerns suggest caution with the $item. Address debt or job stability before buying."
                ]
            ];


            // Generate advice
            $advices = [];
            foreach ($scores as $attr => $score) {
                if ($score <= 2 && isset($adviceConfig[$attr]['low'])) {
                    $advices[] = $adviceConfig[$attr]['low']($whatToBuy);
                }
                if ($score >= 4 && isset($adviceConfig[$attr]['high'])) {
                    $advices[] = $adviceConfig[$attr]['high']($whatToBuy);
                }
            }
            // // if (count($advice) < 3) {
            // foreach ($scores as $attr => $score) {
            //     if ($score >= 4 && isset($adviceConfig[$attr]['high'])) {
            //         $advice[] = $adviceConfig[$attr]['high']($whatToBuy);
            //         break;
            //     }
            // }
            // // }
            if (empty($advices)) {
                $advice[] = "Reflect on whether the $whatToBuy aligns with your financial priorities and long-term goals.";
            }
            $advices = array_slice($advices, 0, 3);

            // Decision tiers
            $decisions = [
                [
                    'minScore' => 85,
                    'decision' => "GREEN LIGHT ON! 🚦 - STRONG BUY ✅",
                    'comment' => "The $whatToBuy fits great with your budget and what you need!",
                    'color' => "success",
                    'badgeText' => "💰 Conscious Spender",
                    'badgeClass' => "badge-success",
                    'resultImage' => "public/images/THUMBS_UP.jpg",
                    'resultImageAlt' => "Happy Thumbs Up"
                ],
                [
                    'minScore' => 70,
                    'decision' => "WORTH CONSIDERING! 🛠️ THEN CHECK, AND BUY! 💭",
                    'comment' => "The $whatToBuy seems like a great fit—just double-check that it is affordable, and try to get the best deal!",
                    'color' => "success-light",
                    'badgeText' => "🧠 Savvy Planner",
                    'badgeClass' => "badge-success-light",
                    'resultImage' => "public/images/BUY_DECISION.jpg",
                    'resultImageAlt' => "Balanced Decision"
                ],
                [
                    'minScore' => 50,
                    'decision' => "RECONSIDER ⚖️ OR MAYBE LATER! ⏳",
                    'comment' => "Pause on the $whatToBuy. Make sure it’s a need, not just a want, and check for better deals or save more!",
                    'color' => "warning",
                    'badgeText' => "🧠 Budget Boss",
                    'badgeClass' => "badge-warning",
                    'resultImage' => "public/images/standing_scales.jpg",
                    'resultImageAlt' => "Neutral Balance"
                ],
                [
                    'minScore' => 1,
                    'decision' => "HOLD OFF! 🛑 AND DON’T BUY ❌",
                    'comment' => "Skip the $whatToBuy to avoid financial stress and focus on what matters most!",
                    'color' => "danger",
                    'badgeText' => "🚫 Frugal Friend",
                    'badgeClass' => "badge-danger",
                    'resultImage' => "public/images/disapproval.jpg",
                    'resultImageAlt' => "Disapproval"
                ]
            ];

            // Filter and get the FIRST tier where score >= minScore (sorted high-to-low)
            $filtered = array_filter($decisions, fn($d) => $finalScore >= $d['minScore']);
            $decisionData   = reset($filtered); // Gets the FIRST matching tier 

            $scoreData = [
                'decision' => $decisionData['decision'],
                'score' => $finalScore,
                'color' => $decisionData['color'],
                'comment' => $decisionData['comment'],
                'badgeText' => $decisionData['badgeText'],
                'badgeClass' => $decisionData['badgeClass'],
                'resultImage' => $decisionData['resultImage'],
                'resultImageAlt' => $decisionData['resultImageAlt'],
                'itemToBuy' => $whatToBuy,
                'advice' => $advices,
                'influences' => $influences,
            ];

            // create a session to that will initiate result page
            $_SESSION['QUESTION_PROCESS'] = true;


            Utility::msgSuccess(200, $scoreData);
        } catch (\Throwable $e) {
            Utility::showError($e);
        }
    }
}
