@extends('layouts.app')

@section('title', 'Student Dashboard')

@section('content')
    <div class="container mt-5">
        <h2 class="mb-4">Welcome, {{ $studentProfile->full_name }}</h2>

        <!-- Nav tabs -->
        <ul class="nav nav-tabs" id="studentDashboardTabs" role="tablist">
            <li class="nav-item" role="presentation">
                <button class="nav-link active" id="courses-tab" data-bs-toggle="tab" data-bs-target="#courses" type="button" role="tab" aria-controls="courses" aria-selected="true">
                    Enrolled Courses
                </button>
            </li>
            <li class="nav-item" role="presentation">
                <button class="nav-link" id="info-tab" data-bs-toggle="tab" data-bs-target="#info" type="button" role="tab" aria-controls="info" aria-selected="false">
                    Student Information
                </button>
            </li>
        </ul>

        <!-- Tab content -->
        <div class="tab-content mt-4" id="studentDashboardTabsContent">
            <!-- Enrolled Courses Tab -->
            <div class="tab-pane fade show active" id="courses" role="tabpanel" aria-labelledby="courses-tab">
                <div class="card shadow-sm">
                    <div class="card-header bg-primary text-white">
                        <h4 class="mb-0">Your Enrolled Courses</h4>
                    </div>
                    <div class="card-body">
                        @if($enrollments->isEmpty())
                            <div class="alert alert-info">
                                You are not enrolled in any courses yet.
                            </div>
                        @else
                            <div class="table-responsive">
                                <table class="table table-hover align-middle">
                                    <thead class="table-light">
                                    <tr>
                                        <th>Course Name</th>
                                        <th>Program</th>
                                        <th>Duration</th>
                                        <th>Mode</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    @foreach($enrollments as $enrollment)
                                        <tr>
                                            <td>{{ $enrollment->course->name }}</td>
                                            <td>{{ $enrollment->course->program->name }}</td>
                                            <td>{{ $enrollment->course->duration }}</td>
                                            <td>{{ ucfirst($enrollment->course->mode) }}</td>
                                        </tr>
                                    @endforeach
                                    </tbody>
                                </table>
                            </div>
                        @endif
                    </div>
                </div>
            </div>

            <!-- Student Information Tab -->
            <div class="tab-pane fade" id="info" role="tabpanel" aria-labelledby="info-tab">
                <div class="card shadow-sm mb-4">
                    <div class="card-header bg-secondary text-white">
                        <h4 class="mb-0">Basic Information</h4>
                    </div>
                    <div class="card-body">
                        @include('student.partials.student_information')
                    </div>
                </div>
                <div class="card shadow-sm">
                    <div class="card-header bg-info text-white">
                        <h4 class="mb-0">Educational Qualifications</h4>
                    </div>
                    <div class="card-body">
                        @include('student.partials.educational_qualification')
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
