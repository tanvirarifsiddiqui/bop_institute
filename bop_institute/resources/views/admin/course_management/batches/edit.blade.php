@extends('layouts.course_management')
@section('title', 'Edit Batch')
@section('main')
    <h2>Edit Batch</h2>
    <form method="POST" action="{{ route('admin.course_management.batches.update', $batch) }}">
        @csrf
        @method('PUT')
        <div class="mb-3">
            <label for="name" class="form-label">Batch Name (optional)</label>
            <input type="text" name="name" id="name" class="form-control" value="{{ $batch->name }}">
        </div>
        <div class="mb-3">
            <label for="start_date" class="form-label">Start Date</label>
            <input type="date" name="start_date" id="start_date" class="form-control" value="{{ $batch->start_date }}" required>
        </div>
        <button type="submit" class="btn btn-primary">Update Batch</button>
    </form>
@endsection
