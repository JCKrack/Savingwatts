<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <meta http-equiv="X-UA-Compatible" content="ie=edge" />
    <link
      rel="stylesheet"
      href="https://use.fontawesome.com/releases/v5.0.13/css/all.css"
      integrity="sha384-DNOHZ68U8hZfKXOrtjWvjxusGo9WQnrNx2sqG0tfsghAvtVlRW3tvkXWZh58N9jp"
      crossorigin="anonymous"
    />
    <link rel="stylesheet" href="css/bootstrap.min.css" />
    <link rel="stylesheet" href="css/style.css" />
    <title>Dashboard</title>
  </head>
  <body onload="init()">
    <!-- Navbar -->
    <nav class="navbar navbar-expand-sm navbar-dark bg-dark bm-3">
      <div class="container">
        <a href="#" class="navbar-brand">Savingwatts</a>
        <button
          class="navbar-toggler"
          data-toggle="collapse"
          data-target="#navbarNav"
        >
          <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNav">
          <ul class="navbar-nav ml-auto">
            <li class="nav-item">
              <a href="#" class="nav-link">Dashboard</a>
            </li>
            <li class="nav-item">
              <a href="#" class="nav-link">Search</a>
            </li>
            <li class="nav-item dropdown">
              <a
                href="#"
                class="nav-link dropdown-toggle"
                data-toggle="dropdown"
                >Account</a
              >
              <div class="dropdown-menu">
                <a href="#" class="dropdown-item">Profile</a>
                <a href="#" class="dropdown-item">Settings</a>
                <a href="#" class="dropdown-item">Logout</a>
              </div>
            </li>
          </ul>
        </div>
      </div>
    </nav>
    <!--Content-->
        @yield('content')
    <!-- Javascript files sources -->
    <script src="js/jquery-3.3.1.min.js"></script>
    <script src="js/popper.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script src="js/fusioncharts/fusioncharts.js"></script>
    <script src="js/fusioncharts/fusioncharts.charts.js"></script>
    <script src="js/fusioncharts/themes/fusioncharts.theme.fusion.js"></script>
    <!--<script src="js/javascript.js"></script>-->
    <script src="js/index.js"></script>
    <script>
      
    </script>
  </body>
</html>
