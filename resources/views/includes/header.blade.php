<style>
  body{
    color:black;
  }
</style>
<header id="header">
    <nav class="navbar navbar-expand-lg navbar-light bg-transparent">
      <div class="container-fluid">
        <!-- Logo and Search -->
        <div class="d-flex align-items-center">
          <a class="navbar-brand me-3" href="{{route('home')}}">
            <img src="{{ asset('img/logo.png') }}" alt="Hosteller Logo" width="60" height="60" class="rounded-circle">
          </a>
          <form class="d-flex w-100" method="GET" action="search">
            <input type="search" name="query" class="form-control" placeholder="Search for hostel" aria-label="Search">
            <button type="submit" class="btn btn-outline-secondary">
              <i class="fa fa-search"></i>
            </button>
          </form>
        </div>
        <!-- Toggler -->
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent"
          aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>
        <!-- Navbar links and buttons -->
        <div class="collapse navbar-collapse justify-content-end" id="navbarSupportedContent">
          <ul class="navbar-nav me-auto mb-2 mb-lg-0">
            <li class="nav-item">
              <a class="nav-link" href="{{url('http://127.0.0.1:8000/home')}}">Home</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="{{url('http://127.0.0.1:8000/home#services')}}">Services</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="{{url('http://127.0.0.1:8000/home#about')}}">About</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="{{url('http://127.0.0.1:8000/home#contact')}}">Contact</a>
            </li>
          </ul>
          <ul class="navbar-nav">
            @guest
            <!-- Check if the user is not logged in -->
            <li class="nav-item">
              <a class="btn btn-outline-primary" href="{{ route('register') }}">Register</a>
            </li>
            <li class="nav-item">
              <a class="btn btn-outline-primary mx-2" href="{{ route('login') }}">Login</a>
            </li>
            @else
            <!-- User is logged in -->
            <li class="nav-item">
              <a class="btn btn-outline-success" href="{{ route('bookings') }}">View Booking</a>
            </li>
            <li class="nav-item dropdown">
              <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown"
                aria-haspopup="true" aria-expanded="false" v-pre>
                {{ Auth::user()->name }}
              </a>
   
              <div class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">
                <a class="dropdown-item" href="{{ route('logout') }}" onclick="event.preventDefault();
                                   document.getElementById('logout-form').submit();">
                  {{ __('Logout') }}
                </a>
   
                <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                  @csrf
                </form>
              </div>
            </li>
            @endguest
          </ul>
        </div>
      </div>
    </nav>
</header>   