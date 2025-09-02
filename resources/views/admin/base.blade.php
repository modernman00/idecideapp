<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1" />
  <title>@yield('title')</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet" />
</head>
<body class="bg-light">

 <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
  <div class="container-fluid">
    <!-- Brand -->
    <a class="navbar-brand" href="/admin">AdminPanel</a>

    <!-- Toggler for mobile view -->
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#adminNavbar" aria-controls="adminNavbar" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>

    <!-- Navbar links -->
    <div class="collapse navbar-collapse" id="adminNavbar">
      <ul class="navbar-nav me-auto mb-2 mb-lg-0">
        <!-- Dashboard -->
        <li class="nav-item">
          <a class="nav-link active" aria-current="page" href="blogs">Blogs</a>
        </li>

        <!-- Users -->
        <li class="nav-item">
          <a class="nav-link" href="/admin/users">Users</a>
        </li>

        <!-- Settings Dropdown -->
        <li class="nav-item dropdown">
          <a class="nav-link dropdown-toggle" href="#" id="settingsDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
            Settings
          </a>
          <ul class="dropdown-menu" aria-labelledby="settingsDropdown">
            <li><a class="dropdown-item" href="/admin/profile">Profile</a></li>
            <li><a class="dropdown-item" href="/admin/security">Security</a></li>
            <li><hr class="dropdown-divider"></li>
            <li><a class="dropdown-item" href="/logout">Logout</a></li>
          </ul>
        </li>
      </ul>

      <!-- Optional right-aligned content -->
      <span class="navbar-text text-light">
        Logged in as Admin
      </span>
    </div>
  </div>
</nav>


  @yield('content')

  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
  <script>
    function createBlog() {
      // REDIRECT TO CREATE BLOG PAGE
      window.location.href = '/createBlog';
    }

  
  </script>
</body>
</html>
