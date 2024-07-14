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
</head>

<body>
  @include('includes.header')
  <!-- Carousel -->
  <div id="carouselExampleIndicators" class="carousel slide" data-bs-ride="carousel">
    <div class="carousel-indicators">
      <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="0" class="active"
        aria-current="true" aria-label="Slide 1"></button>
      <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="1"
        aria-label="Slide 2"></button>
      <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="2"
        aria-label="Slide 3"></button>
    </div>
    <div class="carousel-inner">
      <div class="carousel-item active">
        <img src="{{asset('img/carousel-img1.png')}}" class="d-block w-100" alt="...">
      </div>
      <div class="carousel-item">
        <img src="{{asset('img/carousel-img2.png')}}" class="d-block w-100" alt="...">
      </div>
      <div class="carousel-item">
        <img src="{{asset('img/carousel-img3.png')}}" class="d-block w-100" alt="...">
      </div>
    </div>
    <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleIndicators"
      data-bs-slide="prev">
      <span class="carousel-control-prev-icon" aria-hidden="true"></span>
      <span class="visually-hidden">Previous</span>
    </button>
    <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleIndicators"
      data-bs-slide="next">
      <span class="carousel-control-next-icon" aria-hidden="true"></span>
      <span class="visually-hidden">Next</span>
    </button>
  </div>

  <!-- Cards Section -->
  <section id="cards" class="container my-5">
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
  </section>

  <!-- Call to Action -->
  <section id="cta" class="container my-5">
    <div class="row">
      <div class="col text-center">
        <h2>Ready to book your stay?</h2>
        <p>Explore our hostels and find the perfect place for your next adventure.</p>
        <a href="{{url('search')}}" class="btn btn-secondary">Book Now</a>
      </div>
    </div>
  </section>

  <!-- Testimonials Section -->
  <section id="testimonials" class="container my-5">
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
  </section>

  <!-- Benefits Section -->
  <section id="benefits" class="container my-5">
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

  <!-- Featured Destinations Section -->
  <section id="destinations" class="container my-5">
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
  </section>

  <!-- Contact Section -->
  <section id="contact" class="container my-5">
    <div class="row justify-content-center">
      <div class="col-12 col-md-10 col-lg-8">
        <!-- Adjusted column sizes for better responsive behavior -->
        <h2 class="text-center">Contact Us</h2>
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
  </section>

  <!-- Sign Up Section -->
  <section id="signup" class="container my-5">
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
  </section>

  <!-- Footer -->
  <footer class="text-center text-lg-start mt-5">
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
  </footer>
  <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.min.js"></script>
</body>

</html>
