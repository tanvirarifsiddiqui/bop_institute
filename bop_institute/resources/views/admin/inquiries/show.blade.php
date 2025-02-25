@extends('layouts.admin_app')

@section('title', 'Inquiry Details')

@section('content')
    <div class="container mt-5">
        <h1 class="mb-4">Inquiry Details</h1>

        @if(session('success'))
            <div class="alert alert-success">
                {{ session('success') }}
            </div>
        @endif

        <!-- Inquiry Information -->
        <div class="card mb-4">
            <div class="card-header">
                Inquiry from {{ $inquiry->name }}
            </div>
            <div class="card-body">
                <p><strong>Email:</strong> {{ $inquiry->email }}</p>
                <p><strong>Industry:</strong> {{ $inquiry->category->name }}</p>
                <p><strong>Formula:</strong> {{ $inquiry->formula->title }}</p>
                <p><strong>Message:</strong></p>
                <p>{{ $inquiry->message }}</p>
                <p><strong>Date Submitted:</strong> {{ $inquiry->created_at->format('F j, Y, g:i a') }}</p>
            </div>
        </div>

        <!-- Approval Status -->
        @if(!$inquiry->approved)
            <form action="{{ route('admin.inquiries.approve', $inquiry->id) }}" method="POST" class="mb-4">
                @csrf
                <button type="submit" class="btn btn-success">Approve Inquiry</button>
            </form>
        @else
            <div class="alert alert-success mb-4">
                This inquiry is approved and visible in the FAQ section.
            </div>
        @endif

        <!-- Reply Section -->
        <div class="card mb-4">
            <div class="card-header">
                Your Reply
            </div>
            <div class="card-body">
                @if($inquiry->reply)
                    <p>{{ $inquiry->reply }}</p>
                    <form action="{{ route('admin.inquiries.reply', $inquiry->id) }}" method="POST">
                        @csrf
                        <div class="mb-3">
                            <label for="reply" class="form-label">Edit Reply</label>
                            <textarea name="reply" id="reply" rows="5" class="form-control">{{ old('reply', $inquiry->reply) }}</textarea>
                        </div>
                        <button type="submit" class="btn btn-primary">Update Reply</button>
                    </form>
                @else
                    <form action="{{ route('admin.inquiries.reply', $inquiry->id) }}" method="POST">
                        @csrf
                        <div class="mb-3">
                            <label for="reply" class="form-label">Write a Reply</label>
                            <textarea name="reply" id="reply" rows="5" class="form-control">{{ old('reply') }}</textarea>
                        </div>
                        <button type="submit" class="btn btn-primary">Send Reply</button>
                    </form>
                @endif
            </div>
        </div>

        <!-- Back Button -->
        <a href="{{ route('admin.inquiries.index') }}" class="btn btn-secondary">Back to Inquiries</a>
    </div>
@endsection
