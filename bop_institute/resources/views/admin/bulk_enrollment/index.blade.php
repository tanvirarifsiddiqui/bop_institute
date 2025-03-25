@extends('layouts.admin_app')
@section('title', 'Bulk Enrollment Processing')
@section('content')
    <style>
        /* Custom CSS for tabs */
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
    <div class="container mt-4">
        <h2 class="mb-4">Bulk Enrollment Processing</h2>

        <!-- Nav tabs -->
        <ul class="nav nav-tabs justify-content-center" id="bulkEnrollmentTabs" role="tablist">
            <li class="nav-item" role="presentation">
                <button class="nav-link active " id="bulk-tab" data-bs-toggle="tab" data-bs-target="#bulk" type="button" role="tab" aria-controls="bulk" aria-selected="true">
                    Bulk Enrollment
                </button>
            </li>
            <li class="nav-item" role="presentation">
                <button class="nav-link" id="coursewise-tab" data-bs-toggle="tab" data-bs-target="#coursewise" type="button" role="tab" aria-controls="coursewise" aria-selected="false">
                    Course-wise Enrollments
                </button>
            </li>
        </ul>

        <!-- Tab Content -->
        <div class="tab-content mt-3" id="bulkEnrollmentTabsContent">
            <!-- Bulk Enrollment Processing Tab -->
            <div class="tab-pane fade show active" id="bulk" role="tabpanel" aria-labelledby="bulk-tab">
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

            <!-- Course-wise Enrollments Tab -->
            <div class="tab-pane fade" id="coursewise" role="tabpanel" aria-labelledby="coursewise-tab">
                @if($courses->isEmpty())
                    <div class="alert alert-info">No courses available.</div>
                @else
                    <div class="accordion" id="courseAccordion">
                        @foreach($courses as $course)
                            <div class="accordion-item">
                                <h2 class="accordion-header" id="heading-{{ $course->id }}">
                                    <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapse-{{ $course->id }}" aria-expanded="false" aria-controls="collapse-{{ $course->id }}">
                                        {{ $course->name }} ({{ $course->course_code }})
                                    </button>
                                </h2>
                                <div id="collapse-{{ $course->id }}" class="accordion-collapse collapse" aria-labelledby="heading-{{ $course->id }}" data-bs-parent="#courseAccordion">
                                    <div class="accordion-body">
                                        @if($course->enrollments->isEmpty())
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
                                                    @foreach($course->enrollments as $enrollment)
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
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    </div>
                @endif
            </div>
        </div>
    </div>
@endsection
