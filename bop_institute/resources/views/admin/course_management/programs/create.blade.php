@extends('layouts.course_management')
@section('title', 'Add Program')
@section('main')
    <h2>Add New Program</h2>
    <form method="POST" action="{{ route('admin.course_management.programs.store') }}">
        @csrf
        <div class="mb-3">
            <label for="course_type_id" class="form-label">Course Type</label>
            <select name="course_type_id" id="course_type_id" class="form-select" required>
                <option value="">Select Course Type</option>
                @foreach($courseTypes as $type)
                    <option value="{{ $type->id }}">{{ $type->name }}</option>
                @endforeach
            </select>
        </div>
        <div class="mb-3">
            <label for="name" class="form-label">Program Name</label>
            <input type="text" name="name" id="name" class="form-control" placeholder="Enter program name" required>
        </div>
{{--        <div class="mb-3">--}}
{{--            <label for="description" class="form-label">Description (optional)</label>--}}
{{--            <textarea name="description" id="description" class="form-control" placeholder="Enter description"></textarea>--}}
{{--        </div>--}}
        <button type="submit" class="btn btn-primary">Create Program</button>
    </form>
@endsection
