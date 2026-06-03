<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
  <meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>@yield('subject', 'Your Decision Matrix Result')</title>
  <style nonce="{{ $nonce }}">
    body { margin: 0; padding: 0; background-color: #f1f5f9; font-family: -apple-system, BlinkMacSystemFont, 'Outfit', 'Inter', 'Segoe UI', Roboto, sans-serif; color: #1e293b; -webkit-font-smoothing: antialiased; }
    table { border-collapse: collapse; }
    .wrapper { width: 100%; table-layout: fixed; background-color: #f1f5f9; padding-bottom: 40px; padding-top: 40px; }
    .main-table { background: #ffffff; border-radius: 16px; border-top: 5px solid #4CAF50; box-shadow: 0 10px 30px rgba(0, 0, 0, 0.04); overflow: hidden; max-width: 600px; width: 100%; margin: 0 auto; }
    .header-logo { padding: 35px 40px 20px; text-align: center; }
    .content-area { padding: 0 40px 30px; }
    .footer-area { padding: 30px 40px; background-color: #f8fafc; border-top: 1px solid #f1f5f9; text-align: center; }
    .footer-text { font-size: 14px; color: #64748b; margin: 0 0 10px; line-height: 1.5; }
    .small-text { font-size: 11px; color: #94a3b8; margin: 0; line-height: 1.5; }
    @media only screen and (max-width: 600px) {
      .main-table { border-radius: 0; border-top-width: 4px; }
      .header-logo { padding: 25px 20px 15px; }
      .content-area { padding: 0 20px 25px; }
      .footer-area { padding: 25px 20px; }
    }
  </style>
</head>
<body>
  <div class="wrapper">
    <table class="main-table" border="0" cellpadding="0" cellspacing="0" align="center">
      <!-- Brand Header -->
      <tr>
        <td class="header-logo">
          <a href="{{ $_ENV['APP_URL'] ?? env('APP_URL') ?? '/' }}" style="text-decoration: none; display: inline-block;">
            <img src="{{ $_ENV['LOGO_URL'] ?? env('LOGO_URL') ?? 'https://i.postimg.cc/htc8Kgrn/default.png' }}" width="45" height="45" alt="Logo" style="display: block; margin: 0 auto 10px; border-radius: 8px; border: 0 !important; outline: none;" />
            <span style="font-family: 'Outfit', sans-serif; font-size: 20px; font-weight: 800; color: #0f172a; letter-spacing: -0.02em; display: block;">iDecide</span>
          </a>
        </td>
      </tr>

      <!-- Content Section -->
      <tr>
        <td class="content-area">
          @yield('content')
        </td>
      </tr>

      <!-- Footer Section -->
      <tr>
        <td class="footer-area">
          <p class="footer-text">
            <strong>Make Smarter Purchases.</strong><br />
            Empowering you to stay rational and beat impulse buying.
          </p>
          <p class="footer-text" style="font-size: 13px; margin-bottom: 20px; color: #94a3b8;">
            Kindest Regards,<br /><strong>iDecide Team</strong>
          </p>
          <div style="border-top: 1px solid #e2e8f0; margin: 20px 0; height: 1px;"></div>
          <p class="small-text">
            Internet communications are not secure. iDecide accepts no legal responsibility for the contents of this message. You received this because you requested a decision matrix report.
          </p>
        </td>
      </tr>
    </table>
  </div>

  <!-- Text-Only Fallback -->
  <div style="display: none; white-space: pre-wrap;">
    @yield('textFallback')
  </div>
</body>
</html>