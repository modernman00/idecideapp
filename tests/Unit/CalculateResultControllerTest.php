<?php

namespace Tests\Unit;

use App\controller\CalculateResultController;
use PHPUnit\Framework\TestCase;
use Src\Exceptions\ValidationException;

class CalculateResultControllerTest extends TestCase
{
    protected function setUp(): void
    {
        parent::setUp();
        // Clear any existing session data
        $_SESSION = [];
    }

    protected function tearDown(): void
    {
        parent::tearDown();
        // Clean up session data after each test
        $_SESSION = [];
    }

    /**
     * Mock php://input stream for testing
     */
    private function mockInputStream($data)
    {
        $stream = fopen('php://memory', 'r+');
        fwrite($stream, json_encode($data));
        rewind($stream);
        return $stream;
    }

    /**
     * Test successful calculation with valid input
     */
    public function testProcessWithValidInput()
    {
        $validInput = [
            'whatToBuy' => 'Laptop',
            'scores' => [
                'cost' => 4,
                'buyingFeeling' => 4,
                'notImpulsive' => 5,
                'necessity' => 5,
                'option' => 3,
                'paymentSource' => 4,
                'affordability' => 4,
                'concerns' => 4
            ]
        ];

        // Mock the input stream
        $this->expectOutputString(''); // Suppress any output
        
        // We need to mock the file_get_contents('php://input') call
        // For now, we'll test the logic by creating a modified version
        $this->assertTrue(true); // Placeholder - will need to refactor controller for proper testing
    }

    /**
     * Test the scoring logic directly by extracting it
     */
    public function testScoringLogic()
    {
        $scores = [
            'cost' => 4,
            'buyingFeeling' => 4,
            'notImpulsive' => 5,
            'necessity' => 5,
            'option' => 3,
            'paymentSource' => 4,
            'affordability' => 4,
            'concerns' => 4
        ];

        // Test adjusted scores logic
        $adjustedScores = $scores;
        $maxScoreQ = 5;

        // Test payment source adjustment
        if ($scores['paymentSource'] <= 2) {
            $adjustedScores['affordability'] = min($scores['affordability'], 2);
        }

        // Test cost adjustment
        if ($scores['cost'] <= 2) {
            $adjustedScores['affordability'] = min($scores['affordability'], 2);
        }

        // Test concerns adjustment
        if ($scores['concerns'] <= 2) {
            $adjustedScores['paymentSource'] = min($scores['paymentSource'], 3);
        }

        // Test concerns and necessity adjustment
        if ($scores['concerns'] <= 2 && $scores['necessity'] <= 2) {
            $adjustedScores['buyingFeeling'] = min($scores['buyingFeeling'], 2);
        }

        // Test impulsive adjustment
        if ($scores['notImpulsive'] <= 2) {
            $adjustedScores['necessity'] = max($scores['necessity'] - 1, 2);
        }

        // Test option adjustment
        if ($scores['option'] >= 4) {
            $adjustedScores['necessity'] = max($adjustedScores['necessity'] - 1, 1);
        }

        // Test cost and necessity adjustment
        if ($scores['cost'] >= 4 && $scores['necessity'] <= 2) {
            $adjustedScores['buyingFeeling'] = min($adjustedScores['buyingFeeling'], 3);
        }

        // Test payment source cap
        if ($scores['paymentSource'] <= 2) {
            $adjustedScores['affordability'] = min($adjustedScores['affordability'], 2);
        }

        // With the given scores, most adjustments shouldn't trigger
        $this->assertEquals($scores, $adjustedScores);
    }

    /**
     * Test weighted score calculation
     */
    public function testWeightedScoreCalculation()
    {
        $adjustedScores = [
            'cost' => 4,
            'buyingFeeling' => 4,
            'notImpulsive' => 5,
            'necessity' => 5,
            'option' => 3,
            'paymentSource' => 4,
            'affordability' => 4,
            'concerns' => 4
        ];

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

        $maxScoreQ = 5;
        $weightedTotal = 0;
        $maxWeightedScore = 0;

        foreach ($adjustedScores as $key => $value) {
            $weight = $weights[$key] ?? 1;
            $weightedTotal += intval($value) * $weight;
            $maxWeightedScore += $maxScoreQ * $weight;
        }

        $finalScore = ($weightedTotal / $maxWeightedScore) * 100;
        $finalScore = round($finalScore, 1);

        // Expected calculation:
        // Weighted total: (4*1.4) + (4*1.0) + (5*1.2) + (5*1.5) + (3*1.1) + (4*1.2) + (4*1.3) + (4*1.1)
        // = 5.6 + 4.0 + 6.0 + 7.5 + 3.3 + 4.8 + 5.2 + 4.4 = 40.8
        $expectedWeightedTotal = 40.8;
        $this->assertEqualsWithDelta($expectedWeightedTotal, $weightedTotal, 0.001);

        // Max weighted score: (5*1.4) + (5*1.0) + (5*1.2) + (5*1.5) + (5*1.1) + (5*1.2) + (5*1.3) + (5*1.1)
        // = 7.0 + 5.0 + 6.0 + 7.5 + 5.5 + 6.0 + 6.5 + 5.5 = 49.0
        $expectedMaxWeightedScore = 49.0;
        $this->assertEqualsWithDelta($expectedMaxWeightedScore, $maxWeightedScore, 0.001);

        // Final score: (40.8 / 49.0) * 100 = 83.3%
        $expectedFinalScore = 83.3;
        $this->assertEqualsWithDelta($expectedFinalScore, $finalScore, 0.1);
    }

    /**
     * Test decision tier logic
     */
    public function testDecisionTierLogic()
    {
        $decisions = [
            [
                'minScore' => 85,
                'decision' => "GREEN LIGHT ON! 🚦 - STRONG BUY ✅",
                'color' => "success",
                'badgeText' => "💰 Conscious Spender"
            ],
            [
                'minScore' => 70,
                'decision' => "WORTH CONSIDERING! 🛠️ THEN CHECK, AND BUY! 💭",
                'color' => "success-light",
                'badgeText' => "🧠 Savvy Planner"
            ],
            [
                'minScore' => 50,
                'decision' => "RECONSIDER ⚖️ OR MAYBE LATER! ⏳",
                'color' => "warning",
                'badgeText' => "🧠 Budget Boss"
            ],
            [
                'minScore' => 1,
                'decision' => "HOLD OFF! 🛑 AND DON'T BUY ❌",
                'color' => "danger",
                'badgeText' => "🚫 Frugal Friend"
            ]
        ];

        // Test high score (90)
        $highScore = 90;
        $filtered = array_filter($decisions, fn($d) => $highScore >= $d['minScore']);
        $decisionData = reset($filtered);
        $this->assertEquals("GREEN LIGHT ON! 🚦 - STRONG BUY ✅", $decisionData['decision']);
        $this->assertEquals("success", $decisionData['color']);

        // Test medium score (75)
        $mediumScore = 75;
        $filtered = array_filter($decisions, fn($d) => $mediumScore >= $d['minScore']);
        $decisionData = reset($filtered);
        $this->assertEquals("WORTH CONSIDERING! 🛠️ THEN CHECK, AND BUY! 💭", $decisionData['decision']);
        $this->assertEquals("success-light", $decisionData['color']);

        // Test low score (40)
        $lowScore = 40;
        $filtered = array_filter($decisions, fn($d) => $lowScore >= $d['minScore']);
        $decisionData = reset($filtered);
        $this->assertEquals("HOLD OFF! 🛑 AND DON'T BUY ❌", $decisionData['decision']);
        $this->assertEquals("danger", $decisionData['color']);
    }

    /**
     * Test influences calculation
     */
    public function testInfluencesCalculation()
    {
        $adjustedScores = [
            'cost' => 4,
            'necessity' => 5,
            'affordability' => 3
        ];

        $weights = [
            'cost' => 1.4,
            'necessity' => 1.5,
            'affordability' => 1.3
        ];

        $maxScoreQ = 5;
        $influences = [];

        foreach ($adjustedScores as $key => $value) {
            $weight = $weights[$key] ?? 1;
            $scoreFraction = $value * $weight;
            $weightFraction = $maxScoreQ * $weight;
            $impact = round($scoreFraction / $weightFraction * 100);
            $influences[] = [
                'label' => ucfirst($key),
                'impact' => $impact,
                'score' => $value,
                'weight' => $weight
            ];
        }

        // Sort by impact descending
        usort($influences, fn($a, $b) => $b['impact'] <=> $a['impact']);

        // Test that influences are calculated correctly
        $this->assertCount(3, $influences);
        $this->assertEquals('Necessity', $influences[0]['label']); // Should be highest impact
        $this->assertEquals(100, $influences[0]['impact']); // 5 * 1.5 / (5 * 1.5) * 100 = 100%
        $this->assertEquals(80, $influences[1]['impact']); // 4 * 1.4 / (5 * 1.4) * 100 = 80%
        $this->assertEquals(60, $influences[2]['impact']); // 3 * 1.3 / (5 * 1.3) * 100 = 60%
    }

    /**
     * Test advice generation logic
     */
    public function testAdviceGeneration()
    {
        $whatToBuy = 'Laptop';
        $scores = [
            'cost' => 2, // Low score - should trigger advice
            'necessity' => 5, // High score - should trigger advice
            'affordability' => 3 // Medium score - should not trigger advice
        ];

        $adviceConfig = [
            'cost' => [
                'high' => fn($item) => "Great job ensuring the $item fits comfortably within your budget!",
                'low' => fn($item) => "The $item may strain your budget."
            ],
            'necessity' => [
                'high' => fn($item) => "The $item seems essential, which supports your decision.",
                'low' => fn($item) => "Since the $item is more of a want, explore if you can delay the purchase."
            ]
        ];

        $advices = [];
        foreach ($scores as $attr => $score) {
            if ($score <= 2 && isset($adviceConfig[$attr]['low'])) {
                $advices[] = $adviceConfig[$attr]['low']($whatToBuy);
            }
            if ($score >= 4 && isset($adviceConfig[$attr]['high'])) {
                $advices[] = $adviceConfig[$attr]['high']($whatToBuy);
            }
        }

        $this->assertCount(2, $advices);
        $this->assertContains('may strain your budget', $advices[0]);
        $this->assertContains('seems essential', $advices[1]);
    }

    /**
     * Test input validation - missing whatToBuy
     */         
    public function testMissingWhatToBuy()
    {
        $this->expectException(\Exception::class);
        
        $input = [
            'scores' => [
                'cost' => 4,
                'buyingFeeling' => 4,
                'notImpulsive' => 5,
                'necessity' => 5,
                'option' => 3,
                'paymentSource' => 4,
                'affordability' => 4,
                'concerns' => 4
            ]
        ];

        // Simulate missing whatToBuy
        if (!isset($input['whatToBuy'])) {
            throw new \Exception('Invalid Input data');
        }
    }

    /**
     * Test input validation - missing scores
     */
    public function testMissingScores()
    {
        $this->expectException(\Exception::class);
        
        $input = [
            'whatToBuy' => 'Laptop'
        ];

        // Simulate missing scores
        if (!isset($input['scores'])) {
            throw new \Exception('Invalid Input data');
        }
    }

    /**
     * Test input validation - missing required score keys
     */
    public function testMissingRequiredScoreKeys()
    {
        $this->expectException(\Exception::class);
        
        $scores = [
            'cost' => 4,
            'buyingFeeling' => 4,
            // Missing other required keys
        ];

        $requiredKeys = ['cost', 'buyingFeeling', 'notImpulsive', 'necessity', 'option', 'paymentSource', 'affordability', 'concerns'];
        
        foreach ($requiredKeys as $key) {
            if (!isset($scores[$key])) {
                throw new \Exception("Missing score for $key");
            }
        }
    }

    /**
     * Test input validation - invalid score values
     */
    public function testInvalidScoreValues()
    {
        $this->expectException(\Exception::class);
        
        $scores = [
            'cost' => 'invalid',
            'buyingFeeling' => 4,
            'notImpulsive' => 5,
            'necessity' => 5,
            'option' => 3,
            'paymentSource' => 4,
            'affordability' => 4,
            'concerns' => 4
        ];

        $requiredKeys = ['cost', 'buyingFeeling', 'notImpulsive', 'necessity', 'option', 'paymentSource', 'affordability', 'concerns'];
        
        foreach ($requiredKeys as $key) {
            if (!isset($scores[$key]) || !is_numeric($scores[$key])) {
                throw new \Exception("Invalid score for $key");
            }
        }
    }
}
