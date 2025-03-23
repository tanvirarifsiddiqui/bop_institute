@extends('layouts.course_management')
@section('title', 'Add Course Session')
@section('main')
    <h2>Add New Course Session</h2>
    <form method="POST" action="{{ route('admin.course_management.sessions.store') }}">
        @csrf
        <div class="mb-3">
            <label for="name" class="form-label">Session Name</label>
            <input type="text" name="name" id="name" class="form-control" placeholder="e.g. Spring 2025" required>
        </div>
        <button type="submit" class="btn btn-primary">Create Session</button>
    </form>
@endsection
