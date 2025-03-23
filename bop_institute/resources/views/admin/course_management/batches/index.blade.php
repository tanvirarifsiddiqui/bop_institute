@extends('layouts.course_management')
@section('title', 'Manage Batches')
@section('main')
    <div class="d-flex justify-content-between mb-3">
        <h2>Batches</h2>
        <a href="{{ route('admin.course_management.batches.create') }}" class="btn btn-primary">Add Batch</a>
    </div>
    @if(session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif
    <table class="table table-bordered">
        <thead>
        <tr>
            <th>ID</th>
            <th>Batch Name</th>
            <th>Start Date</th>
            <th>Actions</th>
        </tr>
        </thead>
        <tbody>
        @foreach($batches as $batch)
            <tr>
                <td>{{ $batch->id }}</td>
                <td>{{ $batch->name }}</td>
                <td>{{ $batch->start_date }}</td>
                <td>
                    <a href="{{ route('admin.course_management.batches.edit', $batch) }}" class="btn btn-sm btn-warning">Edit</a>
                    <form action="{{ route('admin.course_management.batches.destroy', $batch) }}" method="POST" style="display:inline-block;">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-sm btn-danger"
                                onclick="return confirm('Are you sure?')">Delete</button>
                    </form>
                </td>
            </tr>
        @endforeach
        </tbody>
    </table>
@endsection
