@extends('admin.layout')

@section('content')
<div class="d-flex justify-content-center">
    <div class="col-md-10">
        <h1 class="mb-4 text-center">Manage Users</h1>

        <!-- Display Success and Error Messages -->
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

        <!-- User Table -->
        <div class="table-responsive">
            <table class="table table-hover table-striped table-bordered rounded bg-white">
                <thead class="table-light">
                    <tr>
                        <th scope="col">#</th>
                        <th scope="col">Name</th>
                        <th scope="col">Email</th>
                        <th scope="col">Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($users as $user)
                    <tr>
                        <th scope="row">{{ $loop->iteration }}</th>
                        <td>{{ $user->name }}</td>
                        <td>{{ $user->email }}</td>
                        <td>
                            <form action="{{ route('admin.users.delete', ['hostelId' => $hostelId, 'userId' => $user->id]) }}" method="POST" onsubmit="return confirm('Are you sure you want to delete this user?');">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger btn-sm">
                                    <i class="fa fa-trash"></i> Delete
                                </button>
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
</style>
