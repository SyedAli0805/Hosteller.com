@extends('admin.layout')

@section('content')
<div class="d-flex justify-content-center">
    <div class="col-md-10">
        <h1 class="mb-4 text-center">Manage Bookings</h1>

        <!-- Bookings Table -->
        <div class="table-responsive">
            <table class="table table-hover table-striped table-bordered rounded bg-white">
                <thead class="table-light">
                    <tr>
                        <th scope="col">#</th>
                        <th scope="col">User Name</th>
                        <th scope="col">Rooms</th>
                        <th scope="col">Check-in</th>
                        <th scope="col">Check-out</th>
                        <th scope="col">Status</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($bookings as $booking)
                    <tr>
                        <th scope="row">{{ $loop->iteration }}</th>
                        <td>{{ $booking->user->name }}</td>
                        <td>{{ $booking->no_of_rooms }}</td>
                        <td>{{ $booking->check_in }}</td>
                        <td>{{ $booking->check_out }}</td>
                        <td>
                            <form action="{{ route('admin.bookings.status', $booking->id) }}" method="POST">
                                @csrf
                                @method('PUT')
                                <select name="status" class="form-control" onchange="this.form.submit()">
                                    <option value="pending" {{ $booking->status == 'pending' ? 'selected' : '' }}>Pending</option>
                                    <option value="confirmed" {{ $booking->status == 'confirmed' ? 'selected' : '' }}>Confirmed</option>
                                    <option value="cancelled" {{ $booking->status == 'cancelled' ? 'selected' : '' }}>Cancelled</option>
                                </select>
                            </form>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection

<style>
    .table {
        border-radius: 15px;
        overflow: hidden;
        background-color: #f8f9fa;
    }
    .table th, .table td {
        vertical-align: middle;
    }
</style>
