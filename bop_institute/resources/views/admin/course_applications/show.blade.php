@extends('layouts.admin_app')
@section('title', 'Course Application Details')
@section('content')
    <div>
        <h2>Course Application Details</h2>
        <p><strong>Student:</strong> {{ $application->studentProfile->full_name }}</p>
        <p><strong>Course:</strong> {{ $application->course->name }}</p>
        <p><strong>Status:</strong> {{ ucfirst($application->status) }}</p>
        <p><strong>Submitted At:</strong> {{ $application->created_at->format('Y-m-d H:i') }}</p>
    </div>
    <div class="mt-4">
        <form method="POST" action="{{ route('admin.course_applications.approve', $application) }}" style="display:inline-block;">
            @csrf
            <button type="submit" class="btn btn-success" onclick="return confirm('Approve this application?')">Approve</button>
        </form>
        <form method="POST" action="{{ route('admin.course_applications.enroll', $application) }}" style="display:inline-block;">
            @csrf
            <button type="submit" class="btn btn-primary" onclick="return confirm('Enroll this student?')">Enroll</button>
        </form>
        <form method="POST" action="{{ route('admin.course_applications.reject', $application) }}" style="display:inline-block;">
            @csrf
            <button type="submit" class="btn btn-danger" onclick="return confirm('Reject this application?')">Reject</button>
        </form>
    </div>
@endsection
