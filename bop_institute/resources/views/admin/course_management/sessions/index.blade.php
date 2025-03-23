@extends('layouts.course_management')
@section('title', 'Manage Course Sessions')
@section('main')
    <div class="row">
        <div class="col-md-9">
            <div class="d-flex justify-content-between mb-3">
                <h2>Course Sessions</h2>
                <a href="{{ route('admin.course_management.sessions.create') }}" class="btn btn-primary">Add Session</a>
            </div>
            @if(session('success'))
                <div class="alert alert-success">{{ session('success') }}</div>
            @endif
            <table class="table table-bordered">
                <thead>
                <tr>
                    <th>ID</th>
                    <th>Session Name</th>
                    <th>Actions</th>
                </tr>
                </thead>
                <tbody>
                @foreach($sessions as $session)
                    <tr>
                        <td>{{ $session->id }}</td>
                        <td>{{ $session->name }}</td>
                        <td>
                            <a href="{{ route('admin.course_management.sessions.edit', $session) }}" class="btn btn-sm btn-warning">Edit</a>
                            <form action="{{ route('admin.course_management.sessions.destroy', $session) }}" method="POST" style="display:inline-block;">
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
        </div>
    </div>
@endsection
