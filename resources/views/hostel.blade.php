<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Hostel Details</title>
    <link rel="icon" type="image/x-icon" href="{{ asset('img/logo.png') }}">
    <link rel="stylesheet" href="{{ asset('css/index.css') }}">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css">
    <style>
        .card-img-top {
            height: 200px;
            object-fit: cover;
        }
        .card-title {
            color: #007bff;
        }
        .card-text strong {
            color: #555;
        }
        .btn-primary {
            background-color: #007bff;
            border-color: #007bff;
        }
        .btn-primary:hover {
            background-color: #0056b3;
            border-color: #0056b3;
        }
        .card-footer {
            background-color: #f8f9fa;
        }
        .main-container {
            padding-top: 20px;
        }
    </style>
</head>
<body>
    @include('includes.header')
    <!-- Main Content -->
    <main class="container main-container">
        <h1 class="text-center mb-4">Hostel Details</h1>
        <div class="row row-cols-1 row-cols-md-3 g-4">
            @foreach ($hostels as $hostel)
                <div class="col">
                    <div class="card h-100 shadow-sm">
                        <img src="{{ asset('storage/' . $hostel->hostel_image_path) }}" class="card-img-top" alt="Hostel Image">
                        <div class="card-body">
                            <h5 class="card-title">{{ $hostel->hostel_name }}</h5>
                            <p class="card-text"><strong>Location:</strong> {{ $hostel->hostel_location }}</p>
                            <p class="card-text"><strong>Description:</strong> {{ $hostel->hostel_description }}</p>
                            <p class="card-text"><strong>Number of Rooms:</strong> {{ $hostel->no_of_rooms }}</p>
                            <p class="card-text"><strong>Price per Room:</strong> ${{ $hostel->room_price }}</p>
                        </div>
                        <div class="card-footer d-flex justify-content-between align-items-center">
                            <a href="{{ 'createBookings/' . $hostel->id }}" class="btn btn-primary w-100">Book Now</a>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </main>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.min.js"></script>
</body>
</html>
