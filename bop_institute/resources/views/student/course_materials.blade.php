@extends('layouts.app')
@section('title', 'Course Materials')
@section('content')
    <div class="container mt-5">
        <h2>Course Materials for {{ $enrollment->course->name }}</h2>
        <div class="mt-4">
            @if($enrollment->course->materials->isEmpty())
                <p>No materials available for this course.</p>
            @else
                <ul class="list-group">
                    @foreach($enrollment->course->materials as $material)
                        <li class="list-group-item">
                            <a href="{{ asset('storage/' . $material->file_path) }}" target="_blank">{{ $material->title }}</a>
                        </li>
                    @endforeach
                </ul>
            @endif
        </div>
    </div>
@endsection
