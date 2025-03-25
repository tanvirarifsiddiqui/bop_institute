@extends('layouts.course_management')
@section('title', 'Course Enrollments')
@section('main')
    <div class="container mt-4">
        <div class="mb-3">
            <h2>Enrolled Students for Course: {{ $course->name }}</h2>
            <p><strong>Course Code:</strong> {{ $course->course_code }}</p>
        </div>
        @if(session('success'))
            <div class="alert alert-success">{{ session('success') }}</div>
        @endif

        @if($enrollments->isEmpty())
            <div class="alert alert-info">No students are enrolled in this course yet.</div>
        @else
            <div class="table-responsive">
                <table class="table table-hover align-middle">
                    <thead class="table-light">
                    <tr>
                        <th>Student ID</th>
                        <th>Student Name</th>
                        <th>Email</th>
                        <th>Enrolled On</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($enrollments as $enrollment)
                        <tr>
                            <td>{{ $enrollment->studentProfile->id }}</td>
                            <td>{{ $enrollment->studentProfile->full_name }}</td>
                            <td>{{ $enrollment->studentProfile->user->email }}</td>
                            <td>{{ \Carbon\Carbon::parse($enrollment->created_at)->format('d M Y, h:i A') }}</td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
            </div>
        @endif

        <a href="{{ route('admin.course_management.courses.index') }}" class="btn btn-secondary mt-3">Back to Courses</a>
    </div>
@endsection
