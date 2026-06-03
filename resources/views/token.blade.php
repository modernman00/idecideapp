@php
    $token = $data['token'] ?? '';
    $spacedCode = implode(' ', str_split(strval($token)));
    $loginUrl = ($_ENV['APP_URL'] ?? env('APP_URL'] ?? 'https://idecide.app') . '/login';
@endphp
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
  <meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Your One-Time Login Token</title>
  <style>
    body {
      margin: 0;
      padding: 0;
      background-color: #f1f5f9;
      font-family: -apple-system, BlinkMacSystemFont, 'Outfit', 'Inter', 'Segoe UI', Roboto, sans-serif;
      color: #1e293b;
      -webkit-font-smoothing: antialiased;
    }
    table {
      border-collapse: collapse;
      mso-table-lspace: 0pt;
      mso-table-rspace: 0pt;
    }
    img {
      border: 0;
      height: auto;
      line-height: 100%;
      outline: none;
      text-decoration: none;
    }
    .wrapper {
      width: 100%;
      background-color: #f1f5f9;
      padding-top: 40px;
      padding-bottom: 40px;
    }
    .main-card {
      background-color: #ffffff;
      border-radius: 28px;
      box-shadow: 0 12px 30px rgba(15, 23, 42, 0.08);
      overflow: hidden;
      max-width: 540px;
      width: 100%;
      margin: 0 auto;
    }
    .header-dark {
      background-color: #0f172a;
      padding: 45px 35px 35px 35px;
      text-align: center;
    }
    .logo-container {
      margin-bottom: 12px;
    }
    .logo-text {
      font-size: 26px;
      font-weight: 800;
      color: #ffffff;
      letter-spacing: -0.03em;
      vertical-align: middle;
      display: inline-block;
    }
    .badge-ai {
      background-color: #fbbf24;
      color: #0f172a;
      font-size: 11px;
      font-weight: 800;
      padding: 3px 8px;
      border-radius: 8px;
      margin-left: 8px;
      vertical-align: middle;
      display: inline-block;
      letter-spacing: 0.02em;
    }
    .divider {
      border-bottom: 1px solid rgba(255, 255, 255, 0.08);
      margin: 20px auto;
      width: 70%;
    }
    .subtitle {
      color: #94a3b8;
      font-size: 13px;
      font-weight: 500;
      letter-spacing: 0.05em;
      margin: 0;
    }
    .token-capsule {
      background-color: rgba(255, 255, 255, 0.05);
      border: 1px solid rgba(255, 255, 255, 0.08);
      border-radius: 40px;
      padding: 24px 20px;
      margin: 30px auto 10px;
      width: 85%;
    }
    .token-title {
      color: #fbbf24;
      font-size: 11px;
      font-weight: 800;
      letter-spacing: 0.15em;
      margin: 0 0 10px 0;
    }
    .token-code {
      color: #ffffff;
      font-size: 38px;
      font-weight: 800;
      letter-spacing: 0.2em;
      margin: 0 0 10px 0;
      font-family: 'Courier New', Courier, monospace;
    }
    .token-expiry {
      color: #94a3b8;
      font-size: 12px;
      margin: 0;
    }
    .body-white {
      padding: 40px 35px 30px 35px;
    }
    .alert-box {
      background-color: #f8fafc;
      border-left: 4px solid #fbbf24;
      border-radius: 4px 16px 16px 4px;
      padding: 20px 24px;
      margin-bottom: 30px;
      text-align: left;
    }
    .alert-title {
      font-size: 16px;
      font-weight: 800;
      color: #0f172a;
      margin: 0 0 8px 0;
    }
    .alert-desc {
      font-size: 14px;
      color: #475569;
      line-height: 1.6;
      margin: 0;
    }
    .btn-capsule {
      background-color: #1e293b;
      color: #ffffff !important;
      font-size: 15px;
      font-weight: 700;
      text-decoration: none;
      padding: 14px 28px;
      border-radius: 100px;
      display: inline-block;
      margin: 0 auto;
      text-align: center;
      letter-spacing: 0.02em;
    }
    .expiry-muted {
      color: #94a3b8;
      font-size: 12px;
      margin-top: 15px;
      margin-bottom: 30px;
      text-align: center;
    }
    .footer-white {
      border-top: 1px solid #f1f5f9;
      padding: 30px 35px 40px 35px;
      text-align: center;
    }
    .footer-slogan {
      font-size: 13px;
      font-weight: 700;
      color: #64748b;
      margin: 0 0 12px 0;
    }
    .footer-signature {
      font-size: 13px;
      color: #94a3b8;
      margin: 0 0 25px 0;
      line-height: 1.5;
    }
    .footer-signature strong {
      color: #475569;
    }
    .disclaimer-divider {
      border-top: 1px solid #e2e8f0;
      margin: 25px 0;
    }
    .disclaimer-text {
      font-size: 11px;
      color: #94a3b8;
      line-height: 1.6;
      margin: 0;
      text-align: center;
    }
    @media only screen and (max-width: 600px) {
      .main-card {
        border-radius: 0;
      }
      .body-white {
        padding: 30px 20px;
      }
      .token-capsule {
        width: 95%;
      }
    }
  </style>
</head>
<body>
  <div class="wrapper">
    <table class="main-card" border="0" cellpadding="0" cellspacing="0" align="center">
      <!-- Dark Header Card -->
      <tr>
        <td class="header-dark">
          <div class="logo-container">
            <span class="logo-text">iDecide</span>
          </div>
          <div class="divider"></div>
          <p class="subtitle">Make Smarter Purchases &middot; beat impulse buying</p>

          <!-- Token Capsule -->
          <div class="token-capsule">
            <p class="token-title">🔐 ONE-TIME LOGIN TOKEN</p>
            <p class="token-code">{{ $spacedCode }}</p>
            <p class="token-expiry">⏳ valid for the next 10 minutes</p>
          </div>
        </td>
      </tr>

      <!-- White Body Section -->
      <tr>
        <td class="body-white">
          @if ($token)
            <!-- Info Alert Box -->
            <div class="alert-box">
              <h4 class="alert-title">Use this token to access your account</h4>
              <p class="alert-desc">
                Enter <strong style="background-color: #e2e8f0; border-radius: 6px; padding: 2px 8px; font-family: monospace; font-size: 14px; color: #334155;">{{ $token }}</strong> on the login page within ten minutes.<br />
                <span style="color: #3b82f6; font-weight: 700;">Never share this code with anyone.</span>
              </p>
            </div>

            <!-- Button Wrapper -->
            <div style="text-align: center;">
              <a href="{{ $loginUrl }}" class="btn-capsule">&rarr; Continue to your account</a>
            </div>
            
            <p class="expiry-muted">The token expires at <strong>10 minutes from request</strong> for security.</p>
          @else
            <div class="alert-box" style="border-left-color: #ef4444;">
              <h4 class="alert-title" style="color: #ef4444;">Authentication Error</h4>
              <p class="alert-desc">There was an unexpected problem with generating your secure authentication token. Please request a new token.</p>
            </div>
          @endif
        </td>
      </tr>

      <!-- Footer Section -->
      <tr>
        <td class="footer-white">
          <p class="footer-slogan">Empowering you to stay rational and beat impulse buying.</p>
          <p class="footer-signature">
            Kindest Regards,<br />
            <strong>iDecide Team</strong>
          </p>
          <div class="disclaimer-divider"></div>
          <p class="disclaimer-text">
            Internet communications are not secure. iDecide accepts no legal responsibility for the contents of this message. You received this because you requested a decision matrix report.
          </p>
        </td>
      </tr>
    </table>
  </div>
</body>
</html>