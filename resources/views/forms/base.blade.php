<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>@yield('title') | iAccountApp</title>
    <meta name="description" content="@yield('meta_description', 'iAccountApp helps you manage your finances with its intuitive tool.')">
    <meta name="keywords" content="@yield('meta_keywords', 'account management, finances, money, banking, account management app')">
    
    <!-- Bootstrap 5 CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- FontAwesome Icons -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css">
    <!-- Bootstrap Icons -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.0/font/bootstrap-icons.css">
    <!-- Custom CSS -->
    <link rel="stylesheet" type="text/css" href="/public/css/main.css?v={{ time() }}">
    
    {{-- FAVICON  --}}
    <link rel="icon" type="image/x-icon" href="/public/images/logo.png">

    <!-- If you intended to include a <noscript> block, add the opening tag -->
    <noscript>
        <link rel="stylesheet" href="/public/noscript.css" />
    </noscript>

    <script src="https://www.google.com/recaptcha/enterprise.js?render={{ $_ENV['RECAPTCHA_SITE_KEY'] }}&project={{ $_ENV['RECAPTCHA_PROJECT_ID'] }}" async defer></script>
    <!-- Favicons -->
    <link rel="icon" type="image/png" sizes="32x32" href="/public/images/logo.png">

    <style>
        @import url('https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@300;400;500;600;700;800&display=swap');

        body {
            font-family: 'Plus Jakarta Sans', sans-serif !important;
            background-color: #030712 !important;
            color: #ffffff !important;
            min-height: 100vh;
            margin: 0;
            overflow-x: hidden;
        }

        /* Custom styles to mirror the dark mode and premium look */
        .text-cyan {
            color: #0ea5e9 !important;
        }

        .text-cyan-hover {
            color: #0ea5e9 !important;
            text-decoration: none;
            transition: color 0.2s ease;
        }

        .text-cyan-hover:hover {
            color: #38bdf8 !important;
        }

        /* Reset / override form styling of forms.base */
        .styleForm {
            background: transparent !important;
            border: none !important;
            padding: 0 !important;
            box-shadow: none !important;
        }

        .styleForm h3, 
        .styleForm p, 
        .styleForm label, 
        .styleForm .text-muted,
        .styleForm a,
        .navbar-brand,
        .navbar-brand span {
            color: #ffffff !important;
        }

        /* Forms layout elements */
        .form-label {
            color: #94a3b8 !important;
            font-weight: 500 !important;
            font-size: 0.85rem !important;
            letter-spacing: 0.05em !important;
        }

        /* Input group custom style */
        .input-group {
            background-color: rgba(17, 24, 39, 0.6) !important;
            border: 1px solid #1f2937 !important;
            border-radius: 12px !important;
            transition: all 0.2s ease-in-out !important;
            overflow: hidden !important;
            display: flex;
            align-items: center;
        }

        .input-group:focus-within {
            border-color: #0ea5e9 !important;
            box-shadow: 0 0 0 4px rgba(14, 165, 233, 0.15) !important;
        }

        .input-group-text {
            background-color: transparent !important;
            border: none !important;
            color: #64748b !important;
            padding-left: 1.25rem !important;
            padding-right: 0.75rem !important;
            display: flex;
            align-items: center;
            justify-content: center;
        }

        .form-control {
           background-color: transparent !important; 
            border: none !important;
            color: #ffffff !important;
            padding: 0.85rem 1.25rem 0.85rem 0.5rem !important;
            font-size: 0.95rem !important;
        }

        .form-control:focus {
            background-color: transparent !important;
            border: none !important;
            box-shadow: none !important;
            color: #360f8aff !important;
        }

        .form-control::placeholder {
            color: #4b5563 !important;
        }

        /* Button style */
        .btn-primary {
            background-color: #0ea5e9 !important;
            border: none !important;
            border-radius: 12px !important;
            padding: 0.85rem 1.5rem !important;
            font-weight: 600 !important;
            color: #ffffff !important;
            transition: all 0.2s ease-in-out !important;
            display: inline-flex;
            align-items: center;
            justify-content: center;
        }

        .btn-primary:hover {
            background-color: #0284c7 !important;
            transform: translateY(-1px) !important;
        }

        .btn-primary:active {
            transform: translateY(1px) !important;
        }

        /* Outline/Google Button */
        .btn-outline-google {
            background-color: rgba(17, 24, 39, 0.4) !important;
            border: 1px solid #1f2937 !important;
            border-radius: 12px !important;
            color: #ffffff !important;
            font-weight: 500 !important;
            font-size: 0.95rem !important;
            padding: 0.85rem 1.5rem !important;
            display: flex !important;
            align-items: center !important;
            justify-content: center !important;
            transition: all 0.2s ease-in-out !important;
            width: 100% !important;
            text-decoration: none !important;
        }

        .btn-outline-google:hover {
            background-color: rgba(31, 41, 55, 0.6) !important;
            border-color: #374151 !important;
            color: #ffffff !important;
        }

        .btn-outline-google img {
            width: 18px;
            height: 18px;
            margin-right: 10px;
        }

        /* Divider with text */
        .divider-text {
            position: relative;
            text-align: center;
            margin-top: 1.5rem;
            margin-bottom: 1.5rem;
        }

        .divider-text::before {
            content: "";
            position: absolute;
            top: 50%;
            left: 0;
            right: 0;
            height: 1px;
            background-color: #1f2937;
            z-index: 1;
        }

        .divider-text span {
            position: relative;
            background-color: #030712;
            padding: 0 1rem;
            color: #4b5563;
            font-size: 0.75rem;
            font-weight: 600;
            letter-spacing: 0.1em;
            z-index: 2;
            text-transform: uppercase;
        }

        /* Form Check styling */
        .form-check-input {
            background-color: rgba(17, 24, 39, 0.6) !important;
            border: 1px solid #1f2937 !important;
            border-radius: 4px !important;
            margin-top: 0.15em;
        }

        .form-check-input:checked {
            background-color: #0ea5e9 !important;
            border-color: #0ea5e9 !important;
        }

        .form-check-label {
            color: #94a3b8 !important;
        }

        /* Password Toggle Icon positioning */
        .password-toggle-btn {
            background: transparent;
            border: none;
            color: #64748b;
            padding-right: 1.25rem;
            cursor: pointer;
            display: flex;
            align-items: center;
            justify-content: center;
        }

        .password-toggle-btn:hover {
            color: #94a3b8;
        }

        /* Social float bar overlay hide (unneeded on this design) */
        .social-bar {
            display: none !important;
        }

        .loader {
            border: 4px solid rgba(14, 165, 233, 0.1);
            border-radius: 50%;
            border-top: 4px solid #0ea5e9;
            width: 40px;
            height: 40px;
            -webkit-animation: spin 1s linear infinite;
            animation: spin 1s linear infinite;
            margin: 0 auto;
        }

        @-webkit-keyframes spin {
            0% { -webkit-transform: rotate(0deg); }
            100% { -webkit-transform: rotate(360deg); }
        }

        @keyframes spin {
            0% { transform: rotate(0deg); }
            100% { transform: rotate(360deg); }
        }
        
        .hover-white:hover {
            color: #ffffff !important;
        }
    </style>
</head>

<body data-page-id="@yield('data-page-id')">

    <div class="container-fluid p-0">
        <div class="row g-0 min-vh-100">
            <!-- Left Pane: Forensic Branding & Stats (Hidden on mobile/tablet, visible on large screens) -->
            <div class="col-lg-6 d-none d-lg-flex flex-column justify-content-between p-5 position-relative overflow-hidden" style="background: radial-gradient(circle at 30% 30%, #0c1e35 0%, #030712 100%); min-height: 100vh;">
                <!-- Glowing cyan effect -->
                <div class="position-absolute" style="top: -200px; left: -200px; width: 600px; height: 600px; background: radial-gradient(circle, rgba(14, 165, 233, 0.12) 0%, rgba(14, 165, 233, 0) 70%); pointer-events: none;"></div>
                
                <!-- Logo and Brand -->
                <div class="z-1">
                    <a class="d-flex align-items-center text-decoration-none text-white fs-4 fw-bold" href="/">
                        <i class="fa fa-balance-scale-left me-2" aria-hidden="true"></i><span>iDecide</span>
                    </a>
                </div>

                <!-- Middle Content -->
                <div class="z-1 my-auto py-5" style="max-width: 520px;">
                    <h1 class="display-4 fw-bold mb-4 text-white" style="letter-spacing: -1.5px; line-height: 1.15;">
                        Spending Decision<br><span style="color: #0ea5e9; background: linear-gradient(to right, #0ea5e9, #38bdf8); -webkit-background-clip: text; -webkit-text-fill-color: transparent;">Platform</span>
                    </h1>
                    <p class="text-secondary fs-5 lh-base mb-0" style="color: #94a3b8 !important;">
                        Make informed spending decisions with powerful analytics and insights.
                    </p>
                </div>

                <!-- Bottom Stats -->
                <div class="z-1 row g-4 border-top border-secondary border-opacity-25 pt-4">
                    <div class="col-4">
                        <h4 class="fw-bold text-white mb-1">$2.5B+</h4>
                        <p class="small text-secondary mb-0" style="color: #64748b !important;">Assets Protected</p>
                    </div>
                    <div class="col-4 border-start border-secondary border-opacity-25 ps-4">
                        <h4 class="fw-bold text-white mb-1">99.9%</h4>
                        <p class="small text-secondary mb-0" style="color: #64748b !important;">Accuracy Rate</p>
                    </div>
                    <div class="col-4 border-start border-secondary border-opacity-25 ps-4">
                        <h4 class="fw-bold text-white mb-1">500+</h4>
                        <p class="small text-secondary mb-0" style="color: #64748b !important;">Enterprise Clients</p>
                    </div>
                </div>
            </div>

            <!-- Right Pane: Authentication Form -->
            <div class="col-lg-6 col-12 d-flex flex-column justify-content-between p-4 p-md-5" style="background-color: #030712; min-height: 100vh;">
                <!-- Logo for mobile/tablet screens only -->
                <div class="d-lg-none mb-4 text-center mt-3">
                    <a class="d-inline-flex align-items-center text-decoration-none text-white fs-4 fw-bold" href="/">
                        <div class="d-flex align-items-center justify-content-center bg-info bg-opacity-10 rounded-3 p-2 me-2 border border-info border-opacity-20" style="width: 40px; height: 40px;">
                            <i class="fas fa-chart-line text-info"></i>
                        </div>
                        <span>iAccountApp</span>
                    </a>
                </div>

                <!-- Main Form Wrapper -->
                <div class="my-auto mx-auto w-100" style="max-width: 420px; padding: 1.5rem 0;">
                    @yield('content')
                </div>

                <!-- Footer (Inside the Right Pane) -->
                <div class="text-center w-100 pt-4 border-top border-secondary border-opacity-10">
                    <p class="small text-secondary mb-0" style="color: #475569 !important;">
                        By signing in, you agree to our <a href="/terms" class="text-secondary text-decoration-underline hover-white">Terms of Service</a> and <a href="/privacy" class="text-secondary text-decoration-underline hover-white">Privacy Policy</a>
                    </p>
                </div>
            </div>
        </div>
    </div>

    @yield('modals')

    <!-- Bootstrap 5 JavaScript Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>

    <script>
        document.addEventListener('DOMContentLoaded', () => {
            // Password Visibility Toggle JS
            const toggles = document.querySelectorAll('.password-toggle-btn');
            toggles.forEach(btn => {
                btn.addEventListener('click', () => {
                    const targetId = btn.getAttribute('data-target');
                    const input = document.getElementById(targetId);
                    const icon = btn.querySelector('i');
                    if (input && icon) {
                        if (input.type === 'password') {
                            input.type = 'text';
                            icon.classList.replace('fa-eye', 'fa-eye-slash');
                        } else {
                            input.type = 'password';
                            icon.classList.replace('fa-eye-slash', 'fa-eye');
                        }
                    }
                });
            });
        });
    </script>

    <script>
        window.RECAPTCHA_SITE_KEY = "{{ $_ENV['RECAPTCHA_SITE_KEY'] }}";
    </script>

    <script nonce="{{ $nonce }}" src="/public/js/manifest.js?v={{ time() }}" defer></script>
    <script nonce="{{ $nonce }}" src="/public/js/vendor.js?v={{ time() }}" defer></script>
    <script nonce="{{ $nonce }}" src="/public/js/index.js?v={{ time() }}" defer></script>
    <script type="text/javascript" src="/public/js/pwa-init.js" defer></script>

</body>

</html>