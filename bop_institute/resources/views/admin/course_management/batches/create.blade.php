@extends('layouts.course_management')
@section('title', 'Add Batch')
@section('main')
    <h2>Add New Batch</h2>
    <form method="POST" action="{{ route('admin.course_management.batches.store') }}">
        @csrf
        <div class="mb-3">
            <label for="name" class="form-label">Batch Name (optional)</label>
            <input type="text" name="name" id="name" class="form-control" placeholder="e.g. Batch A">
        </div>
        <div class="mb-3">
            <label for="start_date" class="form-label">Start Date</label>
            <input type="date" name="start_date" id="start_date" class="form-control" required>
        </div>
        <button type="submit" class="btn btn-primary">Create Batch</button>
    </form>
@endsection
