<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
  <meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>@yield('subject', 'Your Decision Matrix Result')</title>
  <style nonce="{{ $nonce }}">
    body { margin: 0; padding: 0; background-color: #f8f9fa; font-family: -apple-system, BlinkMacSystemFont, 'Segoe UI', Roboto, Helvetica, Arial, sans-serif; color: #212529; }
    .card { background: #ffffff; border-radius: 8px; box-shadow: 0 4px 20px rgba(0, 0, 0, 0.1); }
    .smiley img { border-radius: 50%; vertical-align: middle; width: 25px; height: 25px; }
    h1 { font-size: 24px; font-weight: 700; color: #0d6efd; margin: 0; }
    h2 { font-size: 20px; font-weight: 700; color: #0d6efd; margin: 0 0 10px; }
    .highlight { font-weight: 600; }
    .text { font-size: 16px; margin: 0 0 20px; }
    .slider-container { height: 20px; background: linear-gradient(to right, #dc3545 0%, #dc3545 49%, #ffc107 50%, #ffc107 74%, #198754 75%, #198754 100%); border-radius: 10px; position: relative; width: 300px; margin: 10px auto; }
    .slider-thumb { width: 16px; height: 16px; background: #212529; border: 2px solid #0d6efd; border-radius: 50%; position: absolute; top: 50%; transform: translate(-50%, -50%); }
    .results-table td { padding: 10px; border-bottom: 1px solid #dee2e6; }
    .results-table .highlight { color: #0d6efd; font-size: 20px; }
    .decision-highlight { font-weight: 600; }
    .badge { font-size: 16px; padding: 8px 16px; border-radius: 8px; display: inline-block; }
    .btn { padding: 12px 24px; background-color: #0d6efd; color: #ffffff; text-decoration: none; border-radius: 8px; display: inline-block; font-size: 16px; }
    .share-btn { display: inline-flex; align-items: center; justify-content: center; width: 40px; height: 40px; border-radius: 50%; background-color: #6c757d; text-decoration: none; }
    .footer-text { font-size: 14px; color: #6c757d; margin: 0; }
    .small-text { font-size: 12px; color: #6c757d; margin: 0; }
    ul { list-style-type: disc; padding-left: 20px; margin: 10px 0; }
    li { margin-bottom: 8px; font-size: 16px; }
    @media only screen and (max-width: 600px) {
      .card { border-radius: 0; }
      table { width: 100% !important; }
      .slider-container { width: 200px !important; }
      .smiley img { width: 20px; height: 20px; }
    }
  </style>
</head>
<body>
       <table border="0" width="100%" cellpadding="0" cellspacing="0" bgcolor="ffffff">

        <tr>
            <td align="center">
                <table border="0" align="center" width="590" cellpadding="0" cellspacing="0" class="container590">

                    <tr>
                        <td height="25" style="font-size: 25px; line-height: 25px;">&nbsp;</td>
                    </tr>

                    <tr>
                        <td align="center">

                            <table border="0" align="center" width="590" cellpadding="0" cellspacing="0" class="container590">

                                <tr>
                                    <td align="center" height="70" style="height:70px;">
                                        <a href="" style="display: block; border-style: none !important; border: 0 !important;">
                                        <img src ={{ $_ENV["LOGO_URL"] }} width="50" height="50" alt="LOGO" />
                                        </a>
                                    </td>
                                </tr>

                            </table>
                        </td>
                    </tr>

                    <tr>
                        <td height="25" style="font-size: 25px; line-height: 25px;">&nbsp;</td>
                    </tr>

                </table>
            </td>
        </tr>
    </table>
  <table border="0" cellpadding="0" cellspacing="0" width="100%" style="background-color: #f8f9fa; max-width: 800px; margin: 0 auto;">
    <tr>
      <td align="center" style="padding: 20px;">
        <!-- Header -->
        {{-- <table border="0" cellpadding="0" cellspacing="0" width="100%">
          <tr>
            <td style="padding: 20px 0;">
              <h1>Decision Matrix Result</h1>
            </td>
          </tr>
        </table> --}}

        <!-- Content -->
        @yield('content')

        <!-- Footer -->
        <table border="0" cellpadding="0" cellspacing="0" width="100%" style="margin-top: 20px;">
          <tr>
            <td align="center" style="padding: 20px 0;">
              <p class="footer-text">Kindest Regards,<br />iDecide Team</p>
            </td>
          </tr>
          <tr>
            <td align="center" style="padding: 0 0 20px;">
              <p class="small-text">Internet communications are not secure, and therefore we do not accept legal responsibility for the contents of this message...</p>
            </td>
          </tr>
        </table>
      </td>
    </tr>
  </table>

  <!-- Text-Only Fallback -->
  <div style="display: none; white-space: pre-wrap;">
    @yield('textFallback')
  </div>
</body>
</html>