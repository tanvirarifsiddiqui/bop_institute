@extends('layouts.course_management')
@section('title', 'Edit Program')
@section('main')
    <h2>Edit Program</h2>
    <form method="POST" action="{{ route('admin.course_management.programs.update', $program) }}">
        @csrf
        @method('PUT')
        <div class="mb-3">
            <label for="course_type_id" class="form-label">Course Type</label>
            <select name="course_type_id" id="course_type_id" class="form-select" required>
                @foreach($courseTypes as $type)
                    <option value="{{ $type->id }}" {{ $program->course_type_id == $type->id ? 'selected' : '' }}>{{ $type->name }}</option>
                @endforeach
            </select>
        </div>
        <div class="mb-3">
            <label for="name" class="form-label">Program Name</label>
            <input type="text" name="name" id="name" class="form-control" value="{{ $program->name }}" required>
        </div>
        <div class="mb-3">
            <label for="description" class="form-label">Description (optional)</label>
            <textarea name="description" id="description" class="form-control">{{ $program->description }}</textarea>
        </div>
        <button type="submit" class="btn btn-primary">Update Program</button>
    </form>
@endsection
