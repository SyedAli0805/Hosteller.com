@extends('admin.layout')
@section('head')
<link rel="stylesheet" href="{{ asset('css/addHostel.css') }}">
@endsection
@section('content')
<div class="container container-custom my-5">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card shadow-lg rounded" style="background-color: #e4f9fad3">
                <div class="card-header text-white bg-warning text-center">
                    <h3 class="card-title text-white">Edit Hostel</h3>
                </div>
                <div class="card-body p-5">
                    <form action="{{ route('admin.hostels.edit', $hostel->id) }}" method="POST" enctype="multipart/form-data" class="text-center">
                        @csrf
                        @method('PUT')
                        <div class="form-group mb-4">
                            <label for="hostel_name" class="form-label">Hostel Name</label>
                            <input type="text" class="form-control mx-auto @error('hostel_name') is-invalid @enderror" id="hostel_name" name="hostel_name" value="{{ $hostel->hostel_name }}" required style="max-width: 400px;">
                            @error('hostel_name')
                            <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="form-group mb-4">
                            <label for="hostel_image_path" class="form-label">Hostel Image</label>
                            @if(isset($hostel) && $hostel->hostel_image_path)
                                <div class="mb-2">
                                    <img src="{{ asset('storage/' . $hostel->hostel_image_path) }}" alt="Current Hostel Image" style="max-width: 200px;">
                                </div>
                            @endif
                            <input type="file" class="form-control mx-auto @error('hostel_image_path') is-invalid @enderror" id="hostel_image_path" name="hostel_image_path" accept="image/*" style="max-width: 400px;">
                            @error('hostel_image_path')
                            <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="form-group mb-4">
                            <label for="hostel_location" class="form-label">Hostel Location</label>
                            <input type="text" class="form-control mx-auto @error('hostel_location') is-invalid @enderror" id="hostel_location" name="hostel_location" value="{{ $hostel->hostel_location }}" required style="max-width: 400px;">
                            @error('hostel_location')
                            <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="form-group mb-4">
                            <label for="hostel_description" class="form-label">Hostel Description</label>
                            <textarea class="form-control mx-auto @error('hostel_description') is-invalid @enderror" id="hostel_description" name="hostel_description" rows="4" required style="max-width: 400px;">{{ $hostel->hostel_description }}</textarea>
                            @error('hostel_description')
                            <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="form-group mb-4">
                            <label for="no_of_rooms" class="form-label">Number of Rooms</label>
                            <input type="number" class="form-control mx-auto @error('no_of_rooms') is-invalid @enderror" id="no_of_rooms" name="no_of_rooms" value="{{ $hostel->no_of_rooms }}" required style="max-width: 400px;">
                            @error('no_of_rooms')
                            <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="form-group mb-4">
                            <label for="room_price" class="form-label">Room Price (per night)</label>
                            <input type="number" class="form-control mx-auto @error('room_price') is-invalid @enderror" id="room_price" name="room_price" value="{{ $hostel->room_price }}" required style="max-width: 400px;">
                            @error('room_price')
                            <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                        <input type="hidden" name="owner_id" value="{{ auth()->user()->id }}">
                        <button type="submit" class="btn btn-success w-100">Update Hostel</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
