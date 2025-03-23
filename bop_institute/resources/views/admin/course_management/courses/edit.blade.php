@extends('layouts.course_management')
@section('title', 'Edit Course')
@section('main')
    <h2>Edit Course</h2>
    <form method="POST" action="{{ route('admin.course_management.courses.update', $course) }}">
        @csrf
        @method('PUT')
        <div class="mb-3">
            <label for="course_code" class="form-label">Course Code</label>
            <input type="text" name="course_code" id="course_code" class="form-control" value="{{ $course->course_code }}" required>
        </div>
        <div class="mb-3">
            <label for="program_id" class="form-label">Program</label>
            <select name="program_id" id="program_id" class="form-select" required>
                @foreach($programs as $program)
                    <option value="{{ $program->id }}" {{ $course->program_id == $program->id ? 'selected' : '' }}>
                        {{ $program->name }}
                    </option>
                @endforeach
            </select>
        </div>
        <div class="mb-3">
            <label for="name" class="form-label">Course Name</label>
            <input type="text" name="name" id="name" class="form-control" value="{{ $course->name }}" required>
        </div>
        <div class="mb-3">
            <label for="course_fee" class="form-label">Course Fee</label>
            <input type="number" name="course_fee" id="course_fee" class="form-control" value="{{ $course->course_fee }}" step="0.01" required>
        </div>
        <div class="mb-3">
            <label for="duration" class="form-label">Duration</label>
            <input type="text" name="duration" id="duration" class="form-control" value="{{ $course->duration }}" required>
        </div>
        <div class="mb-3">
            <label class="form-label">Mode</label>
            <div>
                <input type="radio" name="mode" id="online" value="online" {{ $course->mode === 'online' ? 'checked' : '' }}>
                <label for="online">Online</label>
                <input type="radio" name="mode" id="offline" value="offline" {{ $course->mode === 'offline' ? 'checked' : '' }}>
                <label for="offline">Offline</label>
            </div>
        </div>
{{--        <div class="mb-3">--}}
{{--            <div class="form-check">--}}
{{--                <input type="checkbox" name="apply_option" id="apply_option" class="form-check-input" {{ $course->apply_option ? 'checked' : '' }}>--}}
{{--                <label class="form-check-label" for="apply_option">Allow Application</label>--}}
{{--            </div>--}}
{{--        </div>--}}
        <div class="mb-3">
            <label class="form-label">Course Category</label>
            <div>
                <input type="radio" name="courseable_type" value="session" id="type_session" {{ $course->courseable_type == \App\Models\CourseSession::class ? 'checked' : '' }}>
                <label for="type_session">Session</label>
                <input type="radio" name="courseable_type" value="batch" id="type_batch" {{ $course->courseable_type == \App\Models\Batch::class ? 'checked' : '' }}>
                <label for="type_batch">Batch</label>
            </div>
        </div>
        <div class="mb-3">
            <label for="courseable_id" class="form-label">Select Session / Batch</label>
            <select name="courseable_id" id="courseable_id" class="form-select" required>
                <option value="">Select from available options</option>
                @foreach($sessions as $session)
                    <option value="{{ $session->id }}" {{ $course->courseable_id == $session->id && $course->courseable_type == \App\Models\CourseSession::class ? 'selected' : '' }}>
                        Session: {{ $session->name }}
                    </option>
                @endforeach
                @foreach($batches as $batch)
                    <option value="{{ $batch->id }}" {{ $course->courseable_id == $batch->id && $course->courseable_type == \App\Models\Batch::class ? 'selected' : '' }}>
                        Batch: {{ $batch->name }} ({{ $batch->start_date }})
                    </option>
                @endforeach
            </select>
        </div>
        <button type="submit" class="btn btn-primary">Update Course</button>
    </form>
@endsection
