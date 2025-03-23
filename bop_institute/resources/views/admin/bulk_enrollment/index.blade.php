@extends('layouts.admin_app')
@section('title', 'Bulk Enrollment Processing')
@section('content')
<div class="container mt-4">
    <div class="mb-3">
        <h2>Bulk Enrollment Processing</h2>
    </div>
    @if(session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif
    <form action="{{ route('admin.bulk_enrollment.process') }}" method="POST">
        @csrf
        <table class="table table-bordered">
            <thead>
            <tr>
                <th>Select</th>
                <th>ID</th>
                <th>Student</th>
                <th>Course</th>
                <th>Status</th>
            </tr>
            </thead>
            <tbody>
            @foreach($approvedApplications as $application)
                <tr>
                    <td>
                        <input type="checkbox" name="application_ids[]" value="{{ $application->id }}">
                    </td>
                    <td>{{ $application->studentProfile->id }}</td>
                    <td>{{ $application->studentProfile->full_name }}</td>
                    <td>{{ $application->course->name }}</td>
                    <td>{{ ucfirst($application->status) }}</td>
                </tr>
            @endforeach
            </tbody>
        </table>
        <button type="submit" class="btn btn-primary">Process Enrollments</button>
    </form>
</div>
@endsection
