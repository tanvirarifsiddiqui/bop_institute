@extends('layouts.app')
@section('title', 'Select Course')
@section('content')
    <div class="container mt-5">
        <h2>Course Selection</h2>
        <form method="POST" action="{{ route('course_application.submit') }}">
            @csrf
            <div class="mb-3">
                <label for="course_id" class="form-label">Select Course</label>
                <select name="course_id" id="course_id" class="form-select" required>
                    <option value="">Choose a course...</option>
                    @foreach($courses as $course)
                        <option value="{{ $course->id }}">
                            {{ $course->name }} ({{ $course->program->name }} -
                            @if($course->courseable_type === 'App\\Models\\CourseSession')
                                Session: {{ $course->courseable->name }}
                            @else
                                Batch: {{ $course->courseable->name }}
                            @endif)
                        </option>
                    @endforeach
                </select>
            </div>
            <button type="submit" class="btn btn-primary">Submit Application</button>
        </form>
    </div>
@endsection
