<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>User Bookings</title>
    <link rel="stylesheet" href="{{ asset('css/header.css') }}">
    <link rel="stylesheet" href="{{asset('css/index.css')}}">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css">
    <style>
        .card {
            border-radius: 15px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
            background-color: #e4f9fad3;
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
        .btn-danger {
            background-color: #dc3545;
            border-color: #dc3545;
        }
        .btn-danger:hover {
            background-color: #c82333;
            border-color: #bd2130;
        }
        .btn-update {
            background-color: #ffc107;
            border-color: #ffc107;
        }
        .btn-update:hover {
            background-color: #e0a800;
            border-color: #d39e00;
        }
        .main-container {
            padding-top: 20px;
        }
    </style>
</head>
<body>
    @include('includes.header')
    <div class="container main-container">
        <h1 class="text-center mb-4">Hello, {{ $user->name }}</h1>
        @if(isset($message))
            <div class="alert alert-info text-center" role="alert">
                <i class="fas fa-info-circle"></i> {{ $message }}
            </div>
        @else
            <div class="row row-cols-1 row-cols-md-2 g-4 mt-4">
                @foreach ($bookings as $index => $booking)
                    <div class="col">
                        <div class="card h-100">
                            <div class="card-body">
                                <h5 class="card-title">Booking No: {{ $index + 1 }}</h5>
                                <p class="card-text"><strong>Hostel:</strong> {{ $booking->hostel->hostel_name }}</p>
                                <p class="card-text"><strong>Check-In Date:</strong> {{ $booking->check_in }}</p>
                                <p class="card-text"><strong>Check-Out Date:</strong> {{ $booking->check_out }}</p>
                                <p class="card-text"><strong>Number of Rooms:</strong> {{ $booking->no_of_rooms }}</p>
                                <p class="card-text"><strong>Status:</strong> {{ $booking->status }}</p>
                            </div>
                            <div class="card-footer d-flex justify-content-between">
                                <form action="{{ url('/bookings/' . $booking->id) }}" method="POST">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-danger">
                                        <i class="fas fa-trash-alt"></i> Delete
                                    </button>
                                </form>
                                <a href="{{ 'editBookings/' . $booking->id }}" class="btn btn-update">
                                    <i class="fas fa-edit"></i> Update
                                </a>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        @endif
    </div>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.min.js"></script>
</body>
</html>
