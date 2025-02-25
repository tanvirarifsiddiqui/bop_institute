@extends('layouts.admin_app')

@section('title', 'Manage Inquiries')

@section('content')
    <div class="container mt-5">
        <h1 class="mb-4">Inquiries</h1>

        @if(session('success'))
            <div class="alert alert-success">
                {{ session('success') }}
            </div>
        @endif

        @if($inquiries->count())
            <table class="table table-striped">
                <thead class="table-dark">
                <tr>
                    <th>#</th>
                    <th>Formula</th>
                    <th>User Name</th>
                    <th>Email</th>
                    <th>Approved</th>
                    <th>Date Submitted</th>
                    <th>Actions</th>
                </tr>
                </thead>
                <tbody>
                @foreach($inquiries as $inquiry)
                    <tr>
                        <td>{{ $loop->iteration + ($inquiries->currentPage() - 1) * $inquiries->perPage() }}</td>
                        <td>{{ $inquiry->formula->title }}</td>
                        <td>{{ $inquiry->name }}</td>
                        <td>{{ $inquiry->email }}</td>
                        <td>
                            @if($inquiry->approved)
                                <span class="badge bg-success">Yes</span>
                            @else
                                <span class="badge bg-warning">No</span>
                            @endif
                        </td>
                        <td>{{ $inquiry->created_at->format('Y-m-d') }}</td>
                        <td>
                            <a href="{{ route('admin.inquiries.show', $inquiry->id) }}" class="btn btn-sm btn-primary">View</a>
                            <form action="{{ route('admin.inquiries.destroy', $inquiry->id) }}" method="POST" class="d-inline" onsubmit="return confirm('Are you sure you want to delete this inquiry?');">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-sm btn-danger">Delete</button>
                            </form>
                        </td>
                    </tr>
                @endforeach
                </tbody>
            </table>

            <!-- Pagination Links -->
            {{ $inquiries->links('pagination::bootstrap-5') }}
        @else
            <div class="alert alert-info">No inquiries found.</div>
        @endif
    </div>
@endsection
