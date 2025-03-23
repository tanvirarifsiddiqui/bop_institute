@extends('layouts.app')
@section('title', 'Course Catalog')
@section('content')
    <div class="container mt-5">
        <h2 class="mb-4">Explore Our Courses</h2>

        <!-- Course List -->
        @foreach($courseTypes as $courseType)
            <div class="card my-4 shadow-sm">
                <div class="card-header bg-primary text-white">
                    <h3 class="mb-0">{{ $courseType->name }}</h3>
                </div>
                <div class="card-body">
                    @foreach($courseType->programs as $program)
                        <div class="mb-3">
                            <h4 class="text-secondary">{{ $program->name }}</h4>
                            <div class="row">
                                @foreach($program->courses as $course)
                                    <div class="col-md-6 col-lg-4 mb-4">
                                        <div class="card h-100">
                                            <div class="card-body">
                                                <h5 class="card-title">{{ $course->name }}</h5>
{{--                                                <p class="card-text">{{ $course->description }}</p>--}}
                                                <table class="table table-sm table-borderless">
                                                    <tr>
                                                        <th>Course Code:</th>
                                                        <td>{{ $course->course_code }}</td>
                                                    </tr>
                                                    <tr>
                                                        <th>Duration:</th>
                                                        <td>{{ $course->duration }}</td>
                                                    </tr>
                                                    <tr>
                                                        <th>Mode:</th>
                                                        <td>{{ ucfirst($course->mode) }}</td>
                                                    </tr>
                                                    <tr>
                                                        <th>Fee:</th>
                                                        <td>৳{{ number_format($course->course_fee, 2) }}</td>
                                                    </tr>
                                                    <tr>
                                                        <th>Availability:</th>
                                                        <td>
                                                            @if($course->courseable_type === 'App\\Models\\CourseSession')
                                                                Session: {{ $course->courseable->name }}
                                                            @else
                                                                Batch: {{ $course->courseable->name }}
                                                            @endif
                                                        </td>
                                                    </tr>
                                                </table>
                                            </div>
                                            <div class="card-footer bg-light">
                                                <!-- Apply Button triggers modal -->
                                                <button type="button" class="btn btn-primary btn-sm w-100" data-bs-toggle="modal" data-bs-target="#applyModal-{{ $course->id }}">
                                                    Apply Now
                                                </button>
                                            </div>
                                        </div>
                                    </div>

                                    <!-- Modal for Course Application -->
                                    <div class="modal fade" id="applyModal-{{ $course->id }}" tabindex="-1" aria-labelledby="applyModalLabel-{{ $course->id }}" aria-hidden="true">
                                        <div class="modal-dialog modal-lg modal-dialog-centered">
                                            <div class="modal-content">
                                                <form method="POST" action="{{ route('course_application.submit') }}">
                                                    @csrf
                                                    <div class="modal-header">
                                                        <h5 class="modal-title" id="applyModalLabel-{{ $course->id }}">Apply for "{{ $course->name }}"</h5>
                                                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                                    </div>
                                                    <div class="modal-body">
                                                        <table class="table table-bordered">
                                                            <tr>
                                                                <th>Course Code</th>
                                                                <td>{{ $course->course_code }}</td>
                                                            </tr>
{{--                                                            <tr>--}}
{{--                                                                <th>Description</th>--}}
{{--                                                                <td>{{ $course->description }}</td>--}}
{{--                                                            </tr>--}}
                                                            <tr>
                                                                <th>Duration</th>
                                                                <td>{{ $course->duration }}</td>
                                                            </tr>
                                                            <tr>
                                                                <th>Mode</th>
                                                                <td>{{ ucfirst($course->mode) }}</td>
                                                            </tr>
                                                            <tr>
                                                                <th>Fee</th>
                                                                <td>৳{{ number_format($course->course_fee, 2) }}</td>
                                                            </tr>
                                                            <tr>
                                                                <th>Availability</th>
                                                                <td>
                                                                    @if($course->courseable_type === 'App\\Models\\CourseSession')
                                                                        Session: {{ $course->courseable->name }}
                                                                    @else
                                                                        Batch: {{ $course->courseable->name }}
                                                                    @endif
                                                                </td>
                                                            </tr>
                                                        </table>
                                                        <!-- Student information (if the user is authenticated and has a student profile) -->
                                                        @auth
                                                            @if(Auth::user()->studentProfile)
                                                                <div class="alert alert-info">
                                                                    <strong>Student:</strong> {{ Auth::user()->studentProfile->full_name }} (ID: {{ Auth::user()->id }})
                                                                </div>
                                                            @else
                                                                <div class="alert alert-warning">
                                                                    You have not completed your student registration.
                                                                </div>
                                                            @endif
                                                        @else
                                                            <div class="alert alert-warning">
                                                                Please log in to apply.
                                                            </div>
                                                        @endauth

                                                        <!-- Hidden input for course_id -->
                                                        <input type="hidden" name="course_id" value="{{ $course->id }}">
                                                    </div>
                                                    <div class="modal-footer">
                                                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                                        @auth
                                                            @if(Auth::user()->studentProfile)
                                                                <button type="submit" class="btn btn-primary">Confirm Application</button>
                                                            @endif
                                                        @else
                                                            <a href="{{ route('login') }}" class="btn btn-primary">Login to Apply</a>
                                                        @endauth
                                                    </div>
                                                </form>
                                            </div>
                                        </div>
                                    </div>
                                    <!-- End Modal -->
                                @endforeach
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
        @endforeach
    </div>
@endsection
