<!DOCTYPE html>
<html lang="en">
<head>
    <!-- css file is same for login and register -->
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" type="image/x-icon" href="img/logo.png">
    <link rel="stylesheet" href="css/login.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css" integrity="sha512-..." crossorigin="anonymous" />
    <title>Register</title>
</head>
<body>
<!-- main container -->

<div class="container d-flex justify-content-center align-items-center min-vh-100" id="registerForm">
    <!----------------------- signup Container -------------------------->

    <div class="row border rounded-5 p-3 bg-white shadow box-area">

        <!--------------------------- Left Box ----------------------------->

        <div class="col-md-6 rounded-4 d-flex justify-content-center align-items-center flex-column left-box" style="background-color: #097792;">
            <div class="featured-image">
                <img src="img/signup.png" class="img-fluid" style="width: 400px;">
            </div>
            <p class="text-white fs-2" style="font-family: 'Courier New', Courier, monospace;"></p>
            <small class="text-white text-wrap text-center mt-0" style="width: 20rem;font-family: 'Courier New', Courier, monospace; font-style: italic; font-weight: bolder;">
                Start your journey with us today – it's quick, easy, and free!
            </small>
        </div>

        <!-------------------- ------ Right Box ---------------------------->

        <div class="col-md-6 right-box">
            <div class="row align-items-center">
                <div class="header-text mb-n4">
                    <h2>WELCOME</h2>
                    <p style="color: #5d5d5f; font-size: 13px;">
                        "Welcome to Hosteller! 🎉 Join our vibrant community of travelers and explorers by creating your account below."
                    </p>
                </div>
                <form method="POST" action="{{ route('register') }}" class="row g-3 mt-1 mb-1 needs-validation" novalidate>
                    @csrf

                    <div class="col-md-12 mt-0 mb-0">
                        <label for="name" class="form-label mb-0">Name</label>
                        <input type="text" class="form-control form-control-lg bg-light fs-6 @error('name') is-invalid @enderror" id="name" name="name" value="{{ old('name') }}" required autocomplete="name" autofocus placeholder="Enter name">
                        @error('name')
                        <div class="invalid-feedback">
                            <strong>{{ $message }}</strong>
                        </div>
                        @else
                        <div class="invalid-feedback">
                            Please provide a name.
                        </div>
                        @enderror
                    </div>

                    <div class="col-md-12">
                        <label for="email" class="form-label mb-0">Email address</label>
                        <input type="email" class="form-control form-control-lg bg-light fs-6 @error('email') is-invalid @enderror" id="email" name="email" value="{{ old('email') }}" required autocomplete="email" pattern="[a-zA-Z0-9._%+-]+@ABC\.(co|com)$" placeholder="Enter email address">
                        @error('email')
                        <div class="invalid-feedback">
                            <strong>{{ $message }}</strong>
                        </div>
                        @else
                        <div class="invalid-feedback">
                            Please provide a valid email address.
                        </div>
                        @enderror
                    </div>

                    <div class="col-md-12">
                        <label for="password" class="form-label mb-0">Password</label>
                        <input type="password" class="form-control form-control-lg bg-light fs-6 @error('password') is-invalid @enderror" id="password" name="password" required autocomplete="new-password" placeholder="Enter password">
                        @error('password')
                        <div class="invalid-feedback">
                            <strong>{{ $message }}</strong>
                        </div>
                        @else
                        <div class="invalid-feedback">
                            Please provide a password (at least 8 characters).
                        </div>
                        @enderror
                    </div>

                    <div class="col-md-12">
                        <label for="password-confirm" class="form-label mb-0">Confirm Password</label>
                        <input type="password" class="form-control form-control-lg bg-light fs-6" id="password-confirm" name="password_confirmation" required autocomplete="new-password" placeholder="Confirm password">
                        <div class="invalid-feedback">
                            Please confirm your password.
                        </div>
                    </div>

                    <div class="col-12 mt-3 d-flex justify-content-center">
                        <button type="submit" class="btn btn-primary w-100 py-2 mx-1 mb-3">
                            Register
                        </button>
                    </div>
                </form>
                <div class="col-12 d-flex justify-content-center">
                    <a href="{{route('google-auth')}}" class="w-100">
                        <button class="btn btn-lg btn-light fs-6 w-100 mb-3">
                            <i class="fab fa-google me-2"></i>
                            <small>Continue with Google</small>
                        </button>
                    </a>
                </div>                

                <div class="row">
                    <small>Already have an account? <a href="{{ route('login') }}">Login</a></small>
                </div>
            </div>
        </div>

    </div>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-HoJWe+SRe+JncD9mbM2a1FGpYA7lH2YfQ4qszoh1EocqxB7HirzZ4Im1Giw+oN6x" crossorigin="anonymous"></script>
</body>
</html>
