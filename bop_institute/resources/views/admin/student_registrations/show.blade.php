@extends('layouts.admin_app')
@section('title', 'Student Registration Details')
@section('content')
    <div class="container mt-4">
        <h2>Student Registration Details</h2>
        <div class="card mb-4">
            <div class="card-header">
                Basic User Information
            </div>
            <div class="card-body">
                <p><strong>User Name:</strong> {{ $studentRegistration->user->name }}</p>
                <p><strong>Email:</strong> {{ $studentRegistration->user->email }}</p>
                <p><strong>Status:</strong> {{ ucfirst($studentRegistration->status) }}</p>
                <p><strong>Submitted At:</strong> {{ $studentRegistration->created_at->format('Y-m-d H:i') }}</p>
            </div>
        </div>

        {{-- Student Profile Details --}}
        @if($studentRegistration->studentProfile)
            <div class="card mb-4">
                <div class="card-header">
                    Student Profile Details
                </div>
                <div class="card-body">
                    <div class="row mb-3">
                        <div class="col-md-3">
                            @if($studentRegistration->studentProfile->profile_picture)
                                <img src="{{ asset('uploads/' . $studentRegistration->studentProfile->profile_picture) }}" alt="Profile Picture" class="img-fluid rounded">
                            @else
                                <img src="{{ asset('images/default_profile.png') }}" alt="Default Profile" class="img-fluid rounded">
                            @endif
                        </div>
                        <div class="col-md-9">
                            <p><strong>Student Name:</strong> {{ $studentRegistration->studentProfile->full_name }}</p>
                            <p><strong>Father's Name:</strong> {{ $studentRegistration->studentProfile->father_name }}</p>
                            <p><strong>Date of Birth:</strong> {{ $studentRegistration->studentProfile->dob }}</p>
                            <p><strong>BRN/NID Number:</strong> {{ $studentRegistration->studentProfile->id_number }}</p>
                            <p><strong>Mobile Number:</strong> {{ $studentRegistration->studentProfile->mobile }}</p>
                        </div>
                    </div>
                    {{-- Educational Qualification --}}
                    <h5>Educational Qualifications</h5>
                    @php
                        $education = json_decode($studentRegistration->studentProfile->education, true);
                    @endphp
                    @if($education)
                        <table class="table table-bordered">
                            <thead>
                            <tr>
                                <th>Exam Name</th>
                                <th>Passing Year</th>
                                <th>GPA</th>
                                <th>Board/University/College</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($education as $key => $edu)
                                <tr>
                                    <td>{{ strtoupper($edu['exam_name'] ?? $key) }}</td>
                                    <td>{{ $edu['passing_year'] ?? 'N/A' }}</td>
                                    <td>{{ $edu['gpa'] ?? 'N/A' }}</td>
                                    <td>{{ $edu['institution'] ?? 'N/A' }}</td>
                                </tr>
                            @endforeach
                            </tbody>
                        </table>
                    @endif
                    <p><strong>Nationality:</strong> {{ $studentRegistration->studentProfile->nationality }}</p>
                    <p><strong>Religion:</strong> {{ $studentRegistration->studentProfile->religion }}</p>
                    <p><strong>Gender:</strong> {{ $studentRegistration->studentProfile->gender }}</p>
                    <p><strong>Blood Group:</strong> {{ $studentRegistration->studentProfile->blood_group ?? 'N/A' }}</p>
                    <p><strong>Present Address:</strong> {{ $studentRegistration->studentProfile->present_address }}</p>
                    <p><strong>Permanent Address:</strong> {{ $studentRegistration->studentProfile->permanent_address }}</p>
                </div>
            </div>
        @endif

        <div class="mt-4">
            <a href="{{ route('admin.student_registrations.edit', $studentRegistration) }}" class="btn btn-warning">Edit</a>
            <form method="POST" action="{{ route('admin.student_registrations.approve', $studentRegistration) }}" style="display:inline-block;">
                @csrf
                <button type="submit" class="btn btn-success" onclick="return confirm('Approve this registration?')">Approve</button>
            </form>
            <form method="POST" action="{{ route('admin.student_registrations.reject', $studentRegistration) }}" style="display:inline-block;">
                @csrf
                <button type="submit" class="btn btn-danger" onclick="return confirm('Reject this registration?')">Reject</button>
            </form>
        </div>
    </div>
@endsection
