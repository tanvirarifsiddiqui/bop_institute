@extends('layouts.course_management')
@section('title', 'Manage Courses')
@section('main')
    <div class="d-flex justify-content-between mb-3">
        <h2>Courses</h2>
        <a href="{{ route('admin.course_management.courses.create') }}" class="btn btn-primary">Add Course</a>
    </div>
    @if(session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif
    <table class="table table-bordered">
        <thead>
        <tr>
            {{-- <th>ID</th> --}}
            <th>Course Code</th>
            <th>Program</th>
            <th>Name</th>
            <th>Fee</th>
            <th>Duration</th>
            <th>Mode</th>
            <th>Apply Option</th>
            <th>Courseable (Session/Batch)</th>
            <th>Actions</th>
        </tr>
        </thead>
        <tbody>
        @foreach($courses as $course)
            <tr>
                {{-- <td>{{ $course->id }}</td> --}}
                <td>{{ $course->course_code }}</td>
                <td>{{ optional($course->program)->name ?? 'N/A' }}</td>
                <td>{{ $course->name ?? 'N/A' }}</td>
                <td>{{ $course->course_fee }}</td>
                <td>{{ $course->duration }}</td>
                <td>{{ ucfirst($course->mode) }}</td>
                <td>{{ $course->apply_option ? 'Yes' : 'No' }}</td>
                <td>
                    @if($course->courseable_type === \App\Models\CourseSession::class)
                        Session: {{ optional($course->courseable)->name ?? 'N/A' }}
                    @else
                        Batch: {{ optional($course->courseable)->name ?? 'N/A' }}
                    @endif
                </td>
                <td>
                    <!-- New Students button -->
                    <a href="{{ route('admin.course_management.courses.students', $course) }}" class="btn btn-sm btn-info">Students</a>
                    <a href="{{ route('admin.course_management.courses.edit', $course) }}" class="btn btn-sm btn-warning">Edit</a>
                    <form action="{{ route('admin.course_management.courses.destroy', $course) }}" method="POST" style="display:inline-block;">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-sm btn-danger" onclick="return confirm('Are you sure?')">Delete</button>
                    </form>
                </td>
            </tr>
        @endforeach
        </tbody>
    </table>
@endsection
