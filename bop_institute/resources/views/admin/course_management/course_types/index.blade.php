@extends('layouts.course_management')
@section('title', 'Manage Course Types')
@section('main')
    <div class="d-flex justify-content-between mb-3">
        <h2>Course Types</h2>
        <a href="{{ route('admin.course_management.course_types.create') }}" class="btn btn-primary">Add Course Type</a>
    </div>
    @if(session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif
    <table class="table table-bordered">
        <thead>
        <tr>
            <th>ID</th>
            <th>Course Type Name</th>
            <th>Actions</th>
        </tr>
        </thead>
        <tbody>
        @foreach($courseTypes as $courseType)
            <tr>
                <td>{{ $courseType->id }}</td>
                <td>{{ $courseType->name }}</td>
                <td>
                    <a href="{{ route('admin.course_management.course_types.edit', $courseType) }}" class="btn btn-sm btn-warning">Edit</a>
                    <form action="{{ route('admin.course_management.course_types.destroy', $courseType) }}" method="POST" style="display:inline-block;">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-sm btn-danger" onclick="return confirm('Are you sure?')">Delete</button>
                    </form>
                </td>
            </tr>
        @endforeach
        </tbody>
    </table>
@endsection
