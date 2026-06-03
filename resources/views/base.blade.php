<!DOCTYPE html>
<html lang="en" data-theme="light">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=5.0, user-scalable=yes">
    <meta name="robots" content="index, follow, max-image-preview:large, max-snippet:-1, max-video-preview:-1">

    <!-- Primary Meta Tags -->
    <title>@yield('title', 'iDecide Decision Matrix') | Smarter Decision Making Tool</title>
    <meta name="title" content="@yield('title', 'iDecide Decision Matrix') | Smarter Decision Making Tool">
    <meta name="description"
        content="@yield('meta_description', 'iDecide helps you make informed decisions with an intuitive tool. Evaluate options, get real-time scores, and receive personalized advice for better buying choices.')">
    <meta name="keywords"
        content="decision matrix, decision making tool, consumer advice, product evaluation, smart buying, iDecide">
    <meta name="author" content="Modernman">
    <meta name="generator" content="BladeOne">
    <meta name="theme-color" content="{{ $_ENV['BRAND_COLOR'] ?? '#0d9488' }}">

    <meta name="referrer" content="strict-origin-when-cross-origin">

    @stack('meta')

    <!-- Open Graph / Facebook -->
    <meta property="og:type" content="website">
    <meta property="og:url" content="{{ getenv('APP_URL') ?: 'https://idecide.app' }}">
    <meta property="og:title" content="@yield('title', 'iDecide Decision Matrix') | Smarter Decision Making Tool">
    <meta property="og:description"
        content="@yield('meta_description', 'iDecide helps you make informed decisions with an intuitive tool. Evaluate options, get real-time scores, and receive personalized advice for better buying choices.')">
    <meta property="og:image" content="{{ (getenv('APP_URL') ?: '') }}/public/images/logo/default.png">
    <meta property="og:site_name" content="iDecide">
    <meta property="og:locale" content="en_US">

    <!-- Twitter Card -->
    <meta name="twitter:card" content="summary_large_image">
    <meta name="twitter:url" content="{{ getenv('APP_URL') ?: 'https://idecide.app' }}">
    <meta name="twitter:title" content="@yield('title', 'iDecide Decision Matrix') | Smarter Decision Making Tool">
    <meta name="twitter:description"
        content="@yield('meta_description', 'iDecide helps you make informed decisions with an intuitive tool. Evaluate options, get real-time scores, and receive personalized advice for better buying choices.')">
    <meta name="twitter:image" content="{{ (getenv('APP_URL') ?: '') }}/public/images/logo/default.png">
    <meta name="twitter:site" content="@iDecide">
    <meta name="twitter:creator" content="@Modernman">

    <!-- Structured Data (JSON-LD) -->
    <script type="application/ld+json" nonce="{{ $nonce }}">
    {
      "@context": "https://schema.org",
      "@type": "WebApplication",
      "name": "iDecide Decision Matrix",
      "url": "{{ getenv('APP_URL') ?: 'https://idecide.app' }}",
      "description": "An intuitive decision-making tool that helps users evaluate options through real-time scoring and personalized advice.",
      "applicationCategory": "ProductivityApplication",
      "operatingSystem": "All",
      "author": {
        "@type": "Organization",
        "name": "Modernman",
        "url": "https://modernman.dev"
      },
      "offers": {
        "@type": "Offer",
        "price": "0",
        "priceCurrency": "USD"
      }
    }
    </script>

    <!-- Favicons -->
    <link rel="icon" type="image/svg+xml" href="/public/images/logo/vector/default.svg">
    <link rel="icon" type="image/png" sizes="32x32" href="/public/images/logo/default.png">
    <link rel="apple-touch-icon" sizes="180x180" href="/public/images/logo/ios/192.png">

    <!-- Canonical URL -->
    <link rel="canonical" href="{{ (getenv('APP_URL') ?: '') . $_SERVER['REQUEST_URI'] }}">

    <!-- CSS and Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link
        href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700&family=Outfit:wght@400;600;800&display=swap"
        rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css">

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.5/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-SgOJa3DmI69IUzQ2PVdRZhwQ+dy64/BUtbMJw1MZ8t5HZApcHrRKUc4W0kG879m7" crossorigin="anonymous">

    <script nonce="{{ $nonce }}" src="https://cdn.jsdelivr.net/npm/chart.js"></script>

    {{-- PWA MANIFEST --}}
    <link rel="manifest" href="/manifest.json" />
    <meta name="apple-mobile-web-app-capable" content="yes">
    <meta name="apple-mobile-web-app-status-bar-style" content="black-translucent">
    <meta name="apple-mobile-web-app-title" content="iDecide">


    {{-- @include('ios-splash') --}}


    <link rel="stylesheet" type="text/css" href="public/css/main.css">

    {{-- The api.js?render=YOUR_SITE_KEY loads the reCAPTCHA library and initializes it with your site key. --}}
    {{--
    <script nonce="{{ $nonce }}"
        src="https://www.google.com/recaptcha/api.js?render={{ $_ENV['RECAPTCHA_SITE_KEY'] }}"></script> --}}


    @stack('styles_result')
    @stack('styles_main')

    <style nonce="{{ $nonce }}">
        :root {
            --primary-color: #1B5E20; /* Dark Forest Green */
            --primary-hover: #135D40;
            --secondary-color: #4CAF50; /* Vibrant Green */
            --accent-color: #C58AF9; /* Purple */
            --background-light: #F8F9FA;
            --background-dark: #0B1326;
            --card-bg: #FFFFFF;
            --text-main: #202124;
            --text-muted: #5F6368;
            --glass-bg: rgba(255, 255, 255, 0.8);
            --glass-border: #DADCE0;
            --shadow-sm: 0 1px 2px 0 rgb(0 0 0 / 0.05);
            --shadow-md: 0 4px 6px -1px rgb(0 0 0 / 0.1);
            --shadow-lg: 0 10px 30px rgba(0, 0, 0, 0.05);
            --radius-md: 16px;
            --radius-lg: 24px;
            --font-main: 'Inter', sans-serif;
            --font-heading: 'Outfit', sans-serif;
        }

        [data-theme="dark"] {
            --background-light: #0B1326;
            --background-dark: #020617;
            --card-bg: #1e293b;
            --text-main: #f8fafc;
            --text-muted: #94a3b8;
            --glass-bg: rgba(30, 41, 59, 0.7);
            --glass-border: rgba(255, 255, 255, 0.1);
            --shadow-lg: 0 25px 50px -12px rgba(0, 0, 0, 0.5);
        }

        body {
            background-color: var(--background-light);
            color: var(--text-main);
            font-family: var(--font-main);
            margin: 0;
            padding: 0;
            min-height: 100vh;
            display: flex;
            flex-direction: column;
            transition: background-color 0.3s ease, color 0.3s ease;
            position: relative;
            overflow-x: hidden;
        }

        /* Ambient Glows */
        body::before, body::after {
            content: '';
            position: fixed;
            width: 800px;
            height: 800px;
            border-radius: 50%;
            filter: blur(120px);
            z-index: -1;
            pointer-events: none;
            opacity: 0.3;
        }

        body::before {
            top: -300px;
            left: -300px;
            background: radial-gradient(circle at center, rgba(66, 133, 244, 0.15), transparent 70%);
        }

        body::after {
            bottom: -300px;
            right: -300px;
            background: radial-gradient(circle at center, rgba(197, 138, 249, 0.15), transparent 70%);
        }

        h1,
        h2,
        h3,
        h4,
        h5,
        h6 {
            font-family: var(--font-heading);
            font-weight: 700;
        }

        .hero {
            background: linear-gradient(135deg, rgba(15, 23, 42, 0.8) 0%, rgba(13, 148, 136, 0.4) 100%), url("/public/images/MONEY.jpg") no-repeat center center/cover;
            height: 90vh;
            display: flex;
            flex-direction: column;
            justify-content: center;
            align-items: center;
            color: white;
            text-align: center;
            position: relative;
            overflow: hidden;
            margin-bottom: 4rem;
        }

        .hero::before {
            content: '';
            position: absolute;
            top: 0;
            left: 0;
            right: 0;
            bottom: 0;
            background: radial-gradient(circle at 50% 50%, rgba(13, 148, 136, 0.2) 0%, transparent 70%);
            pointer-events: none;
        }

        .overlay {
            background: var(--glass-bg);
            backdrop-filter: blur(12px);
            -webkit-backdrop-filter: blur(12px);
            border: 1px solid var(--glass-border);
            padding: 4rem 2rem;
            border-radius: var(--radius-lg);
            max-width: 800px;
            width: 90%;
            box-shadow: var(--shadow-lg);
            animation: fadeInScale 0.8s ease-out;
        }

        @keyframes fadeInScale {
            from {
                opacity: 0;
                transform: scale(0.95);
            }

            to {
                opacity: 1;
                transform: scale(1);
            }
        }

        h1 {
            font-size: 3.5rem;
            line-height: 1.1;
            margin-bottom: 1.5rem;
            background: linear-gradient(to right, #ffffff, #94a3b8);
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
        }

        [data-theme="light"] .overlay h1 {
            background: linear-gradient(to right, var(--background-dark), var(--primary-color));
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
        }

        .email {
            width: 50%;
        }

        .cta-button {
            background: linear-gradient(135deg, var(--primary-color), var(--secondary-color));
            border: none;
            padding: 1.25rem 2.5rem;
            font-size: 1.25rem;
            font-weight: 600;
            border-radius: 50px;
            color: white;
            cursor: pointer;
            text-decoration: none;
            transition: all 0.3s cubic-bezier(0.4, 0, 0.2, 1);
            display: inline-block;
            box-shadow: 0 4px 15px rgba(13, 148, 136, 0.3);
            font-family: var(--font-heading);
        }

        .cta-button:hover {
            transform: translateY(-3px) scale(1.05);
            box-shadow: 0 8px 25px rgba(13, 148, 136, 0.4);
            color: white;
            filter: brightness(1.1);
        }

        .card {
            background: var(--card-bg);
            border: 1px solid var(--glass-border);
            border-radius: var(--radius-md);
            overflow: hidden;
            transition: all 0.4s cubic-bezier(0.4, 0, 0.2, 1);
            box-shadow: var(--shadow-sm);
        }

        .card:hover {
            transform: translateY(-10px);
            box-shadow: var(--shadow-lg);
        }

        .card-img-top {
            height: 200px;
            object-fit: cover;
            transition: transform 0.5s ease;
        }

        .card:hover .card-img-top {
            transform: scale(1.1);
        }

        .description {
            padding: 6rem 0;
            background: var(--background-light);
        }

        .subtitle {
            font-size: 1.25rem;
            line-height: 1.7;
            color: var(--text-muted);
            margin-bottom: 2rem;
            text-align: left;
        }

        .highlight {
            color: var(--primary-color);
            font-weight: 700;
            position: relative;
            display: inline-block;
        }

        .highlight::after {
            content: '';
            position: absolute;
            bottom: 2px;
            left: 0;
            width: 100%;
            height: 8px;
            background: var(--primary-color);
            opacity: 0.15;
            z-index: -1;
        }

        .feature-card {
            padding: 2.5rem;
            background: var(--card-bg);
            border-radius: var(--radius-md);
            height: 100%;
            border: 1px solid var(--glass-border);
            transition: all 0.3s ease;
        }

        .feature-card:hover {
            background: var(--glass-bg);
            border-color: var(--primary-color);
        }

        .feature-icon {
            font-size: 2.5rem;
            color: var(--primary-color);
            margin-bottom: 1.5rem;
            display: inline-block;
        }

        .theme-toggle {
            background: var(--card-bg);
            padding: 8px 15px;
            border-radius: 30px;
            border: 1px solid var(--glass-border);
            box-shadow: var(--shadow-sm);
        }

        #themeSwitch {
            display: none;
        }

        .theme-toggle label {
            cursor: pointer;
            font-size: 1.2rem;
            margin: 0;
        }

        .navbar {
            background: var(--glass-bg);
            backdrop-filter: blur(12px);
            -webkit-backdrop-filter: blur(12px);
            padding: 1.25rem 0;
            border-bottom: 1px solid var(--glass-border);
            position: sticky;
            top: 0;
            z-index: 1000;
            width: 100% !important;
            max-width: 100% !important;
        }

        .navbar .container-fluid,
        footer .container-fluid {
            width: 100% !important;
            max-width: 100% !important;
            padding-left: 2rem !important;
            padding-right: 2rem !important;
            margin-left: 0 !important;
            margin-right: 0 !important;
        }

        .navbar-brand {
            color: var(--text-main) !important;
            font-family: var(--font-heading);
            font-weight: 800;
            font-size: 1.5rem;
            display: flex;
            align-items: center;
            gap: 10px;
        }

        .navbar-nav .nav-link {
            color: var(--text-main) !important;
            font-weight: 500;
            padding: 0.5rem 1.25rem !important;
            transition: color 0.3s ease;
        }

        .navbar-nav .nav-link:hover {
            color: var(--primary-color) !important;
        }

        .nav-btn-premium {
            background: linear-gradient(135deg, rgba(76, 175, 80, 0.08), rgba(27, 94, 32, 0.12)) !important;
            border: 1px dashed rgba(76, 175, 80, 0.5) !important;
            color: #4CAF50 !important;
            padding: 0.5rem 1.25rem !important;
            border-radius: 50px;
            font-weight: 600 !important;
            transition: all 0.3s cubic-bezier(0.4, 0, 0.2, 1) !important;
            display: inline-flex;
            align-items: center;
            gap: 6px;
            box-shadow: 0 4px 10px rgba(76, 175, 80, 0.06);
        }

        [data-theme="dark"] .nav-btn-premium {
            background: linear-gradient(135deg, rgba(76, 175, 80, 0.15), rgba(15, 23, 42, 0.4)) !important;
            border: 1px dashed rgba(76, 175, 80, 0.4) !important;
            color: #81c784 !important;
            box-shadow: 0 4px 15px rgba(0, 0, 0, 0.2);
        }

        .nav-btn-premium:hover {
            background: linear-gradient(135deg, var(--primary-color), var(--secondary-color)) !important;
            color: white !important;
            border-color: transparent !important;
            transform: translateY(-2px);
            box-shadow: 0 6px 20px rgba(76, 175, 80, 0.3);
        }

        .nav-btn-premium i {
            font-size: 0.85rem;
        }

        .nav-btn-logout {
            background: linear-gradient(135deg, rgba(239, 68, 68, 0.08), rgba(239, 68, 68, 0.12)) !important;
            border: 1px dashed rgba(239, 68, 68, 0.5) !important;
            color: #ef4444 !important;
            padding: 0.5rem 1.25rem !important;
            border-radius: 50px;
            font-weight: 600 !important;
            transition: all 0.3s cubic-bezier(0.4, 0, 0.2, 1) !important;
            display: inline-flex;
            align-items: center;
            gap: 6px;
            box-shadow: 0 4px 10px rgba(239, 68, 68, 0.06);
        }
        [data-theme="dark"] .nav-btn-logout {
            background: linear-gradient(135deg, rgba(239, 68, 68, 0.15), rgba(15, 23, 42, 0.4)) !important;
            border: 1px dashed rgba(239, 68, 68, 0.4) !important;
            color: #fca5a5 !important;
            box-shadow: 0 4px 15px rgba(0, 0, 0, 0.2);
        }
        .nav-btn-logout:hover {
            background: linear-gradient(135deg, #ef4444, #b91c1c) !important;
            color: white !important;
            border-color: transparent !important;
            transform: translateY(-2px);
            box-shadow: 0 6px 20px rgba(239, 68, 68, 0.3);
        }

        .nav-btn-register {
            background: linear-gradient(135deg, rgba(76, 175, 80, 0.05), rgba(76, 175, 80, 0.12)) !important;
            border: 1px solid rgba(76, 175, 80, 0.3) !important;
            color: #4CAF50 !important;
            padding: 0.5rem 1.25rem !important;
            border-radius: 50px;
            font-weight: 600 !important;
            transition: all 0.3s cubic-bezier(0.4, 0, 0.2, 1) !important;
            display: inline-flex;
            align-items: center;
            gap: 6px;
        }
        [data-theme="dark"] .nav-btn-register {
            background: linear-gradient(135deg, rgba(76, 175, 80, 0.1), rgba(15, 23, 42, 0.4)) !important;
            color: #81c784 !important;
        }
        .nav-btn-register:hover {
            background: linear-gradient(135deg, var(--primary-color), var(--secondary-color)) !important;
            color: white !important;
            border-color: transparent !important;
            transform: translateY(-2px);
        }

        /* ──────────────────────────────── */
        /* ✨ Mirrored Premium Footer      */
        /* ──────────────────────────────── */
        footer {
            background: linear-gradient(180deg, #090d16 0%, #030509 100%);
            border-top: 1px solid rgba(76, 175, 80, 0.15);
            color: #ffffff;
            padding: 7rem 0 3rem;
            margin-top: 10rem;
            font-family: 'Inter', sans-serif;
            position: relative;
            overflow: hidden;
            width: 100% !important;
            max-width: 100% !important;
        }

        /* Subtle radial ambient glow behind the footer */
        footer::before {
            content: '';
            position: absolute;
            top: 0;
            left: 50%;
            transform: translateX(-50%);
            width: 600px;
            height: 150px;
            background: radial-gradient(circle, rgba(76, 175, 80, 0.08) 0%, transparent 70%);
            pointer-events: none;
        }

        .footer-brand {
            font-family: 'Outfit', sans-serif;
            font-size: 2.2rem;
            font-weight: 800;
            background: linear-gradient(135deg, #4CAF50, #1B5E20);
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
            text-decoration: none;
            margin-bottom: 1.25rem;
            display: inline-block;
            transition: all 0.3s ease;
        }

        .footer-brand:hover {
            transform: scale(1.03);
            filter: brightness(1.2);
        }

        .footer-desc {
            color: #94a3b8;
            font-size: 1rem;
            line-height: 1.6;
            margin-bottom: 2rem;
            max-width: 440px;
        }

        .footer-heading {
            font-family: 'Outfit', sans-serif;
            font-size: 1.1rem;
            font-weight: 700;
            margin-bottom: 1.75rem;
            color: #f8fafc;
            letter-spacing: 0.05em;
            text-transform: uppercase;
            position: relative;
            padding-bottom: 8px;
        }

        .footer-heading::after {
            content: '';
            position: absolute;
            left: 0;
            bottom: 0;
            width: 30px;
            height: 2px;
            background: #4CAF50;
            border-radius: 2px;
            transition: width 0.3s ease;
        }

        .footer-column:hover .footer-heading::after {
            width: 50px;
        }

        .footer-links {
            list-style: none;
            padding: 0;
            margin: 0;
        }

        .footer-links li {
            margin-bottom: 1rem;
        }

        .footer-links a {
            color: #94a3b8;
            text-decoration: none;
            font-weight: 500;
            font-size: 0.95rem;
            transition: all 0.3s cubic-bezier(0.4, 0, 0.2, 1);
            display: inline-flex;
            align-items: center;
            gap: 6px;
        }

        .footer-links a i {
            font-size: 0.8rem;
            opacity: 0;
            transform: translateX(-5px);
            transition: all 0.3s ease;
        }

        .footer-links a:hover {
            color: #4CAF50;
            transform: translateX(5px);
        }

        .footer-links a:hover i {
            opacity: 1;
            transform: translateX(0);
        }

        .footer-divider {
            border-top: 1px solid rgba(255, 255, 255, 0.06);
            margin: 4rem 0 2rem;
        }

        .footer-bottom-info {
            display: flex;
            justify-content: space-between;
            align-items: center;
            color: #64748b;
            font-size: 0.9rem;
            flex-wrap: wrap;
            gap: 1.5rem;
        }

        .footer-bottom-links {
            display: flex;
            gap: 1.5rem;
        }

        .footer-bottom-links a {
            color: #64748b;
            text-decoration: none;
            transition: color 0.3s ease;
        }

        .footer-bottom-links a:hover {
            color: #4CAF50;
        }

        /* Inline Footer Socials */
        .footer-socials {
            display: flex;
            gap: 1rem;
            margin-top: 1.5rem;
        }

        .footer-social-icon {
            width: 38px;
            height: 38px;
            border-radius: 50%;
            background: rgba(255, 255, 255, 0.03);
            border: 1px solid rgba(255, 255, 255, 0.08);
            display: flex;
            align-items: center;
            justify-content: center;
            color: #94a3b8;
            font-size: 1rem;
            text-decoration: none;
            transition: all 0.3s cubic-bezier(0.4, 0, 0.2, 1);
        }

        .footer-social-icon:hover {
            background: rgba(76, 175, 80, 0.1);
            border-color: #4CAF50;
            color: #4CAF50;
            transform: translateY(-3px);
            box-shadow: 0 4px 12px rgba(76, 175, 80, 0.2);
        }

        /* Colorful Social Bar */
        .social-bar {
            position: fixed;
            right: 0;
            top: 50%;
            transform: translateY(-50%);
            z-index: 1000;
            display: flex;
            flex-direction: column;
            gap: 0;
            background: rgba(30, 41, 59, 0.8);
            backdrop-filter: blur(10px);
            border-radius: 12px 0 0 12px;
            overflow: hidden;
            box-shadow: -5px 0 20px rgba(0, 0, 0, 0.1);
        }

        .social-tile {
            width: 44px;
            height: 44px;
            display: flex;
            align-items: center;
            justify-content: center;
            color: white;
            font-size: 1.1rem;
            text-decoration: none;
            transition: all 0.3s ease;
        }

        .social-tile:hover {
            width: 54px;
            margin-left: -10px;
            filter: brightness(1.1);
            color: white;
        }

        @media (max-width: 767.98px) {
            .social-bar {
                top: auto;
                bottom: 0;
                left: 0;
                right: 0;
                transform: none;
                flex-direction: row;
                width: 100%;
                max-width: 100%;
                border-radius: 20px 20px 0 0;
                padding: 8px;
                justify-content: center;
                gap: 8px;
                box-shadow: 0 -5px 20px rgba(0, 0, 0, 0.15);
            }
            .social-tile {
                width: 40px;
                height: 40px;
                font-size: 1.1rem;
                border-radius: 10px;
            }
            .social-tile:hover {
                width: 40px;
                margin-left: 0;
            }
        }

        .tile-linkedin {
            background: #0077b5;
        }

        .tile-facebook {
            background: #3b5998;
        }

        .tile-share {
            background: #8bc34a;
        }

        .tile-whatsapp-v2 {
            background: #7360f2;
        }

        .tile-whatsapp {
            background: #25d366;
        }

        .tile-x {
            background: #000000;
        }

        .tile-sms {
            background: #ffb100;
        }

        .tile-copy {
            background: #2e7d32;
        }

        @media (max-width: 767.98px) {

            /* Grid layout: force stack ALL columns vertically */
            .row>[class*="col"],
            .container [class*="col-"],
            .questions-form .row>div {
                width: 100% !important;
                flex: 0 0 100% !important;
                max-width: 100% !important;
                padding-bottom: 1.5rem !important;
            }

            footer {
                padding-top: 4rem;
                text-align: left;
            }

            .footer-column {
                margin-bottom: 2.5rem;
            }

            .footer-brand,
            .footer-desc {
                text-align: left;
            }

            .social-bar {
                padding: 1.5rem;
                gap: 10px;
            }

            .social-tile {
                width: 42px;
                height: 42px;
                font-size: 1.1rem;
            }

            .hero h1 {
                font-size: 2.2rem !important;
            }

            .overlay {
                padding: 2.5rem 1.5rem !important;
            }

            .cta-button {
                width: 100% !important;
                padding: 1rem !important;
                font-size: 1.1rem !important;
            }

            /* ──────────────────────────────── */
            /* 📱 PWA Install Banner Style      */
            /* ──────────────────────────────── */


            @media (min-width: 576px) and (max-width: 767.98px) {
                .styleform_form {
                    margin-left: 5%;
                    margin-right: 5%;
                }

                .form__login__logo {
                    height: 3.5em;
                    width: 3.5em;
                }
            }

            /* ──────────────────────────────── */
            /* 💻 Medium devices: 768px–991.98px */
            /* ──────────────────────────────── */
            @media (min-width: 768px) and (max-width: 991.98px) {
                .styleform_form {
                    margin-left: 5%;
                    margin-right: 5%;
                }

                .form__login__logo {
                    height: 4.5em;
                    width: 4.5em;
                }
            }

            /* ──────────────────────────────── */
            /* 🖥️ Large devices: 992px–1199.98px */
            /* ──────────────────────────────── */
            @media (min-width: 992px) and (max-width: 1199.98px) {
                .styleform_form {
                    margin-left: 15%;
                    margin-right: 15%;
                }
            }

            /* ──────────────────────────────── */
            /* 🖥️ XL devices: 1200px–1399.98px */
            /* ──────────────────────────────── */
            @media (min-width: 1200px) and (max-width: 1399.98px) {
                .styleform_form {
                    margin-left: 30%;
                    margin-right: 30%;
                }
            }

            /* ──────────────────────────────── */
            /* 🖥️ XXL devices: 1400px and up */
            /* ──────────────────────────────── */
            @media (min-width: 1400px) {
                .styleform_form {
                    margin-left: 30%;
                    margin-right: 30%;
                }
            }


            .styleform_header {
                text-align: center;
            }

            .loader {

                border: 16px solid #11e11b79;
                border-radius: 50%;
                border-top: 16px solid #2092ddf3;
                width: 120px;
                height: 120px;
                -webkit-animation: spin 2s linear infinite;
                /* Safari */
                animation: spin 2s linear infinite;
            }

            @-webkit-keyframes spin {
                0% {
                    -webkit-transform: rotate(0deg);
                }

                100% {
                    -webkit-transform: rotate(360deg);
                }
            }

            @keyframes spin {
                0% {
                    transform: rotate(0deg);
                }

                100% {
                    transform: rotate(360deg);
                }
            }

            .notification {
                padding: 10px;
                margin: 10px;
                border-radius: 5px;
                color: #fff;
                font-size: 16px;
                font-weight: bold;
                text-align: center;
            }

            .notification.success {
                background-color: #28a745;
            }

            .notification.error {
                background-color: #dc3545;
            }

            .styleform_header {
                text-align: center;
            }

            .noDisplay {
                display: none;
            }
        }
    </style>
</head>

<body data-page-id="@yield('data-page-id')" data-spy="scroll" data-offset='60'>

    <nav class="navbar navbar-expand-lg">
        <div class="container-fluid px-md-5">
            <a class="navbar-brand" href="/">
                <img src="/public/images/logo/vector/default.svg" width="40" height="40" alt="Logo">
                <span>iDecide</span>
            </a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav ms-auto align-items-center">
                    <li class="nav-item"><a class="nav-link" href="/">Home</a></li>
                    <li class="nav-item"><a class="nav-link" href="community">Community</a></li>
                    <li class="nav-item ms-lg-2 me-lg-2"><a class="nav-link nav-btn-premium" href="history"><i class="fas fa-history"></i> Decision History</a></li>
                    <li class="nav-item"><a class="nav-link" href="about">About</a></li>
                    <li class="nav-item"><a class="nav-link" href="contact">Contact</a></li>
                    <li class="nav-item"><a class="nav-link" href="blogs">Blogs</a></li>
                    @if (isset($_SESSION['user_id']) || isset($_SESSION['ID']) || isset($_SESSION['auth']['ID']) || isset($_SESSION['auth']['id']) || isset($_SESSION['auth']['user_id']) || isset($_SESSION['id']))
                        <li class="nav-item ms-lg-2"><a class="nav-link nav-btn-logout" href="/logout"><i class="fas fa-sign-out-alt"></i> Logout</a></li>
                    @else
                        <li class="nav-item ms-lg-2"><a class="nav-link" href="/login"><i class="fas fa-sign-in-alt"></i> Sign In</a></li>
                        <li class="nav-item ms-lg-1"><a class="nav-link nav-btn-register" href="/register">Register</a></li>
                    @endif
                    <li class="nav-item ms-lg-3">
                        <div class="theme-toggle">
                            <input type="checkbox" id="themeSwitch" />
                            <label for="themeSwitch">🌙</label>
                        </div>
                    </li>
                </ul>
            </div>
        </div>
    </nav>

    <div class="page-wrapper">
        @yield('content')
    </div>

    <footer>
        <div class="container-fluid px-md-5">
            <div class="row">
                    <div class="col-lg-6 col-md-12 footer-column">
                        <a class="footer-brand" href="/">iDecide</a>
                        <p class="footer-desc">Empowering you to make smarter, more rational buying decisions in a world of constant advertisements. Join thousands of informed consumers today.</p>
                        <div class="footer-socials">
                            <a href="https://linkedin.com" class="footer-social-icon" target="_blank" aria-label="LinkedIn"><i class="fab fa-linkedin-in"></i></a>
                            <a href="https://facebook.com" class="footer-social-icon" target="_blank" aria-label="Facebook"><i class="fab fa-facebook-f"></i></a>
                            <a href="https://twitter.com" class="footer-social-icon" target="_blank" aria-label="X"><i class="fab fa-x-twitter"></i></a>
                            <a href="https://whatsapp.com" class="footer-social-icon" target="_blank" aria-label="WhatsApp"><i class="fab fa-whatsapp"></i></a>
                        </div>
                    </div>

                    <div class="col-lg-2 col-md-4 col-4 footer-column">
                        <h4 class="footer-heading">Product</h4>
                        <ul class="footer-links">
                            <li><a href="/"><i class="fas fa-chevron-right"></i> Home</a></li>
                            <li><a href="/#questions"><i class="fas fa-chevron-right"></i> Questions</a></li>
                            <li><a href="/blogs"><i class="fas fa-chevron-right"></i> Blogs</a></li>
                        </ul>
                    </div>

                    <div class="col-lg-2 col-md-4 col-4 footer-column">
                        <h4 class="footer-heading">Resources</h4>
                        <ul class="footer-links">
                            <li><a href="/blogs"><i class="fas fa-chevron-right"></i> Guides</a></li>
                            <li><a href="/about"><i class="fas fa-chevron-right"></i> About Us</a></li>
                            <li><a href="/contact"><i class="fas fa-chevron-right"></i> Help Center</a></li>
                        </ul>
                    </div>

                    <div class="col-lg-2 col-md-4 col-4 footer-column">
                        <h4 class="footer-heading">Legal</h4>
                        <ul class="footer-links">
                            <li><a href="/privacy"><i class="fas fa-chevron-right"></i> Privacy</a></li>
                            <li><a href="/terms"><i class="fas fa-chevron-right"></i> Cookies</a></li>
                            <li><a href="/adminlogin"><i class="fas fa-chevron-right"></i> Admin</a></li>
                        </ul>
                    </div>
                </div>

                <div class="footer-divider"></div>

                <div class="footer-bottom-info">
                    <p class="mb-0">© {{ date('Y') }} iDecide. All rights reserved.</p>
                    <div class="footer-bottom-links">
                        <a href="/terms">Terms of Service</a>
                        <a href="/privacy">Privacy Policy</a>
                    </div>
                </div>
            </div>
        </footer>
    
    <div class="social-bar">
        <a href="https://linkedin.com" class="social-tile tile-linkedin" target="_blank"
            aria-label="LinkedIn"><i class="fab fa-linkedin"></i></a>
        <a href="https://facebook.com" class="social-tile tile-facebook" target="_blank"
            aria-label="Facebook"><i class="fab fa-facebook-f"></i></a>
        <a href="#" class="social-tile tile-share" aria-label="Share"><i class="fas fa-share-alt"></i></a>
        <a href="https://viber.com" class="social-tile tile-whatsapp-v2" target="_blank" aria-label="Viber"><i
                class="fab fa-viber"></i></a>
        <a href="https://whatsapp.com" class="social-tile tile-whatsapp" target="_blank"
            aria-label="WhatsApp"><i class="fab fa-whatsapp"></i></a>
        <a href="https://twitter.com" class="social-tile tile-x" target="_blank" aria-label="X"><i
                class="fab fa-x-twitter"></i></a>
        <a href="#" class="social-tile tile-sms" aria-label="SMS"><i class="fas fa-comment-sms"></i></a>
        <a href="#" class="social-tile tile-copy"
            onclick="navigator.clipboard.writeText(window.location.href); alert('Link copied!');"
            aria-label="Copy Link"><i class="far fa-copy"></i></a>
    </div>

    {{-- Scripts pushed from pages --}}
    @stack('scripts_sharethis')

    <script nonce="{{ $nonce }}" src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.5/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-k6d4wzSIapyDyv1kpU366/PK5hCdSbCRGRCMv+eplOQJWyd1fbcAu9OCUj5zNLiq" crossorigin="anonymous">
        </script>

    <script>
        function onClick(e) {
            e.preventDefault();
            grecaptcha.enterprise.ready(async () => {
                const token = await grecaptcha.enterprise.execute('6LdJW4wrAAAAAIF0ahxV2GPWxS8i7xdp5s81WQjK', {
                    action: 'LOGIN'
                });
            });
        }
    </script>




    <script type="text/javascript" nonce="{{ $nonce }}" src="public/js/index.js"></script>
    <script type="text/javascript" nonce="{{ $nonce }}" src="public/js/manifest.js"></script>
    <script type="text/javascript" nonce="{{ $nonce }}" src="public/js/vendor.js"></script>
</body>

</html>