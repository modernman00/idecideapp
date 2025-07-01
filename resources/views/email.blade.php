<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns:v="urn:schemas-microsoft-com:vml">

<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
    <meta name="viewport" content="width=device-width; initial-scale=1.0; maximum-scale=1.0;" />
    <!--[if !mso]--><!-- -->
    <link href='https://fonts.googleapis.com/css?family=Work+Sans:300,400,500,600,700' rel="stylesheet">
    <link href='https://fonts.googleapis.com/css?family=Quicksand:300,400,700' rel="stylesheet">
    <!--<![endif]-->

    <title>Decision Matrix Tool</title>

    <style type="text/css">
        body {
            width: 100%;
            background-color: #ffffff;
            margin: 0;
            padding: 0;
            -webkit-font-smoothing: antialiased;
            mso-margin-top-alt: 0px;
            mso-margin-bottom-alt: 0px;
            mso-padding-alt: 0px 0px 0px 0px;
        }

        p,
        h1,
        h2,
        h3,
        h4 {
            margin-top: 0;
            margin-bottom: 0;
            padding-top: 0;
            padding-bottom: 0;
        }

        span.preheader {
            display: none;
            font-size: 1px;
        }

        html {
            width: 100%;
        }

        table {
            font-size: 14px;
            border: 0;
        }
        /* ----------- responsivity ----------- */

        @media only screen and (max-width: 640px) {
            /*------ top header ------ */
            .main-header {
                font-size: 20px !important;
            }
            .main-section-header {
                font-size: 28px !important;
            }
            .show {
                display: block !important;
            }
            .hide {
                display: none !important;
            }
            .align-center {
                text-align: center !important;
            }
            .no-bg {
                background: none !important;
            }
            /*----- main image -------*/
            .main-image img {
                width: 440px !important;
                height: auto !important;
            }
            /* ====== divider ====== */
            .divider img {
                width: 440px !important;
            }
            /*-------- container --------*/
            .container590 {
                width: 440px !important;
            }
            .container580 {
                width: 400px !important;
            }
            .main-button {
                width: 220px !important;
            }
            /*-------- secions ----------*/
            .section-img img {
                width: 320px !important;
                height: auto !important;
            }
            .team-img img {
                width: 100% !important;
                height: auto !important;
            }
        }

        @media only screen and (max-width: 479px) {
            /*------ top header ------ */
            .main-header {
                font-size: 18px !important;
            }
            .main-section-header {
                font-size: 26px !important;
            }
            /* ====== divider ====== */
            .divider img {
                width: 280px !important;
            }
            /*-------- container --------*/
            .container590 {
                width: 280px !important;
            }
            .container590 {
                width: 280px !important;
            }
            .container580 {
                width: 260px !important;
            }
            /*-------- secions ----------*/
            .section-img img {
                width: 280px !important;
                height: auto !important;
            }
        }

          :root {
    --primary-color: #0d6efd;
    --secondary-color: #6c757d;
    --success-color: #198754;
    --warning-color: #ffc107;
    --danger-color: #dc3545;
    --background-light: #f8f9fa;
    --background-dark: #343a40;
    --text-light: #212529;
    --text-dark: #f8f9fa;
  }

  [data-theme="dark"] {
    --background-light: #343a40;
    --background-dark: #212529;
    --text-light: #f8f9fa;
    --text-dark: #212529;
  }

  body {
    background-color: var(--background-light);
    color: var(--text-light);
    opacity: 0;
    animation: fadeIn 1s ease-in forwards;
    transition: background-color 0.3s, color 0.3s;
  }

  @keyframes fadeIn {
    to { opacity: 1; }
  }

  .container {
    max-width: 800px;
    padding: 2rem;
  }

  .card {
    border: none;
    border-radius: 1rem;
    box-shadow: 0 4px 20px rgba(0, 0, 0, 0.1);
    background: linear-gradient(135deg, #ffffff, #e9ecef);
    transition: transform 0.3s;
  }

  [data-theme="dark"] .card {
    background: linear-gradient(135deg, #495057, #343a40);
  }

  .card:hover {
    transform: translateY(-5px);
  }

  .card-title {
    font-size: 1.75rem;
    font-weight: 700;
    color: var(--primary-color);
  }

  #score {
    font-size: 2rem;
    font-weight: bold;
    color: var(--primary-color);
    transition: color 0.3s;
  }

  .highlight {
    font-weight: 600;
  }

  .success { color: var(--success-color); }
  .warning { color: var(--warning-color); }
  .danger { color: var(--danger-color); }

  .badge-custom {
    font-size: 1rem;
    padding: 0.5em 1em;
    border-radius: 0.5em;
    margin-top: 1em;
  }

  .badge-success { background-color: #d4edda; color: #155724; }
  .badge-warning { background-color: #fff3cd; color: #856404; }
  .badge-danger { background-color: #f8d7da; color: #721c24; }

  .share-buttons a {
    display: inline-flex;
    align-items: center;
    justify-content: center;
    width: 40px;
    height: 40px;
    border-radius: 50%;
    background-color: var(--secondary-color);
    color: white;
    margin: 0 0.5rem;
    transition: background-color 0.3s, transform 0.3s;
  }

  .share-buttons a:hover {
    transform: scale(1.1);
    background-color: var(--primary-color);
  }

  #scoreSlider {
    width: 100%;
    max-width: 300px;
    height: 20px;
    margin: 1rem auto;
    display: block;
    -webkit-appearance: none;
    appearance: none;
    background: linear-gradient(to right, var(--danger-color) 0%, var(--danger-color) 49%, var(--warning-color) 50%, var(--warning-color) 74%, var(--success-color) 75%, var(--success-color) 100%);
    border-radius: 10px;
    outline: none;
    cursor: default;
  }

  #scoreSlider::-webkit-slider-thumb {
    -webkit-appearance: none;
    appearance: none;
    width: 16px;
    height: 16px;
    background: var(--text-light);
    border: 2px solid var(--primary-color);
    border-radius: 50%;
    cursor: default;
  }

  #scoreSlider::-moz-range-thumb {
    width: 16px;
    height: 16px;
    background: var(--text-light);
    border: 2px solid var(--primary-color);
    border-radius: 50%;
    cursor: default;
  }

  #scoreSlider:disabled {
    opacity: 1;
  }

  .slider-label {
    text-align: center;
    font-size: 14px;
    font-weight: bold;
    color: var(--text-light);
    margin-top: 0.5rem;
  }

  .result-image {
    max-width: 200px;
    height: auto;
    border-radius: 0.5rem;
    transition: opacity 0.5s ease-in;
  }

  .theme-toggle {
    position: absolute;
    top: 1rem;
    right: 1rem;
    cursor: pointer;
  }

  .btn {
    border-radius: 0.5rem;
    padding: 0.75rem 1.5rem;
    transition: transform 0.2s, background-color 0.3s;
  }

  .btn:hover {
    transform: translateY(-2px);
  }

    .smiley-container {
    display: flex;
    justify-content: space-around;
    width: 200px;
    margin: 0.5rem auto;
  }

  .smiley {
    width: 30px;
    height: 30px;
    border-radius: 50%;
    display: flex;
    align-items: center;
    justify-content: center;
    font-size: 20px;
  }

  .smiley.green { background: var(--success-color); }
  .smiley.yellow { background: var(--warning-color); }
  .smiley.red { background: var(--danger-color); }

  /* Responsive Design */
  @media (max-width: 576px) {
    .card-title { font-size: 1.5rem; }
    #score { font-size: 1.5rem; }
    #scoreSlider, .result-image { max-width: 150px; }
    .btn { padding: 0.5rem 1rem; font-size: 0.9rem; }
     .result-image { max-width: 150px; }
        .smiley-container { width: 150px; }
    .smiley { width: 25px; height: 25px; font-size: 16px; }
  }

  @media (min-width: 577px) and (max-width: 992px) {
    #scoreSlider, .result-image { max-width: 180px; }
        .smiley-container { width: 180px; }
  }

  .img-wrapper {
    width: 200px;
    height: 200px;
    position: relative;
    background: linear-gradient(to bottom, #fff9e6, #fff4cc);
    border-radius: 8px;
    overflow: hidden;
  }

  .img-wrapper img {
    width: 100%;
    height: 100%;
    object-fit: cover;
  }

  .img-wrapper .scale-icon {
    position: absolute;
    width: 60px;
    height: 60px;
   climbed: 10px;
    right: 10px;
    opacity: 0.3;
  }
  .share-buttons a {
  display: inline-flex;
  align-items: center;
  justify-content: center;
  width: 40px;
  height: 40px;
  border-radius: 50%;
  background-color: var(--secondary-color);
  color: white;
  margin: 0 0.5rem;
  text-decoration: none;
  transition: background-color 0.3s, transform 0.3s;
  }


  .share-buttons a .fa-twitter {
    color: #1da1f2; /* Twitter blue */
  }
  .share-buttons a .fa-whatsapp {
    color: #25d366; /* WhatsApp green */
  }

  .share-buttons a .fa-facebook-f {
    color: #3b5998; /* Facebook blue */
  }
  .share-buttons a .fa-bullhorn {
    color: #ff4500; /* Truth Social (using a reddish-orange as a placeholder) */
  }
  .share-buttons a .fa-linkedin-in {
    color: #0077b5; /* LinkedIn blue */
  }
  .share-buttons a .fa-reddit-alien {
    color: #ff4500; /* Reddit orange */
  }

  .share-buttons a:hover {
    transform: scale(1.2);
  }

  .success-light { color: #28a745; }
  .badge-success-light { background-color: #d4edda; color: #155724; }

  .advice-list {
    list-style-type: disc;
    padding-left: 20px;
    margin-top: 1rem;
  }
  .advice-list li {
    margin-bottom: 0.5rem;
    font-size: 1rem;
    color: #212529;
  }

    </style>
    <!--[if gte mso 9]><style type=”text/css”>
        body {
        font-family: arial, sans-serif!important;
        }
        </style>
    <![endif]-->

</head>


<body class="respond" leftmargin="0" topmargin="0" marginwidth="0" marginheight="0">
    <!-- pre-header -->
    <table style="display:none!important;">
        <tr>
            <td>
                <div style="overflow:hidden;display:none;font-size:1px;color:#ffffff;line-height:1px;font-family:Arial;maxheight:0px;max-width:0px;opacity:0;">
                    FAMILY
                </div>
            </td>
        </tr>
    </table>
    <!-- pre-header end -->
    <!-- header -->
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
                                        <img src ={{ getenv("APP_LOGO") }} width="50" height="50" alt="LOGO" />
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
    <!-- end header -->

    <!-- big image section -->

    <table border="0" width="100%" cellpadding="0" cellspacing="0" bgcolor="ffffff" class="bg_color">

        <tr>
            <td align="center">
                <table border="0" align="center" width="590" cellpadding="0" cellspacing="0" class="container590">

                    <tr>
                        <td align="center" style="color: #343434; font-size: 24px; font-family: Quicksand, Calibri, sans-serif; font-weight:700;letter-spacing: 3px; line-height: 35px;"
                            class="main-header">
                            <!-- section text ======-->

                            <div style="line-height: 35px">

                            @yield('subject')

                          

                            </div>
                        </td>
                    </tr>

                    <tr>
                        <td height="10" style="font-size: 10px; line-height: 10px;">&nbsp;</td>
                    </tr>

                    <tr>
                        <td align="center">
                            <table border="0" width="40" align="center" cellpadding="0" cellspacing="0" bgcolor="eeeeee">
                                <tr>
                                    <td height="2" style="font-size: 2px; line-height: 2px;">&nbsp;</td>
                                </tr>
                            </table>
                        </td>
                    </tr>

                    <tr>
                        <td height="20" style="font-size: 20px; line-height: 20px;">&nbsp;</td>
                    </tr>

                    <tr>
                        <td align="left">
                            <table border="0" width="590" align="center" cellpadding="0" cellspacing="0" class="container590">
                                <tr>
                                    <td align="left" style="color: #888888; font-size: 16px; font-family: 'Work Sans', Calibri, sans-serif; line-height: 24px;">
                                        <!-- section text ======-->

                                  
                                        
                

                                     
                                        <p style="line-height: 24px;margin-bottom:15px;">

                                            @yield('content')

                                        </p>
                                      
                                   
                                        <p style="line-height: 24px">
                                             Kindest Regards,<br>
                                            
                                                iDecide Team<br>
                                        </p>

                                    </td>
                                </tr>
                            </table>
                        </td>
                    </tr>





                </table>

            </td>
        </tr>

        <tr>
            <td height="40" style="font-size: 40px; line-height: 40px;">&nbsp;</td>
        </tr>

    </table>


    <!-- contact section -->
    <table border="0" width="100%" cellpadding="0" cellspacing="0" bgcolor="ffffff" class="bg_color">

        <tr>
            <td height="60" style="font-size: 60px; line-height: 60px;">&nbsp;</td>
        </tr>

   

        <tr>
            <td height="60" style="font-size: 60px; line-height: 60px;">&nbsp;</td>
        </tr>

    </table>
    <!-- end section -->

    <!-- footer ====== -->
    <table border="0" width="100%" cellpadding="0" cellspacing="0" bgcolor="f4f4f4">

        <tr>
            <td height="25" style="font-size: 25px; line-height: 25px;">&nbsp;</td>
        </tr>

        <tr>
            <td align="center">

                <table border="0" align="center" width="590" cellpadding="0" cellspacing="0" class="container590">

                    <tr>
                        <td>
                            <table border="0" align="center" cellpadding="0" cellspacing="0" style="border-collapse:collapse; mso-table-lspace:0pt; mso-table-rspace:0pt;"
                                class="container590">
                                <tr>
                                    <td align="center" style="color: #aaaaaa; font-size: 14px; font-family: 'Work Sans', Calibri, sans-serif; line-height: 24px;">
                                        <div style="line-height: 24px;">
                                            <p> Internet communications are not secure and therefore the we do not accept legal responsibility for the contents of this message. Although we operate anti-virus programmes, it does not accept responsibility for any damage whatsoever that is caused by viruses being passed. </p>

                                        </div>
                                    </td>
                                </tr>
                            </table>

                        </td>
                    </tr>

                </table>
            </td>
        </tr>

        <tr>
            <td height="25" style="font-size: 25px; line-height: 25px;">&nbsp;</td>
        </tr>

    </table>
    <!-- end footer ====== -->

</body>

</html>