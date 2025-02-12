@extends('layouts.admin_app')

@section('title', 'Edit User')

@section('content')
    <div class="container mt-4">
        <h1>Edit User</h1>

        @if ($errors->any())
            <div class="alert alert-danger">
                <strong>Oops!</strong> Please fix the following errors:
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <form action="{{ route('admin.users.update', $user) }}" method="POST">
            @csrf
            @method('PUT')

            <!-- Name -->
            <div class="form-group">
                <label for="name">Name:</label>
                <input type="text" name="name" id="name" value="{{ old('name', $user->name) }}" class="form-control" required>
            </div>

            <!-- Mobile No -->
            <div class="form-group">
                <label for="mobile_no">Mobile No:</label>
                <input type="text" name="mobile_no" id="mobile_no" value="{{ old('mobile_no', $user->mobile_no) }}" class="form-control" required>
            </div>

            <!-- Email -->
            <div class="form-group">
                <label for="email">Email:</label>
                <input type="email" name="email" id="email" value="{{ old('email', $user->email) }}" class="form-control" required>
            </div>

            <!-- Birth Date -->
            <div class="form-group">
                <label for="birth_date">Birth Date:</label>
                <input type="date" name="birth_date" id="birth_date" value="{{ old('birth_date', $user->birth_date) }}" class="form-control">
            </div>

            <!-- Institution -->
            <div class="form-group">
                <label for="institution">Institution:</label>
                <input type="text" name="institution" id="institution" value="{{ old('institution', $user->institution) }}" class="form-control">
            </div>

            <!-- Address -->
            <div class="form-group">
                <label for="address">Address:</label>
                <textarea name="address" id="address" class="form-control" rows="3">{{ old('address', $user->address) }}</textarea>
            </div>

            <!-- Gender -->
            <div class="form-group">
                <label>Gender:</label>
                <div>
                    <div class="form-check form-check-inline">
                        <input class="form-check-input" type="radio" name="gender" id="gender_male" value="Male"
                            {{ old('gender', $user->gender) == 'Male' ? 'checked' : '' }}>
                        <label class="form-check-label" for="gender_male">Male</label>
                    </div>
                    <div class="form-check form-check-inline">
                        <input class="form-check-input" type="radio" name="gender" id="gender_female" value="Female"
                            {{ old('gender', $user->gender) == 'Female' ? 'checked' : '' }}>
                        <label class="form-check-label" for="gender_female">Female</label>
                    </div>
                    <!-- Add other gender options if necessary -->
                </div>
            </div>

            <!-- Submit Button -->
            <button type="submit" class="btn btn-success">Update User</button>
            <a href="{{ route('admin.users.index') }}" class="btn btn-secondary">Cancel</a>
        </form>
    </div>
@endsection
