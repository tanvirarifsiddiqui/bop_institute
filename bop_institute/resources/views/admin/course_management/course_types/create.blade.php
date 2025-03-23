@extends('layouts.course_management')
@section('title', 'Add Course Type')
@section('main')
    <h2>Add New Course Type</h2>
    <form method="POST" action="{{ route('admin.course_management.course_types.store') }}">
        @csrf
        <div class="mb-3">
            <label for="name" class="form-label">Course Type Name</label>
            <input type="text" name="name" id="name" class="form-control" placeholder="e.g. Long Courses" required>
        </div>
        <button type="submit" class="btn btn-primary">Create Course Type</button>
    </form>
@endsection
