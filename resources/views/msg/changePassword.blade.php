@php
    $formattedDate = date('jS \of F Y h:i:sa');
    $forgotUrl = ($_ENV['APP_URL'] ?? env('APP_URL') ?? 'https://idecide.app') . '/forgot';
@endphp
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
  <meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>iDecide Security Alert: Password Changed</title>
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
      font-size: 26px;
      font-weight: 800;
      letter-spacing: 0.05em;
      margin: 0 0 10px 0;
      font-family: -apple-system, BlinkMacSystemFont, 'Outfit', 'Inter', sans-serif;
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

          <!-- Security Title Capsule -->
          <div class="token-capsule">
            <p class="token-title">🔐 SECURITY NOTICE</p>
            <p class="token-code">PASSWORD UPDATED</p>
            <p class="token-expiry">📅 Actioned on: {{ $formattedDate }}</p>
          </div>
        </td>
      </tr>

      <!-- White Body Section -->
      <tr>
        <td class="body-white">
          <!-- Info Alert Box -->
          <div class="alert-box">
            <h4 class="alert-title">Your account password has just been changed</h4>
            <p class="alert-desc">
              Please be informed that your account login credentials were modified on:<br />
              <strong style="color: #0f172a; font-family: monospace;">{{ $formattedDate }}</strong>.<br /><br />
              <span style="color: #ef4444; font-weight: 700;">If you did not initiate this change, please recover your account immediately.</span>
            </p>
          </div>

          <!-- Action Button -->
          <div style="text-align: center;">
            <a href="{{ $forgotUrl }}" class="btn-capsule">&rarr; Reset / Secure your account</a>
          </div>
          
          <p class="expiry-muted">Need additional help? Please contact our support team immediately.</p>
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
