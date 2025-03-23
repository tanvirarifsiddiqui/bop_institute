@extends('layouts.course_management')
@section('title', 'Edit Course Session')
@section('main')
    <h2>Edit Course Session</h2>
    <form method="POST" action="{{ route('admin.course_management.sessions.update', $session) }}">
        @csrf
        @method('PUT')
        <div class="mb-3">
            <label for="name" class="form-label">Session Name</label>
            <input type="text" name="name" id="name" class="form-control" value="{{ $session->name }}" required>
        </div>
        <button type="submit" class="btn btn-primary">Update Session</button>
    </form>
@endsection
