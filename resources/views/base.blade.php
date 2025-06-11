<!DOCTYPE html>
<html lang="en" data-theme="light">

<head>
 <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=5.0, user-scalable=yes">
    <meta name="robots" content="index, follow">
    <meta name="description" content="iDecide helps you make informed decisions with an intuitive tool. Evaluate options, get real-time scores, and receive personalized advice.">
    <meta name="keywords" content="decision matrix, decision making, iDecide, tool, evaluation, advice">
    <meta name="author" content="iDecide">
    <meta name="generator" content="BladeOne">
      <meta http-equiv="Content-Security-Policy" content="default-src 'self'; script-src 'self' 'unsafe-inline' 'unsafe-eval' https://cdn.jsdelivr.net https://cdnjs.cloudflare.com; style-src 'self' 'unsafe-inline' https://cdn.jsdelivr.net https://cdnjs.cloudflare.com; img-src 'self' data: <?php echo getenv('APP_URL') ?: ''; ?>; font-src 'self' https://cdnjs.cloudflare.com; connect-src 'self' <?php echo getenv('APP_URL') ?: ''; ?>;">
    <meta name="referrer" content="strict-origin-when-cross-origin">

    <!-- Open Graph / Facebook -->
    <meta property="og:type" content="website">
    <meta property="og:title" content="@yield('title', 'iDecide Decision Matrix')">
    <meta property="og:description" content="Make confident decisions with iDecide Decision Matrix. Explore our tool for personalized insights and real-time scoring.">
    <meta property="og:image" content="<?php echo getenv('APP_URL') ?: ''; ?>/public/images/logo/default.png">
    <meta property="og:url" content="<?php echo getenv('APP_URL') ?: ''; ?>">
    <meta property="og:site_name" content="iDecide Decision Matrix">

    <!-- Twitter Card -->
    <meta name="twitter:card" content="summary_large_image">
    <meta name="twitter:title" content="@yield('title', 'iDecide Decision Matrix')">
    <meta name="twitter:description" content="Make confident decisions with iDecide Decision Matrix. Explore our tool for personalized insights and real-time scoring.">
    <meta name="twitter:image" content="<?php echo getenv('APP_URL') ?: ''; ?>/public/images/logo/default.png">
    <meta name="twitter:site" content="@iDecide">

    <!-- Favicon and Apple Touch Icon -->
    <link rel="icon" type="image/x-icon" href="<?php echo getenv('APP_URL') ?: ''; ?>/public/images/logo/default.png">
    <link rel="apple-touch-icon" sizes="180x180" href="<?php echo getenv('APP_URL') ?: ''; ?>/public/images/logo/default.png">

    <!-- Canonical URL -->
    <link rel="canonical" href="<?php echo getenv('APP_URL') ?: ''; ?>">

    {{-- FAVICON  --}}
    <link rel="icon" type="image/x-icon" href="<?php echo getenv('APP_URL') ?: ''; ?>/public/images/logo/default.png">

    <!-- Dynamic Metadata -->
    <title>@yield('title', 'Decision Matrix') - Decision Making Tool</title>
    <meta name="date" content="{{ date('Y-m-d\TH:i:sP') }}"> <!-- e.g., 2025-06-09T17:01:00+01:00 -->

  <!-- CSS and Fonts -->
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css">


  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.5/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-SgOJa3DmI69IUzQ2PVdRZhwQ+dy64/BUtbMJw1MZ8t5HZApcHrRKUc4W0kG879m7" crossorigin="anonymous">

    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>


  <link rel="stylesheet" type="text/css" href="public/css/index.css">

<style>
  /* make the hero image responsive */
 body {
            background-color: var(--background-light);
       
            margin: 0;
            padding: 0;
            min-height: 100vh;
            display: flex;
            flex-direction: column;
        }
/* create a dynamic upper and lower margin around the submit button */
.hero {
  background: url("/public/images/MONEY.jpg") no-repeat center center/cover;
  height: 100vh;
  display: flex;
  flex-direction: column;
  justify-content: center;
  align-items: center;
  color: white;
  text-align: center;
  background-color: rgba(0, 0, 0, 0.5);
}

:root {
            --primary-color: #00c4cc; /* Teal */
            --secondary-color: #ff6f61; /* Coral */
            --success-color: #28a745;
            --warning-color: #ffc107;
            --danger-color: #dc3545;
            --background-light: #f8f9fa;
            --background-dark: #2c3e50; /* Dark slate blue */
            --text-light: #ecf0f1; /* Light gray */
            --text-dark: #212529;
        }

        [data-theme="dark"] {
            --background-light: #2c3e50;
            --background-dark: #1a252f;
            --text-light: #ecf0f1;
            --text-dark: #bdc3c7;
        }


.h-100 {
  width: 100%;
  /* Make image fill the container */
  height: 200px;
  /* Set a fixed height */
  object-fit: cover;
  /* Crop the image to fit, preserving aspect ratio */
  object-position: center;
  /* Center the image within the container */
  border-radius: 6px;
  transition: transform 0.3s ease, box-shadow 0.3s ease;
  cursor: pointer;
}

.overlay {
  background-color: rgba(0, 0, 0, 0.6);
  padding: 60px;
  border-radius: 10px;
}

h1 {
  font-size: 3em;
  font-weight: bold;
  margin-bottom: 20px;
}

.email {
  width: 50%;
}

.cta-button {
  background-color: #ff9900;
  border: none;
  padding: 15px 30px;
  font-size: 1.2em;
  border-radius: 5px;
  color: white;
  cursor: pointer;
  text-decoration: none;
  transition: background 0.3s;
}

.cta-button:hover {
  background-color: #e68a00;
}

/* add a hover to each card to have some transition when hover upon  */
.card {
  transition: transform 0.2s;
}

.card:hover {
  transform: scale(1.05);
}
.d-grid {
  margin: 2rem auto;
}

.allCards {
  margin: 2rem auto;
}

.description {
  display: flex;
  justify-content: space-between;
  align-items: center;
  margin: 2rem 0;
}

.subtitle {
  font-size: 1.2em;
  line-height: 1.5;
  color: #333;
  font-family: "Figtree", sans-serif;
  text-align: justify;
}

/**!To add a modern touch, animate cards as they come into the viewport. Using the Intersection Observer API:*/

.hidden {
  opacity: 0;
  transform: translateY(50px);
  transition: opacity 0.6s ease-out, transform 0.6s ease-out;
}

.visible {
  opacity: 1;
  transform: translateY(0);
}

        .content {
            flex: 1 0 auto;
        }

        footer {
        
            background: linear-gradient(90deg, #2c3e50, #3498db); /* Gradient from slate blue to light blue */
            color: var(--text-light);
            padding: 1rem 0;
            display: flex;
            justify-content: space-around;
            align-items: center;
            box-shadow: 0 -2px 10px rgba(0, 0, 0, 0.2);
            width: 100%;
        }

        .footer-column {
            flex: 1;
            text-align: center;
        }

        .footer-links a,
        .footer-social a {
            color: var(--text-light);
            text-decoration: none;
            margin: 0 0.5rem;
            transition: color 0.3s, transform 0.3s;
        }

        .footer-links a:hover,
        .footer-social a:hover {
            color: var(--secondary-color);
            transform: scale(1.1);
        }

        .footer-social a i {
            font-size: 1.2rem;
        }

        .footer-copyright {
            font-size: 0.9rem;
            margin-top: 0.5rem;
        }

            .navbar {
            background-color: var(--background-dark);
            padding: 0.5rem 1rem;
        }

        .navbar-brand {
            color: var(--primary-color) !important;
            font-size: 1.5rem;
            font-weight: bold;
        }

        .navbar-nav .nav-link {
            color: var(--text-light) !important;
            font-size: 1rem;
            margin: 0 0.5rem;
        }

        .navbar-nav .nav-link:hover {
            color: var(--secondary-color) !important;
        }

        .theme-toggle {
            cursor: pointer;
        }

            @media (max-width: 768px) {
            .navbar-brand {
                font-size: 1.2rem;
            }
            .navbar-nav .nav-link {
                font-size: 0.9rem;
            }
            footer {
                flex-direction: column;
                padding: 0.5rem 0;
            }
            .footer-column {
                margin: 0.5rem 0;
            }
            .footer-links a,
            .footer-social a {
                display: block;
                margin: 0.25rem 0;
            }
        }

</style>
</head>

<body>

      <nav class="navbar navbar-expand-lg">
        <div class="container-fluid">
            <a class="navbar-brand" href="/">Decision Matrix</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav ms-auto">
                    <li class="nav-item">
                        <a class="nav-link" href="/">Home</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="about">About</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="contact">Contact</a>
                    </li>
                     <li class="nav-item">
                        <a class="nav-link" href="/#questions">Questions</a>
                    </li>
                     <li class="nav-item">
                        <a class="nav-link" href="blogs">Blogs</a>
                    </li>
                </ul>
                <div class="theme-toggle ms-3">
                    <input type="checkbox" id="themeSwitch" />
                    <label for="themeSwitch">🌙</label>
                </div>
            </div>
        </div>
    </nav>

      {{-- <header>
        <!-- Add your header content here if any -->
        <div class="theme-toggle" style="position: absolute; top: 1rem; right: 1rem;">
            <input type="checkbox" id="themeSwitch" />
            <label for="themeSwitch">🌙</label>
        </div>
    </header> --}}



  @yield('content')


     <footer>
        <div class="footer-column footer-links">
            <a href="/about">About</a>
            <a href="/contact">Contact</a>
            <a href="/privacy">Privacy</a>
              <a href="terms">T&C</a>
            <a href="/blogs">Blogs</a>
        </div>
        <div class="footer-column footer-social">
            <a href="https://twitter.com" target="_blank"><i class="fab fa-twitter"></i></a>
            <a href="https://whatsapp.com" target="_blank"><i class="fab fa-whatsapp"></i></a>
            <a href="https://linkedin.com" target="_blank"><i class="fab fa-linkedin"></i></a>
        </div>
        <div class="footer-column footer-copyright">
            <p>© {{ date('Y') }} Decision Matrix. All rights reserved.</p>
            <p>Designed by Modernman</p>
        </div>
    </footer>
  <!-- Bootstrap core JavaScript -->

  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.5/dist/js/bootstrap.bundle.min.js" integrity="sha384-k6d4wzSIapyDyv1kpU366/PK5hCdSbCRGRCMv+eplOQJWyd1fbcAu9OCUj5zNLiq" crossorigin="anonymous">
  </script>
  <script src="public/js/index.js"></script>
  <script src="public/js/manifest.js"></script>
  <script src="public/js/vendor.js"></script>

    <script>
        document.getElementById('themeSwitch').addEventListener('change', function() {
            document.body.dataset.theme = this.checked ? 'dark' : 'light';
        });
    </script>
</body>

</html>
