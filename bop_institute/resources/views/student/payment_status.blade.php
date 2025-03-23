@extends('layouts.app')
@section('title', 'Payment Status')
@section('content')
    <div class="container mt-5">
        <h2>Payment Status</h2>
        <div class="mt-4">
            @if($applications->isEmpty())
                <p>No payment records found.</p>
            @else
                <ul class="list-group">
                    @foreach($applications as $application)
                        <li class="list-group-item">
                            <strong>{{ $application->course->name }}</strong> ({{ $application->course->program->name }})
                            <p>Status: {{ ucfirst($application->status) }}</p>
                            <p>Fee: {{ $application->course->course_fee }}</p>
                            <p>Payment Status: {{ $application->payment_status }}</p>
                        </li>
                    @endforeach
                </ul>
            @endif
        </div>
    </div>
@endsection
