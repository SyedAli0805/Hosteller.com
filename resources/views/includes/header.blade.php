<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1" />
  <title>Sticky Navbar</title>

  <!-- Font Awesome -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" />

  <!-- Bootstrap -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet" />

  <style>
    /* General */
    body {
      background-color: #ffffff !important;
      font-family: Arial, sans-serif;
      margin: 0;
      padding: 0;
      overflow-x: hidden;
    }

    * {
      user-select: none;
      box-sizing: border-box;
    }

    /* Sticky Header */
    header {
      position: sticky;
      top: 0;
      z-index: 999;
      backdrop-filter: blur(10px);
      background-color: white;
      box-shadow: 0 2px 6px rgba(0,0,0,0.05);
    }

    .navbar {
      background-color: transparent;
      padding: 15px 30px;
    }

    .nav-wrapper {
      display: flex;
      justify-content: space-between;
      align-items: center;
      flex-wrap: wrap;
      gap: 10px;
    }

    /* Logo */
    .nav-logo {
      flex-shrink: 0;
      opacity: 0;
      transform: translateY(-20px);
      animation: fadeSlide 0.5s ease-out forwards 0.2s;
    }

    .nav-logo img {
      width: 50px;
      height: 50px;
      border-radius: 50%;
    }

    /* Center pill */
    .nav-center-pill {
      background-color: white;
      border-radius: 50px;
      padding: 8px 20px;
      box-shadow: 0 4px 12px rgba(0, 0, 0, 0.06);
      display: flex;
      flex-wrap: wrap;
      align-items: center;
      gap: 15px;
      justify-content: center;
      max-width: 800px;
      width: 100%;
      flex-grow: 0;
      opacity: 0;
      transform: translateY(-20px);
      animation: fadeSlide 0.6s ease-out forwards 0.4s;
    }

    .nav-center-pill .nav-link {
      position: relative;
      padding: 8px 16px;
      border-radius: 30px;
      color: #111;
      transition: all 0.3s ease;
      font-weight: 500;
      z-index: 1;
      text-decoration: none;
      white-space: nowrap;
    }

    .nav-center-pill .nav-link:hover,
    .nav-center-pill .nav-link.active {
      color: white !important;
    }

    .nav-center-pill .nav-link::before {
      content: "";
      position: absolute;
      top: 0;
      left: 0;
      width: 100%;
      height: 100%;
      background-color: #430b05c7;
      border-radius: 30px;
      z-index: -1;
      transform: scaleX(0);
      transform-origin: left;
      transition: transform 0.3s ease;
    }

    .nav-center-pill .nav-link:hover::before,
    .nav-center-pill .nav-link.active::before {
      transform: scaleX(1);
    }

    /* Search Bar */
    .nav-center-pill form {
      display: flex;
      gap: 6px;
      align-items: center;
      background-color: #f9f9f9;
      padding: 5px 10px;
      border-radius: 30px;
      box-shadow: inset 0 1px 3px rgba(0, 0, 0, 0.08);
    }

    .nav-center-pill input[type="search"] {
      border: none;
      outline: none;
      padding: 6px 12px;
      border-radius: 30px;
      background-color: white;
      font-size: 14px;
      width: 180px;
    }

    .nav-center-pill input[type="search"]::placeholder {
      color: #aaa;
      font-style: italic;
    }

    .nav-center-pill button[type="submit"] {
      border-radius: 30px;
      padding: 6px 12px;
      font-size: 14px;
      border: none;
      background-color: #430b05c7;
      color: white;
      display: flex;
      align-items: center;
      justify-content: center;
      transition: background-color 0.3s ease;
    }

    .nav-center-pill button[type="submit"]:hover {
      background-color: #2e0602;
    }

    /* Right pill */
    .nav-right-pill {
      background-color: white;
      border-radius: 50px;
      padding: 10px 15px;
      box-shadow: 0 4px 12px rgba(0, 0, 0, 0.06);
      display: flex;
      gap: 10px;
      align-items: center;
      flex-shrink: 0;
      opacity: 0;
      transform: translateY(-20px);
      animation: fadeSlide 0.5s ease-out forwards 0.6s;
    }

    .nav-right-pill .btn {
      border: none;
      border-radius: 30px;
      padding: 6px 18px;
      font-size: 14px;
      font-weight: 500;
      color: white;
      background-color: #430b05c7;
      transition: background-color 0.3s ease;
    }

    .nav-right-pill .btn:hover {
      background-color: #2e0602;
      color: white;
    }

    .nav-right-pill .dropdown-toggle {
      background-color: white;
      color: #430b05c7;
      border: 1px solid #430b05c7;
    }

    .nav-right-pill .dropdown-toggle:hover {
      background-color: #430b05c7;
      color: white;
    }

    /* Responsive */
    @media (max-width: 768px) {
      .nav-wrapper {
        flex-direction: column;
        align-items: stretch;
      }

      .nav-center-pill,
      .nav-right-pill {
        justify-content: center;
        width: 100%;
      }

      .nav-center-pill form {
        width: 100%;
        justify-content: center;
      }

      .nav-center-pill input[type="search"] {
        flex: 1;
      }
    }

    /* Animation */
    @keyframes fadeSlide {
      from {
        opacity: 0;
        transform: translateY(-20px);
      }
      to {
        opacity: 1;
        transform: translateY(0);
      }
    }
  </style>
</head>
<body>

<header>
  <nav class="navbar">
    <div class="container-fluid nav-wrapper">

      <!-- Logo -->
      <div class="nav-logo">
        <a href="{{ route('home') }}">
          <img src="{{ asset('img/logo.png') }}" alt="Hosteller Logo" />
        </a>
      </div>

      <!-- Center Pill -->
      <div class="nav-center-pill">
        <a class="nav-link {{ Request::is('home') ? 'active' : '' }}" href="{{ url('http://127.0.0.1:8000/home') }}">Home</a>
        <a class="nav-link" href="{{ url('http://127.0.0.1:8000/home#services') }}">Services</a>
        <a class="nav-link" href="{{ url('http://127.0.0.1:8000/home#about') }}">About</a>
        <a class="nav-link" href="{{ url('http://127.0.0.1:8000/home#contact') }}">Contact</a>

        <form method="GET" action="search">
          <input type="search" name="query" placeholder="Search for hostel" aria-label="Search">
          <button type="submit">
            <i class="fa fa-search"></i>
          </button>
        </form>
      </div>

      <!-- Right Pill -->
      <div class="nav-right-pill">
        @guest
          <a class="btn" href="{{ route('register') }}">Register</a>
          <a class="btn" href="{{ route('login') }}">Login</a>
        @else
          <a class="btn" href="{{ route('bookings') }}">View Booking</a>
          <div class="dropdown">
            <a id="navbarDropdown" class="btn dropdown-toggle" href="#" role="button"
               data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
              {{ Auth::user()->name }}
            </a>

            <div class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">
              <a class="dropdown-item" href="{{ route('logout') }}"
                 onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                {{ __('Logout') }}
              </a>

              <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                @csrf
              </form>
            </div>
          </div>
        @endguest
      </div>

    </div>
  </nav>
</header>

<!-- Bootstrap JS -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
