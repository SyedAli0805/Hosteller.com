<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" type="image/x-icon" href="img/logo.png">
    <link rel="stylesheet" href="css/login.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css"
        integrity="sha512-..." crossorigin="anonymous" />
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css"
        integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
    <title>Login</title>
</head>

<body>
    <!-- main container -->

    <div class="container d-flex justify-content-center align-items-center min-vh-100">

        <!----------------------- login Container -------------------------->

        <div class="row border rounded-5 p-3 bg-white shadow box-area">

            <!--------------------------- Left Box ----------------------------->

            <div class="col-md-6 rounded-4 d-flex justify-content-center align-items-center flex-column left-box"
                style="background-color: #097792;">
                <div class="featured-image">
                    <img src="img/login.png" class="img-fluid" style="width: 300px;">
                </div>
                <p class="text-white fs-2" style="font-family: 'Courier New', Courier, monospace;"> </p>
                <small class="text-white text-wrap text-center mt-0"
                    style="width: 20rem;font-family: 'Courier New', Courier, monospace; font-style: italic; font-weight: bolder;">
                    We're here to make your travel dreams a reality. Let's continue exploring the world together!
                </small>
            </div>

            <!--------------------------- Right Box ---------------------------->

            <div class="col-md-6 right-box">
                <div class="row align-items-center">
                    <div class="header-text mb-n4">
                        <h2>WELCOME BACK</h2>
                        <p style="color: #5d5d5f; font-size: 13px;">
                            "Welcome back! 🌟 It's great to see you again. Dive back into your travel journey with
                            Hosteller."
                        </p>
                    </div>
                    @if ($errors->any())
                    <div class="alert alert-danger">
                        <ul class="mb-0">
                            @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                    @endif
                    <form method="POST" action="{{ route('login') }}" class="row g-3 mt-1 mb-1 needs-validation"
                        novalidate>
                        @csrf
                        <div class="col-md-12">
                            <label for="email" class="form-label mb-0">Email address</label>
                            <input type="email"
                                class="form-control form-control-lg bg-light fs-6 @error('email') is-invalid @enderror"
                                id="email" name="email" value="{{ old('email') }}" required autocomplete="email"
                                autofocus placeholder="Enter email address">
                            @error('email')
                            <div class="invalid-feedback">
                                <strong>{{ $message }}</strong>
                            </div>
                            @enderror
                        </div>

                        <div class="col-md-12">
                            <label for="password" class="form-label mb-0">Password</label>
                            <input type="password"
                                class="form-control form-control-lg bg-light fs-6 @error('password') is-invalid @enderror"
                                id="password" name="password" required autocomplete="current-password"
                                placeholder="Enter password">
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
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" name="remember" id="remember" {{
                                    old('remember') ? 'checked' : '' }}>
                                <label class="form-check-label" for="remember">
                                    {{ __('Remember Me') }}
                                </label>
                            </div>
                        </div>

                        <div class="col-12">
                            <button type="submit" class="btn btn-lg btn-primary w-100 fs-6">Login</button>
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
                    @if (Route::has('password.request'))
                    <div class="row mt-3">
                        <div class="col-md-12">
                            <a class="btn btn-link" href="{{ route('password.request') }}">
                                {{ __('Forgot Your Password?') }}
                            </a>
                        </div>
                    </div>
                    @endif

                    <div class="row mt-2">
                        <div class="col-md-12">
                            <small>Do not have an account? <a href="{{ route('register') }}">Register</a></small>
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.min.js"></script>
</body>

</html>