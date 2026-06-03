@php
    $code = $data['code'] ?? '';
    $spacedCode = implode(' ', str_split(strval($code)));
    $loginUrl = ($_ENV['APP_URL'] ?? env('APP_URL') ?? 'https://idecide.app') . '/login';
@endphp
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
  <meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Your One-Time Login Token</title>
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
            <td style="background-color: #1a202c; padding: 40px 20px; text-align: center;">
              <table align="center" cellpadding="0" cellspacing="0">
                <tr>
                  <td style="background-color: #f97316; border-radius: 8px; width: 32px; height: 32px; text-align: center; vertical-align: middle; color: white; font-weight: bold; font-family: sans-serif; font-size: 18px;">i</td>
                  <td style="color: white; font-size: 24px; font-weight: 800; padding-left: 10px; font-family: sans-serif;">iDecide</td>
                </tr>
              </table>
              <p style="color: #94a3b8; font-size: 14px; margin: 10px 0 0 0; font-family: sans-serif;">rational purchase intelligence</p>
            </td>
          </tr>
          
          <!-- Body -->
          <tr>
            <td style="padding: 40px 30px;">
              <div style="text-align: center; margin-bottom: 30px;">
                <h1 style="font-size: 20px; font-weight: 800; color: #1e293b; margin: 0 0 8px 0; font-family: sans-serif;">Hey there! &#128075;</h1>
                <p style="font-size: 14px; color: #64748b; margin: 0; font-family: sans-serif;">You're just one step away from accessing your account</p>
              </div>

              <!-- Code Box -->
              <div style="background-color: #273041; border-radius: 16px; padding: 30px 20px; text-align: center; margin-bottom: 30px;">
                <div style="color: #cbd5e1; font-size: 13px; font-family: sans-serif; margin-bottom: 15px;">
                  <span style="color: #f97316; font-size: 16px; vertical-align: middle; margin-right: 6px;">&#128274;</span> <span style="vertical-align: middle;">Your Verification Code</span>
                </div>
                <div style="background-color: #1a202c; border-radius: 8px; padding: 20px; margin-bottom: 15px;">
                  <div style="color: white; font-size: 32px; font-weight: 700; letter-spacing: 0.3em; font-family: monospace;">{{ $spacedCode }}</div>
                </div>
                <div style="color: #f97316; font-size: 13px; font-family: sans-serif;">
                  <span style="font-size: 16px; vertical-align: middle; margin-right: 4px;">&#9202;</span> <span style="vertical-align: middle;">Expires in 10 minutes</span>
                </div>
              </div>

              <!-- Instructions -->
              <div style="background-color: #f8fafc; border-radius: 12px; padding: 25px; margin-bottom: 30px;">
                <div style="font-size: 14px; font-weight: 700; color: #1e293b; margin-bottom: 15px; font-family: sans-serif;">How to use this code:</div>
                <table width="100%" cellpadding="0" cellspacing="0">
                  <tr>
                    <td width="24" valign="top" style="padding-bottom: 12px;"><div style="color: #10b981; font-size: 16px; border: 1px solid #10b981; border-radius: 50%; width: 18px; height: 18px; line-height: 18px; text-align: center; font-size: 12px;">&#10003;</div></td>
                    <td style="font-size: 14px; color: #475569; font-family: sans-serif; padding-bottom: 12px;">Return to the login page</td>
                  </tr>
                  <tr>
                    <td width="24" valign="top" style="padding-bottom: 12px;"><div style="color: #10b981; font-size: 16px; border: 1px solid #10b981; border-radius: 50%; width: 18px; height: 18px; line-height: 18px; text-align: center; font-size: 12px;">&#10003;</div></td>
                    <td style="font-size: 14px; color: #475569; font-family: sans-serif; padding-bottom: 12px;">Enter the 6-character code above</td>
                  </tr>
                  <tr>
                    <td width="24" valign="top"><div style="color: #10b981; font-size: 16px; border: 1px solid #10b981; border-radius: 50%; width: 18px; height: 18px; line-height: 18px; text-align: center; font-size: 12px;">&#10003;</div></td>
                    <td style="font-size: 14px; color: #475569; font-family: sans-serif;">Click verify to access your account</td>
                  </tr>
                </table>
              </div>

              <!-- Security Notice -->
              <table width="100%" cellpadding="0" cellspacing="0" style="background-color: #fff7ed; border: 1px solid #fed7aa; border-radius: 12px;">
                <tr>
                  <td width="48" valign="top" style="padding: 20px 0 20px 20px;">
                    <div style="background-color: #f97316; width: 32px; height: 32px; border-radius: 16px; text-align: center; line-height: 32px; color: white; font-size: 16px;">
                      &#128274;
                    </div>
                  </td>
                  <td style="padding: 20px;">
                    <div style="font-size: 14px; font-weight: 800; color: #c2410c; margin-bottom: 4px; font-family: sans-serif;">Security Notice</div>
                    <div style="font-size: 13px; color: #c2410c; font-family: sans-serif; line-height: 1.5;">If you didn't request this code, please ignore this email or contact our support team.</div>
                  </td>
                </tr>
              </table>
            </td>
          </tr>

          <!-- Footer -->
          <tr>
            <td style="padding: 0 30px 40px 30px; text-align: center;">
              <div style="border-top: 1px solid #e2e8f0; padding-top: 30px;">
                <div style="font-size: 14px; font-weight: 800; color: #1e293b; font-family: sans-serif; margin-bottom: 5px;">Make Smarter Purchases</div>
                <div style="font-size: 12px; color: #64748b; font-family: sans-serif; margin-bottom: 20px;">Empowering you to stay rational and beat impulse buying</div>
                
                <!-- Social Icons -->
                <div style="margin-bottom: 20px;">
                  <a href="#" style="display: inline-block; width: 32px; height: 32px; background-color: #1a202c; color: white; border-radius: 16px; text-align: center; line-height: 32px; text-decoration: none; font-family: sans-serif; font-size: 14px; margin: 0 4px; font-weight: bold;">&#120143;</a>
                  <a href="#" style="display: inline-block; width: 32px; height: 32px; background-color: #22c55e; color: white; border-radius: 16px; text-align: center; line-height: 32px; text-decoration: none; font-family: sans-serif; font-size: 14px; margin: 0 4px; font-weight: bold;">W</a>
                  <a href="#" style="display: inline-block; width: 32px; height: 32px; background-color: #3b82f6; color: white; border-radius: 16px; text-align: center; line-height: 32px; text-decoration: none; font-family: sans-serif; font-size: 14px; margin: 0 4px; font-weight: bold;">f</a>
                </div>

                <div style="font-size: 12px; color: #94a3b8; font-family: sans-serif; margin-bottom: 20px;">
                  Kindest Regards,<br>
                  <strong style="color: #475569;">iDecide Team</strong>
                </div>

                <div style="font-size: 10px; color: #cbd5e1; font-family: sans-serif; line-height: 1.5;">
                  Internet communications are not secure, and therefore iDecide does not accept legal responsibility for the contents of this message.
                </div>
              </div>
            </td>
          </tr>
        </table>
        
        <div style="margin-top: 20px; font-size: 12px; color: #94a3b8; font-family: sans-serif;">
          <a href="#" style="color: #94a3b8; text-decoration: none;">Unsubscribe from these emails</a>
        </div>
      </td>
    </tr>
  </table>
</body>
</html>
