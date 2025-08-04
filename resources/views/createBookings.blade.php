<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>New Booking</title>
    <link rel="icon" type="image/x-icon" href="{{ asset('img/logo.png') }}">
    <link rel="stylesheet" href="{{ asset('css/createBookings.css') }}">
    <link rel="stylesheet" href="{{ asset('css/index.css') }}">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css">
    <style>
        .card {
            max-width: 500px;
            width: 100%;
            margin: 20px;
            padding: 20px;
            border-radius: 15px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
            background-color: #e4f9fad3;
        }
        .card-title {
            color: #007bff;
            margin-bottom: 20px;
        }
        .btn-success {
            background-color: #28a745;
            border-color: #28a745;
        }
        .btn-success:hover {
            background-color: #218838;
            border-color: #1e7e34;
        }
        .form-label {
            font-weight: bold;
        }
        .text-danger {
            font-size: 0.875em;
        }
    </style>
</head>
<body>
    @include('includes.header')
    <div class="d-flex justify-content-center align-items-center min-vh-100">
        <div class="card">
            <div class="card-body">
                <h3 class="card-title text-center">Create New Booking</h3>
                <form action="{{ url('/add') }}" method="POST">
                    @csrf
                    <input type="hidden" name="hostel_id" value="{{ $hostel->id }}">
                    @auth
                        <input type="hidden" name="user_id" value="{{ Auth::user()->id }}">
                    @endauth

                    <div class="mb-3">
                        <label for="hostel-name" class="form-label">Hostel</label>
                        <input type="text" class="form-control" id="hostel-name" name="hostel-name" value="{{ $hostel->hostel_name }}" readonly>
                        @error('hostel-name')
                            <div class="text-danger">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="mb-3">
                        <label for="check_in" class="form-label">Check-In Date</label>
                        <input type="date" class="form-control" id="check_in" name="check_in" placeholder="Enter check-in date" required>
                        @error('check_in')
                            <div class="text-danger">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="mb-3">
                        <label for="check_out" class="form-label">Check-Out Date</label>
                        <input type="date" class="form-control" id="check_out" name="check_out" placeholder="Enter check-out date" required>
                        @error('check_out')
                            <div class="text-danger">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="mb-3">
                        <label for="no_of_rooms" class="form-label">Number of Rooms</label>
                        <input type="number" class="form-control" id="no_of_rooms" name="no_of_rooms" min="1" placeholder="Enter number of rooms" required>
                        @error('no_of_rooms')
                            <div class="text-danger">{{ $message }}</div>
                        @enderror
                    </div>
                    <button type="submit" class="btn btn-success btn-block">Book Now</button>
                </form>
            </div>
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.min.js"></script>
</body>
</html>
