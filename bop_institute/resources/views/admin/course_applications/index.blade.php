@extends('layouts.admin_app')
@section('title', 'Pending Course Applications')
@section('content')
<div class="container mt-4">
    <div class="mb-3">
        <h2>Pending Course Applications</h2>
    </div>
    @if(session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif
    <table class="table table-bordered">
        <thead>
        <tr>
            <th>ID</th>
            <th>Student</th>
            <th>Course</th>
            <th>Status</th>
            <th>Submitted At</th>
            <th>Actions</th>
        </tr>
        </thead>
        <tbody>
        @foreach($applications as $application)
            <tr>
                <td>{{ $application->studentProfile->id }}</td>
                <td>{{ $application->studentProfile->full_name }}</td>
                <td>{{ $application->course->name }}</td>
                <td>{{ ucfirst($application->status) }}</td>
                <td>{{ $application->created_at->format('Y-m-d H:i') }}</td>
                <td>
                    <form action="{{ route('admin.course_applications.approve', $application) }}" method="POST" style="display:inline-block;">
                        @csrf
                        <button type="submit" class="btn btn-success">Approve</button>
                    </form>
                    <form action="{{ route('admin.course_applications.reject', $application) }}" method="POST" style="display:inline-block;">
                        @csrf
                        <button type="button" class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#rejectModal{{ $application->id }}">Reject</button>
                        <div class="modal fade" id="rejectModal{{ $application->id }}" tabindex="-1" aria-labelledby="rejectModalLabel" aria-hidden="true">
                            <div class="modal-dialog">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="rejectModalLabel">Reject Application</h5>
                                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                    </div>
                                    <div class="modal-body">
                                        <div class="mb-3">
                                            <label for="rejectionReason" class="form-label">Reason for Rejection</label>
                                            <textarea name="rejection_reason" id="rejectionReason" class="form-control" required></textarea>
                                        </div>
                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                        <button type="submit" class="btn btn-danger">Reject</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </form>
                </td>
            </tr>
        @endforeach
        </tbody>
    </table>
</div>
@endsection
