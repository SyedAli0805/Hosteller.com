@extends('admin.layout')

@section('content')
<main class="container mt-4">
    @if(session('message'))
        <div class="alert alert-success">
            {{ session('message') }}
        </div>
    @endif

    @if(session('error'))
        <div class="alert alert-danger">
            {{ session('error') }}
        </div>
    @endif

    <div class="row row-cols-1 row-cols-md-3 g-4">
        @foreach ($hostels as $hostel)
        <div class="col">
            <div class="card h-100">
                <img src="{{asset('storage/' .$hostel->hostel_image_path)}}" class="card-img-top" alt="...">
                <div class="card-body">
                    <h5 class="card-title">{{$hostel->hostel_name}}</h5>
                    <p class="card-text"><strong>Location:</strong> {{$hostel->hostel_location}}</p>
                    <p class="card-text"><strong>Description:</strong> {{$hostel->hostel_description}}</p>
                    <p class="card-text"><strong>Number of Rooms:</strong> {{$hostel->no_of_rooms}}</p>
                    <p class="card-text"><strong>Price per Room:</strong> {{$hostel->room_price}}</p>
                </div>
                <div class="card-footer">
                    <div class="row g-2">
                        <div class="col-6 d-flex">
                          <a href="{{ route('admin.users', ['hostelId' => $hostel->id]) }}" class="btn btn-info w-100">
                              <i class="fas fa-user"></i> Users
                          </a>
                        </div>
                        <div class="col-6 d-flex">
                            <a href="{{ route('admin.bookings', ['hostelId' => $hostel->id]) }}" class="btn btn-success w-100">
                                <i class="fas fa-book"></i> Bookings
                            </a>
                        </div>
                        <div class="col-6 d-flex mt-2">
                            <a href="{{route('admin.hostels.update', ['id' => $hostel->id]) }}" class="btn btn-warning w-100">
                                <i class="fas fa-edit"></i> Update
                            </a>
                        </div>
                        <div class="col-6 d-flex mt-2">
                          <form action="{{ route('admin.hostels.delete', ['id' => $hostel->id]) }}" method="POST" class="w-100">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger w-100">
                                <i class="fas fa-trash"></i> Delete
                            </button>
                          </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        @endforeach
    </div>
</main>
@endsection
