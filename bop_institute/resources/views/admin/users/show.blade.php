@extends('layouts.admin_app')

@section('title', 'Show User')
@section('content')
    <div class="container mt-4">
        <h1>User Details</h1>

        <div class="card">
            <div class="card-header">
                <strong>{{ $user->name }}</strong>
            </div>
            <div class="card-body">
                <p><strong>Mobile:</strong> {{ $user->mobile_no }}</p>
                <p><strong>Email:</strong> {{ $user->email }}</p>
                <p><strong>Birth Date:</strong> {{ $user->birth_date }}</p>
                <p><strong>Institution:</strong> {{ $user->institution }}</p>
                <p><strong>Address:</strong> {{ $user->address }}</p>
                <p><strong>Gender:</strong> {{ $user->gender }}</p>
                <!-- Include other fields as needed -->
            </div>
        </div>

        <a href="{{ route('admin.users.index') }}" class="btn btn-secondary mt-3">Back to List</a>
    </div>
@endsection
