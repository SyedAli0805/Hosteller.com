<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Hosteller</title>
  <link rel="icon" type="image/x-icon" href="{{ asset('img/logo.png') }}">
  <link rel="stylesheet" href="{{ asset('css/index.css') }}">
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css">
<script src="https://unpkg.com/@lottiefiles/lottie-player@latest/dist/lottie-player.js"></script>

</head>

<body>
  @include('includes.header')
  <!-- Hero Section with Blob Background -->
<section class="position-relative text-white text-center d-flex align-items-center justify-content-center"
         style="min-height: 80vh; overflow: hidden; background-color: #ffffff;">
  
  <!-- Left-side Blob Background Behind Icons -->
  <svg viewBox="0 0 200 200" xmlns="http://www.w3.org/2000/svg"
       class="position-absolute" style="top: 50%; left: 0; transform: translate(-30%, -50%); width: 400px; height: 900px; z-index: 1;">
    <path fill="#430b05bb"
          d="M38.5,-62.3C48.5,-53.5,54.2,-40.4,62.8,-27.1C71.4,-13.7,82.9,-0.1,79.9,10.5C76.8,21.1,59.3,28.6,48.1,41.8C36.9,55,32,73.8,20.4,83.7C8.8,93.5,-9.6,94.4,-20.9,84.9C-32.3,75.4,-36.6,55.4,-41.6,40.9C-46.6,26.4,-52.3,17.4,-56.6,6.4C-60.9,-4.6,-63.7,-17.5,-61.8,-31C-60,-44.6,-53.5,-58.8,-42.4,-67.1C-31.3,-75.4,-15.7,-77.7,-0.7,-76.6C14.3,-75.5,28.5,-71,38.5,-62.3Z"
          transform="translate(100 100)" />
  </svg>

  <!-- Existing Blob Background (Center) -->
  <svg viewBox="0 0 200 200" xmlns="http://www.w3.org/2000/svg"
       class="position-absolute w-100 h-100" style="top: 0; left: 0; z-index: 0;">
    <path fill="#430b05"
          d="M41.9,-75.3C53.8,-65.7,62.4,-53.4,64.7,-40.4C67,-27.4,62.8,-13.7,61.5,-0.7C60.3,12.2,61.8,24.4,58,34.7C54.1,44.9,44.9,53.3,34.3,57.6C23.7,61.8,11.9,62,0.5,61.1C-10.8,60.1,-21.5,58,-31.9,53.7C-42.3,49.3,-52.2,42.6,-61.6,33.2C-71,23.9,-79.9,12,-80.1,-0.1C-80.3,-12.2,-72,-24.5,-65.4,-38.6C-58.8,-52.8,-53.9,-68.9,-43.3,-79.2C-32.7,-89.4,-16.4,-93.8,-0.7,-92.6C15,-91.5,30.1,-84.8,41.9,-75.3Z"
          transform="translate(250 100)" />
  </svg>

  <!-- Social Icons -->
  <div class="position-absolute start-0 top-50 translate-middle-y d-flex flex-column align-items-center gap-3 ps-3" style="z-index: 2;">
    <a href="#" class="text-white icon-animated"><i class="fab fa-facebook fa-lg"></i></a>
    <a href="#" class="text-white icon-animated"><i class="fab fa-instagram fa-lg"></i></a>
    <a href="#" class="text-white icon-animated"><i class="fab fa-twitter fa-lg"></i></a>
    <a href="#" class="text-white icon-animated"><i class="fab fa-linkedin fa-lg"></i></a>
  </div>

  <!-- Hero Content -->
  <div class="container position-relative" style="z-index: 3;">
    <div class="row flex-column-reverse flex-md-row align-items-center text-dark text-md-start">
      
      <!-- Text -->
<div class="col-md-6 text-center text-md-start mt-4 mt-md-0 hero-text-animate">
  <h1 class="fw-bold display-4">Find Your Perfect Hostel</h1>
  <p class="lead">Explore affordable and comfortable hostels at your favorite destinations. Easy search, instant booking, and secure listings.</p>
  <a href="#cards" class="btn btn-explore mt-3">Explore Now</a>

</div>


      <!-- Lottie Animation -->
      <div class="col-md-6 d-flex justify-content-end">
        <lottie-player 
          src="{{ asset('lotties/searching.json') }}"
          background="transparent"
          speed="0.8"
          style="width: 100%; max-width: 400px; height: auto;"
          loop
          autoplay>
        </lottie-player>
      </div>
    </div>
  </div>
</section>

  

  <!-- Cards Section -->
  <!-- <section id="cards" class="container my-5">
    <div class="row row-cols-1 row-cols-md-3 g-4">
      @foreach ($hostels as $hostel)
      <div class="col">
        <div class="card h-100 shadow-sm border-0">
          <img src="{{asset('storage/' .$hostel->hostel_image_path)}}" class="card-img-top rounded-top" alt="{{ $hostel->hostel_name }}">
          <div class="card-body">
            <h5 class="card-title text-primary fw-bold">{{$hostel->hostel_name}}</h5>
            <h6 class="card-subtitle mb-2 text-success fw-bold">${{$hostel->room_price}}/room</h6>
            <p class="card-text">{{$hostel->hostel_description}}</p>
          </div>
          <div class="card-footer d-flex justify-content-between bg-light border-0">
            <a href="{{" createBookings/".$hostel->id}}">
              <button class="btn btn-success"><i class="fas fa-bed"></i> Book Now</button>
            </a>
            <form action="search" method="GET">
              <input type="hidden" name="query" value="{{ $hostel->id }}">
              <button type="submit" class="btn btn-info"><i class="fas fa-info-circle"></i> View Details</button>
            </form>
          </div>
        </div>
      </div>
      @endforeach
    </div>
    <div class="d-flex justify-content-center mt-4">
      <a href="{{url('search')}}">
        <button type="submit" class="btn btn-secondary">View All <i class="fas fa-arrow-right"></i></button>
      </a>
    </div>
  </section> -->

  <!-- Call to Action -->
  <!-- <section id="cta" class="container my-5">
    <div class="row">
      <div class="col text-center">
        <h2>Ready to book your stay?</h2>
        <p>Explore our hostels and find the perfect place for your next adventure.</p>
        <a href="{{url('search')}}" class="btn btn-secondary">Book Now</a>
      </div>
    </div>
  </section> -->

  <!-- Testimonials Section -->
  <!-- <section id="testimonials" class="container my-5">
    <div class="row">
      <div class="col text-center">
        <h2>What our customers say</h2>
      </div>
    </div>
    <div class="row mt-4">
      @foreach ($messages as $message)
      <div class="col-md-4">
        <div class="card h-100 shadow-sm border-0">
          <div class="card-body">
            <p class="card-text">{{$message->message}}</p>
          </div>
          <div class="card-footer bg-light border-0">
            <small class="text-muted">- {{$message->name}}</small>
          </div>
        </div>
      </div>
      @endforeach
    </div>
  </section> -->

  <!-- Benefits Section -->
  <!-- <section id="benefits" class="container my-5">
    <div class="row">
      <div class="col text-center">
        <h2>Why Choose Us?</h2>
      </div>
    </div>
    <div class="row mt-4">
      <div class="col-md-4">
        <i class="fas fa-users fa-3x mb-3 d-block mx-auto"></i>
        <h4 class="text-center">Wide Selection</h4>
        <p class="text-center">Explore a wide range of hostels catering to different budgets and preferences.</p>
      </div>
      <div class="col-md-4">
        <i class="fas fa-map-marked-alt fa-3x mb-3 d-block mx-auto"></i>
        <h4 class="text-center">Convenient Locations</h4>
        <p class="text-center">Find hostels conveniently located near popular attractions and public transportation.</p>
      </div>
      <div class="col-md-4">
        <i class="fas fa-shield-alt fa-3x mb-3 d-block mx-auto"></i>
        <h4 class="text-center">Verified Listings</h4>
        <p class="text-center">Rest assured with verified hostel listings and reviews from fellow travelers.</p>
      </div>
    </div>
  </section>

  Featured Destinations Section -->
  <!-- <section id="destinations" class="container my-5">
    <div class="row">
      <div class="col text-center">
        <h2>Featured Destinations</h2>
        <p>Explore some of our popular hostel locations</p>
      </div>
    </div>
    <div class="row mt-4">
      <div class="col-md-4">
        <img src="{{asset('img/islamabad.jpg')}}" class="img-fluid rounded mb-3" alt="Islamabad">
        <h4 class="text-center">Islamabad</h4>
      </div>
      <div class="col-md-4">
        <img src="{{asset('img/lahore.jpg')}}" class="img-fluid rounded mb-3" alt="Lahore">
        <h4 class="text-center">Lahore</h4>
      </div>
      <div class="col-md-4">
        <img src="{{asset('img/karachi.jpg')}}" class="img-fluid rounded mb-3" alt="Karachi">
        <h4 class="text-center">Karachi</h4>
      </div>
    </div>
  </section>  -->
  <!-- Contact Section -->
  <!-- <section id="contact" class="container my-5">
    <div class="row justify-content-center">
      <div class="col-12 col-md-10 col-lg-8"> -->
        <!-- Adjusted column sizes for better responsive behavior -->
        <!-- <h2 class="text-center">Contact Us</h2>
        <p class="text-center">Have a question or feedback? Drop us a message below.</p>
        <form action="{{url('/contact')}}" method="POST">
          @csrf
          <div class="mb-3">
            <input type="text" class="form-control form-control-lg"
              style="max-width: 100%; width: 80%; margin: auto; font-size: 1rem;" id="name" name="name"
              placeholder="Your Name">
          </div>
          <div class="mb-3">
            <input type="email" class="form-control form-control-lg"
              style="max-width: 100%; width: 80%; margin: auto; font-size: 1rem;" id="email" name="email"
              placeholder="Your Email">
          </div>
          <div class="mb-3">
            <textarea class="form-control form-control-lg"
              style="max-width: 100%; width: 80%; margin: auto; font-size: 1rem;" id="message" name="message"
              placeholder="Your Message"></textarea>
          </div>
          <div class="d-grid gap-2">
            <button type="submit" class="btn btn-secondary" style="width: 150px; margin: auto;">Send</button>
          </div>
        </form>
      </div>
    </div>
  </section> -->

  <!-- Sign Up Section -->
  <!-- <section id="signup" class="container my-5">
    <div class="row">
      <div class="col text-center">
        <h2>Join Us Today!</h2>
        <p>Sign up now to unlock exclusive deals and discounts on hostels worldwide.</p>
        <a class="btn btn-secondary" href="{{ route('logout') }}" onclick="event.preventDefault();
                                   document.getElementById('logout-form').submit();">
          {{ __('Sign Up') }}
        </a>

        <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
          @csrf
        </form>
      </div>
    </div>
  </section> -->

  <!-- Footer -->
  <!-- <footer class="text-center text-lg-start mt-5">
    <div id="about" class="container p-4">
      <div class="row">
        <div class="col-lg-6 col-md-12 mb-4 mb-md-0">
          <h5 class="text-uppercase">Contact</h5>
          <p>
            Islamabad, Pakistan <br>
            Email: hosteller@example.com <br>
            Phone: +92-123-4567890
          </p>
        </div>

        <div class="col-lg-6 col-md-12 mb-4 mb-md-0">
          <h5 class="text-uppercase" id="services">Services</h5>
          <p>
            Islamabad, Pakistan <br>
            Email: hosteller@example.com <br>
            Phone: +92-123-4567890
          </p>
        </div>

      </div>
    </div>

    <div class="text-center p-3">
      &copy; 2024 Hosteller
    </div>
  </footer> -->
  <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.min.js"></script>

  
</body>

</html>
