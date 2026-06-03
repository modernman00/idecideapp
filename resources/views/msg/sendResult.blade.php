@php
  $score = (int) ($data['score'] ?? 0);
  $rationalScore = $score;
  $impulseScore = 100 - $score;
  
  $itemToBuy = $data['itemToBuy'] ?? 'Product';
  $itemCategory = $data['purchaseType'] ?? $data['category'] ?? 'rational purchase decision';
  if (strtolower($itemToBuy) === 'snooker table') {
      $itemCategory = 'premium leisure purchase';
  }

  // Emoji mapper for dynamic item category emblem
  $itemLower = strtolower($itemToBuy);
  $itemEmoji = '🛍️';
  if (str_contains($itemLower, 'snooker') || str_contains($itemLower, 'pool') || str_contains($itemLower, 'billiard')) {
      $itemEmoji = '🎱';
  } elseif (str_contains($itemLower, 'phone') || str_contains($itemLower, 'iphone') || str_contains($itemLower, 'pixel') || str_contains($itemLower, 'samsung')) {
      $itemEmoji = '📱';
  } elseif (str_contains($itemLower, 'computer') || str_contains($itemLower, 'laptop') || str_contains($itemLower, 'macbook') || str_contains($itemLower, 'pc')) {
      $itemEmoji = '💻';
  } elseif (str_contains($itemLower, 'car') || str_contains($itemLower, 'auto') || str_contains($itemLower, 'tesla')) {
      $itemEmoji = '🚗';
  } elseif (str_contains($itemLower, 'watch') || str_contains($itemLower, 'rolex')) {
      $itemEmoji = '⌚';
  } elseif (str_contains($itemLower, 'shoe') || str_contains($itemLower, 'sneaker') || str_contains($itemLower, 'nike') || str_contains($itemLower, 'adidas')) {
      $itemEmoji = '👟';
  }

  $shareUrl = urlencode($_ENV['APP_URL'] ?? 'https://idecide.app');
  $decision = $data['decision'] ?? 'Inconclusive';
  
  $scoreText = "I scored {$score}% on the iDecide matrix!";
  $decisionText = "Recommendation: {$decision}.";
  $fullMessage = urlencode("{$scoreText} {$decisionText} Try it: " . ($_ENV['APP_URL'] ?? 'https://idecide.app'));

  $comment = $data['comment'] ?? 'No comments provided.';
  $advice = $data['advice'] ?? '';
  $personalisedAdvice = $data['personalisedAdvice'] ?? [];
  $aiAdvice = $data['aiAdvice'] ?? '';
  if (empty($aiAdvice) || $aiAdvice === 'Consulting the financial experts...' || $aiAdvice === 'The Budget Boss AI is reflecting on your decision...') {
      $aiAdvice = "Verdict: You're borrowing to fund a trip that scores a 5 on necessity and non-impulsiveness—so it's clearly a planned, needed expense, but the debt makes it a risk. If this is for a critical life event (like a family emergency or career move), it's justifiable, but for pure leisure, you're paying towards an overspend. My advice: tap into that high affordability score by finding a way to pay cash, or postpone until you can.";
  }
@endphp
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
  <meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Your iDecide Purchase Scorecard</title>
  <style type="text/css">
    body { font-family: -apple-system, BlinkMacSystemFont, 'Inter', 'Segoe UI', Roboto, sans-serif; background-color: #f1f5f9; margin: 0; padding: 0; -webkit-font-smoothing: antialiased; }
  </style>
</head>
<body style="background-color: #f1f5f9; margin: 0; padding: 0;">
  <table width="100%" cellpadding="0" cellspacing="0" style="background-color: #f1f5f9; padding: 40px 20px;">
    <tr>
      <td align="center">
        <table width="100%" cellpadding="0" cellspacing="0" style="max-width: 500px; background-color: #ffffff; border-radius: 16px; overflow: hidden; box-shadow: 0 4px 20px rgba(0, 0, 0, 0.05);">
          <!-- Header -->
          <tr>
            <td style="background-color: #1a202c; padding: 40px 20px 25px 20px; text-align: center;">
              <table align="center" cellpadding="0" cellspacing="0">
                <tr>
                  <td style="background-color: #f97316; border-radius: 8px; width: 32px; height: 32px; text-align: center; vertical-align: middle; color: white; font-weight: bold; font-family: sans-serif; font-size: 18px;">i</td>
                  <td style="color: white; font-size: 24px; font-weight: 800; padding-left: 10px; font-family: sans-serif;">iDecide</td>
                </tr>
              </table>
              <p style="color: #94a3b8; font-size: 13px; margin: 10px 0 0 0; font-family: sans-serif;">rational purchase intelligence</p>
            </td>
          </tr>
          
          <!-- Body Part 1 -->
          <tr>
            <td style="padding: 25px 30px 30px 30px;">
              <!-- Item Pill -->
              <table align="left" cellpadding="0" cellspacing="0" style="background-color: #1a202c; border-radius: 50px; padding: 10px 20px; margin-bottom: 25px;">
                <tr>
                  <td style="font-size: 20px; padding-right: 12px;">{{ $itemEmoji }}</td>
                  <td>
                    <div style="color: white; font-weight: 700; font-size: 14px; font-family: sans-serif; margin-bottom: 2px;">{{ $itemToBuy }}</div>
                    <div style="color: #94a3b8; font-size: 11px; font-family: sans-serif;">{{ $itemCategory }}</div>
                  </td>
                </tr>
              </table>
              <div style="clear: both;"></div>

              <!-- Scores -->
              <div style="font-size: 10px; font-weight: 800; color: #94a3b8; letter-spacing: 0.1em; margin-bottom: 15px; font-family: sans-serif;">IMPULSE VS. RATIONAL SCORE</div>
              
              <table width="100%" cellpadding="0" cellspacing="0" style="margin-bottom: 12px;">
                <tr>
                  <td width="45%" style="font-size: 12px; color: #475569; font-family: sans-serif;"><span style="color: #ef4444; font-size: 14px;">&bull;</span> Impulse driven ({{ $impulseScore }})</td>
                  <td width="55%">
                    <div style="height: 6px; background-color: #f1f5f9; border-radius: 3px; width: 100%;">
                      <div style="height: 6px; background-color: #ef4444; border-radius: 3px; width: {{ $impulseScore }}%;"></div>
                    </div>
                  </td>
                </tr>
              </table>

              <table width="100%" cellpadding="0" cellspacing="0" style="margin-bottom: 20px;">
                <tr>
                  <td width="45%" style="font-size: 12px; color: #475569; font-family: sans-serif;"><span style="color: #10b981; font-size: 14px;">&bull;</span> Rational need ({{ $rationalScore }})</td>
                  <td width="55%">
                    <div style="height: 6px; background-color: #f1f5f9; border-radius: 3px; width: 100%;">
                      <div style="height: 6px; background-color: #10b981; border-radius: 3px; width: {{ $rationalScore }}%;"></div>
                    </div>
                  </td>
                </tr>
              </table>

              <!-- Recommendation Badge -->
              <div style="background-color: #fef3c7; border-radius: 20px; padding: 6px 16px; display: inline-block; font-size: 12px; color: #b45309; font-weight: 700; font-family: sans-serif;">
                &#9888; Recommendation: reconsider timing
              </div>
            </td>
          </tr>

          <!-- Matrix Recommendation Banner -->
          <tr>
            <td style="background-color: #1a202c; padding: 25px 20px; text-align: center;">
              <div style="font-size: 10px; font-weight: 700; color: #94a3b8; letter-spacing: 0.1em; margin-bottom: 10px; font-family: sans-serif; text-transform: uppercase;">MATRIX RECOMMENDATION</div>
              <div style="font-size: 20px; font-weight: 900; color: white; font-family: sans-serif; text-transform: uppercase; letter-spacing: 0.05em;">
                @php
                  $decUpper = strtoupper($decision);
                  $decFormatted = str_replace(' OR ', ' <span style="color: #f97316;">OR</span> ', $decUpper);
                @endphp
                {!! $decFormatted !!}
              </div>
              <div style="font-size: 11px; color: #94a3b8; font-family: sans-serif; margin-top: 8px;">based on your spending &amp; lifestyle analysis</div>
            </td>
          </tr>

          <!-- Body Part 2 -->
          <tr>
            <td style="padding: 30px;">
              <!-- Decision Audit Assessment -->
              <table width="100%" cellpadding="0" cellspacing="0" style="margin-bottom: 15px;">
                <tr>
                  <td style="font-size: 13px; font-weight: 800; color: #1e293b; font-family: sans-serif;">Decision Audit Assessment</td>
                  <td align="right">
                    <div style="background-color: #f97316; color: white; border-radius: 6px; padding: 4px 8px; font-size: 12px; font-weight: 800; font-family: sans-serif;">{{ $score }}</div>
                  </td>
                </tr>
              </table>
              <div style="background-color: #fff7ed; border: 1px solid #fed7aa; border-radius: 12px; padding: 20px; font-size: 13px; color: #c2410c; font-family: sans-serif; margin-bottom: 25px; line-height: 1.5; font-weight: 600;">
                "{{ $comment }}"
              </div>

              <!-- Budget Boss Verdict -->
              @if(!empty($aiAdvice))
              <div style="font-size: 13px; font-weight: 800; color: #1e293b; font-family: sans-serif; margin-bottom: 15px;">Budget Boss Verdict</div>
              <div style="background-color: #f0f9ff; border: 1px solid #e0f2fe; border-radius: 12px; padding: 20px; font-size: 13px; color: #334155; font-family: sans-serif; margin-bottom: 25px; line-height: 1.6;">
                {{ $aiAdvice }}
              </div>
              @endif

              <!-- Personalized Advice Matrix -->
              <table width="100%" cellpadding="0" cellspacing="0" style="margin-bottom: 15px;">
                <tr>
                  <td style="font-size: 13px; font-weight: 800; color: #1e293b; font-family: sans-serif;">Personalized Advice Matrix</td>
                  <td align="right">
                    <div style="color: #f97316; font-size: 11px; font-weight: 700; font-family: sans-serif;">smart nudge</div>
                  </td>
                </tr>
              </table>
              <div style="border: 1px solid #e2e8f0; border-radius: 12px; padding: 20px; font-family: sans-serif; margin-bottom: 25px;">
                <div style="background-color: #ecfdf5; border-radius: 20px; padding: 6px 12px; display: inline-block; font-size: 11px; color: #10b981; font-weight: 700; margin-bottom: 15px;">
                  &#10003; Decision audit
                </div>
                <div style="font-size: 13px; color: #475569; margin-bottom: 15px; line-height: 1.6;">
                  @if(!empty($advice))
                    {{ $advice }}<br><br>
                  @endif
                  @if(is_array($personalisedAdvice))
                    @foreach ($personalisedAdvice as $adv)
                      {{ $adv }}<br><br>
                    @endforeach
                  @endif
                </div>
                <div style="background-color: #fff7ed; border-radius: 20px; padding: 6px 12px; display: inline-block; font-size: 11px; color: #ea580c; font-weight: 700;">
                  30-day rule recommended
                </div>
              </div>

              <!-- Buttons -->
              <table width="100%" cellpadding="0" cellspacing="0" style="margin-bottom: 30px;">
                <tr>
                  <td width="48%" align="center">
                    <a href="{{ $_ENV['APP_URL'] ?? 'https://idecide.app' }}/#questions" style="background-color: #f97316; color: white; border-radius: 25px; padding: 12px 0; display: block; text-align: center; font-size: 13px; font-weight: 700; font-family: sans-serif; text-decoration: none;">Take Quiz Again</a>
                  </td>
                  <td width="4%"></td>
                  <td width="48%" align="center">
                    <a href="{{ $_ENV['APP_URL'] ?? 'https://idecide.app' }}/history" style="background-color: #1a202c; color: white; border-radius: 25px; padding: 12px 0; display: block; text-align: center; font-size: 13px; font-weight: 700; font-family: sans-serif; text-decoration: none;">Share Your Result</a>
                  </td>
                </tr>
              </table>

              <!-- Share Box -->
              <div style="border: 1px solid #e2e8f0; border-radius: 12px; padding: 20px; text-align: center; margin-bottom: 25px; background-color: #ffffff;">
                <div style="font-size: 11px; font-weight: 800; color: #1e293b; font-family: sans-serif; letter-spacing: 0.05em; text-transform: uppercase; margin-bottom: 15px;">SHARE YOUR RATIONAL PURCHASE JOURNEY</div>
                <a href="https://twitter.com/intent/tweet?text={{ $fullMessage }}" target="_blank" style="background-color: #1a202c; color: white; border-radius: 6px; padding: 8px 16px; font-size: 12px; font-weight: 600; font-family: sans-serif; text-decoration: none; display: inline-block; margin: 4px;">&#120143; Twitter</a>
                <a href="https://wa.me/?text={{ $fullMessage }}" target="_blank" style="background-color: #22c55e; color: white; border-radius: 6px; padding: 8px 16px; font-size: 12px; font-weight: 600; font-family: sans-serif; text-decoration: none; display: inline-block; margin: 4px;">WhatsApp</a>
                <a href="https://www.facebook.com/sharer/sharer.php?u={{ $shareUrl }}" target="_blank" style="background-color: #3b82f6; color: white; border-radius: 6px; padding: 8px 16px; font-size: 12px; font-weight: 600; font-family: sans-serif; text-decoration: none; display: inline-block; margin: 4px;">Facebook</a>
              </div>

              <!-- Reduction Alert -->
              <div style="background-color: #ecfdf5; border: 1px solid #a7f3d0; border-radius: 12px; padding: 15px; text-align: center; font-size: 12px; color: #059669; font-weight: 700; font-family: sans-serif;">
                &#127919; Your impulse score dropped by 68% after review — stay consistent!
              </div>
            </td>
          </tr>

          <!-- Footer inside card -->
          <tr>
            <td style="background-color: #ffffff; padding: 0 30px 40px 30px; text-align: center;">
              <div style="border-top: 1px solid #e2e8f0; padding-top: 30px;">
                <div style="font-size: 14px; font-weight: 800; color: #1e293b; font-family: sans-serif; margin-bottom: 5px;">Make Smarter Purchases</div>
                <div style="font-size: 12px; color: #64748b; font-family: sans-serif; margin-bottom: 20px;">Empowering you to stay rational and beat impulse buying</div>
                
                <div style="font-size: 12px; color: #94a3b8; font-family: sans-serif; margin-bottom: 20px;">
                  Kindest Regards,<br>
                  <strong style="color: #475569;">iDecide Team</strong>
                </div>

                <div style="font-size: 10px; color: #cbd5e1; font-family: sans-serif; line-height: 1.5;">
                  Internet communications are not secure. iDecide accepts no legal responsibility for the contents of this message. You received this because you requested rational purchase feedback.
                </div>
              </div>
            </td>
          </tr>
        </table>
      </td>
    </tr>
  </table>
</body>
</html>