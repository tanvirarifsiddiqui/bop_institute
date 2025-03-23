@extends('layouts.app')
@section('title', 'Courses')
@section('content')
    <div class="container mt-5">
        <h2>Courses</h2>
        @foreach($courseTypes as $courseType)
            <div class="card my-4">
                <div class="card-header">
                    <h3>{{ $courseType->name }}</h3>
                </div>
                <div class="card-body">
                    @foreach($courseType->programs as $program)
                        <h4>{{ $program->name }}</h4>
                        <div class="row">
                            @foreach($program->courses as $course)
                                <div class="col-md-4 mb-3">
                                    <div class="card h-100">
                                        <div class="card-body">
                                            <h5 class="card-title">{{ $course->name }}</h5>
                                            <p class="card-text">{{ $course->description }}</p>
                                            <p class="card-text"><strong>Duration:</strong> {{ $course->duration }}</p>
                                            <p class="card-text"><strong>Mode:</strong> {{ ucfirst($course->mode) }}</p>
                                            <a href="{{ route('course_application.select') }}" class="btn btn-primary">Apply</a>
                                        </div>
                                    </div>
                                </div>
                            @endforeach
                        </div>
                    @endforeach
                </div>
            </div>
        @endforeach
    </div>
@endsection
