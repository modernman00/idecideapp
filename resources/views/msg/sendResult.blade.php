@extends('email')

@section('subject', 'SUBJECT: Your Decision Matrix Result')

@section('content')
<table border="0" cellpadding="0" cellspacing="0" width="100%" class="card" style="padding: 20px; box-shadow: 0 4px 20px rgba(0,0,0,0.1);">
  <tr>
    <td>
      <h2 style="margin: 0 0 10px;">Your Decision Matrix Result</h2>
      <p class="text">Thank you for using our decision matrix tool. Here are your results:</p>

      

      <!-- Chart and Image Row -->
      <table border="0" cellpadding="0" cellspacing="0" width="100%" style="margin-bottom: 20px;">
        <tr>
          <td align="center" style="padding: 10px; width: 50%;">
            <!-- Smiley Container -->

            @php
              $score = (int) $data['score'];
              $iconUrl = match (true) {
              $score >= 0 && $score < 50 => 'https://i.postimg.cc/yNt4MfzM/disapproval.jpg',
              $score >= 50 && $score < 70 => 'https://i.postimg.cc/C5DFP3Br/OPTIONS.jpg',
              $score >= 70 && $score < 85 => 'https://i.postimg.cc/Z5hRWkX4/BUY-DECISION.jpg',
              $score >= 85 && $score < 100 => 'https://i.postimg.cc/J03fBMB8/showing-thumbs-up.webp',
              };
     
              $scoreColor = match (true) {
                  $score < 50  => '#dc3545', // Red (Don't Buy)
                  $score < 70  => '#ffc107', // Amber (Reconsider)
                  $score < 85  => '#17a2b8', // Teal (Positive leaning)
                  $score < 100 => '#28a745', // Green (Buy)
                  default      => '#6c757d', // Grey fallback
              };

              $shareUrl = urlencode($_ENV['APP_URL']);

              $scoreText = "I scored {$score}% on the iDecide matrix!";
              $decisionText = "Recommendation: {$decision}.";
              $fullMessage = urlencode("{$scoreText} {$decisionText} Try it: {$_ENV['APP_URL']}");

            @endphp


          <table role="presentation" width="100%" cellpadding="0" cellspacing="0" style="text-align: center;">
            <tr>


              <td width="50%" style="padding: 10px;">
                <img src="{{ $iconUrl }}" alt="Left image" width="100" style="display: block; margin: 0 auto;">
              </td>


               <td align="center"
                  style="background-color: {{ $scoreColor }};
                    color: #fff;
                    font-family: Arial, sans-serif;
                    font-size: 30px;
                    font-weight: bold;
                    padding: 12px 24px;
                    border-radius: 40px;">
                  Score: {{ $score }}% 
              </td>


            </tr>
          </table>

          </td>
          </tr>
          </table>

          <!-- Results List -->
          <table border="0" cellpadding="0" cellspacing="0" width="100%" class="results-table" style="margin-top: 20px;">

            <tr>
              <td>
                <strong class="highlight">Decision:</strong> 
                <span class="decision-highlight" style="color: {{ $data['color'] == 'success' ? '#198754' : ($data['color'] == 'success-light' ? '#28a745' : ($data['color'] == 'warning' ? '#ffc107' : '#dc3545')) }};">{{ $data['decision'] }}</span>
              </td>
            </tr>
            <tr>
              <td>
                <strong class="highlight">Comments:</strong> 
                <span>{{ $data['comment'] }}</span>
              </td>
            </tr>
            <tr>
              <td>
                <strong class="highlight">Personalised Advice:</strong> 
                <span>{{ $data['advice'] }}</span>
              </td>
            </tr>
            <tr><td>
              <ul>
                @foreach ($data['personalisedAdvice'] as $advice)
                  <li>{{ $advice }}</li>
                @endforeach
              </ul>
            </td></tr>
          </table>


          <!-- CTA Button -->
          <table border="0" cellpadding="0" cellspacing="0" width="100%">
            <tr>
              <td align="center" style="padding: 20px 0;">
                <a href="{{ $_ENV['APP_URL']}}/#questions" class="btn"><span style="color: #fff;">Take Quiz Again</span></a>
              </td>
            </tr>
          </table>



        <!-- Share icons -->
              <p style="text-align: center; margin-top: 30px; font-size: 14px; color: #555;">Share your result:</p>
                <p style="text-align: center;">
                  <!-- Twitter -->
                  <a href="https://twitter.com/intent/tweet?text={{ $fullMessage }}"
                    target="_blank" rel="noopener noreferrer" style="margin: 0 5px;">
                    <img src="https://cdn-icons-png.flaticon.com/24/733/733579.png" alt="Twitter" title="Share on Twitter">
                  </a>

                  <!-- WhatsApp -->
                  <a href="https://wa.me/?text={{ $fullMessage }}"
                    target="_blank" rel="noopener noreferrer" style="margin: 0 5px;">
                    <img src="https://cdn-icons-png.flaticon.com/24/733/733585.png" alt="WhatsApp" title="Share on WhatsApp">
                  </a>

                  <!-- Facebook -->
                  <a href="https://www.facebook.com/sharer/sharer.php?u={{ $shareUrl }}"
                    target="_blank" rel="noopener noreferrer" style="margin: 0 5px;">
                    <img src="https://cdn-icons-png.flaticon.com/24/733/733547.png" alt="Facebook" title="Share on Facebook">
                  </a>

                  <!-- LinkedIn -->
                  <a href="https://www.linkedin.com/shareArticle?mini=true&url={{ $shareUrl }}&summary={{ $fullMessage }}"
                    target="_blank" rel="noopener noreferrer" style="margin: 0 5px;">
                    <img src="https://cdn-icons-png.flaticon.com/24/733/733561.png" alt="LinkedIn" title="Share on LinkedIn">
                  </a>

                  <!-- Reddit -->
                  <a href="https://www.reddit.com/submit?url={{ $shareUrl }}&title={{ $fullMessage }}"
                    target="_blank" rel="noopener noreferrer" style="margin: 0 5px;">
                    <img src="https://cdn-icons-png.flaticon.com/24/2111/2111589.png" alt="Reddit" title="Share on Reddit">
                  </a>
                </p>


    </td>
  </tr>
</table>
@endsection

@section('textFallback')
Your Decision Matrix Result

Thank you for using our decision matrix tool. Here are your results:

Score: {{ $data['score'] }}%
Decision: {{ $data['decision'] }}
Comments: {{ $data['comments'] }}
Personalized Advice: {{ $data['advice'] }}

@foreach ($data['personalisedAdvice'] as $advice)
  - {{ $advice }}
@endforeach

Take Quiz Again: https://yourdomain.com/#questions
Share your result:
- Twitter: {{ $data['twitterShare'] }}
- WhatsApp: {{ $data['whatsappShare'] }}
- Facebook: {{ $data['facebookShare'] }}
- LinkedIn: {{ $data['linkedinShare'] }}
- Reddit: {{ $data['redditShare'] }}

Kindest Regards,
iDecide Team
@endsection