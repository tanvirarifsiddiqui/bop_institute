@extends('layouts.app')

@section('title', 'Student Dashboard')

@section('content')
    <style>
        /* Custom CSS for the overall card container */
        .dashboard-card {
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
            border-radius: 8px;
            background-color: #fff;
            border: none;
        }

        .dashboard-card-header {
            background-color: #0066cc;
            color: #fff;
            border-radius: 8px 8px 0 0;
            padding: 15px;
            text-align: center;
        }

        .dashboard-card-body {
            padding: 20px;
        }

        .nav-tabs .nav-link {
            color: #fff;
            background-color: #0572dd;
            border: 1px solid #ddd;
            transition: background-color 0.3s ease, color 0.3s ease;
        }

        .nav-tabs .nav-link:hover {
            background-color: #004a99;
            color: #fff;
        }

        .nav-tabs .nav-link.active {
            color: #fff;
            background-color: #004a99;
            border-color: #004a99;
        }

        .tab-content {
            border: 1px solid #ddd;
            border-top: none;
            padding: 15px;
            animation: fadeIn 0.5s ease-in-out;
        }

        @keyframes fadeIn {
            from {
                opacity: 0;
            }
            to {
                opacity: 1;
            }
        }
    </style>
    <div class="container mt-5">
        <!-- Card Container -->
        <div class="dashboard-card">
            <!-- Header -->
            <div class="dashboard-card-header">
                <h2>Welcome, {{ $studentProfile->full_name }}</h2>
            </div>

            <!-- Card Body -->
            <div class="dashboard-card-body">
                <!-- Nav Tabs -->
                <ul class="nav nav-tabs justify-content-center" id="studentDashboardTabs" role="tablist">
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

                <!-- Tab Content -->
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
                                                <th>Enrolled On</th>
                                            </tr>
                                            </thead>
                                            <tbody>
                                            @foreach($enrollments as $enrollment)
                                                <tr>
                                                    <td>{{ $enrollment->course->name }}</td>
                                                    <td>{{ $enrollment->course->program->name }}</td>
                                                    <td>{{ $enrollment->course->duration }}</td>
                                                    <td>{{ ucfirst($enrollment->course->mode) }}</td>
                                                    <td>{{ \Carbon\Carbon::parse($enrollment->created_at)->format('d M Y, h:i A') }}</td>
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
        </div>
    </div>
@endsection
