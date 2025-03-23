@extends('layouts.course_management')
@section('title', 'Edit Course Type')
@section('main')
    <h2>Edit Course Type</h2>
    <form method="POST" action="{{ route('admin.course_management.course_types.update', $courseType) }}">
        @csrf
        @method('PUT')
        <div class="mb-3">
            <label for="name" class="form-label">Course Type Name</label>
            <input type="text" name="name" id="name" class="form-control" value="{{ $courseType->name }}" required>
        </div>
        <button type="submit" class="btn btn-primary">Update Course Type</button>
    </form>
@endsection
