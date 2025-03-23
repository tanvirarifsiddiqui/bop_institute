@extends('layouts.course_management')
@section('title', 'Programs List')
@section('main')
    <div class="d-flex justify-content-between mb-3">
        <h2>Programs</h2>
        <a href="{{ route('admin.course_management.programs.create') }}" class="btn btn-primary">Add Program</a>
    </div>
    @if(session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif
    <table class="table table-bordered">
        <thead>
        <tr>
            <th>ID</th>
            <th>Course Type</th>
            <th>Program Name</th>
{{--            <th>Description</th>--}}
            <th>Actions</th>
        </tr>
        </thead>
        <tbody>
        @foreach($programs as $program)
            <tr>
                <td>{{ $program->id }}</td>
                <td>{{ $program->courseType->name }}</td>
                <td>{{ $program->name }}</td>
{{--                <td>{{ $program->description }}</td>--}}
                <td>
                    <a href="{{ route('admin.course_management.programs.edit', $program) }}" class="btn btn-sm btn-warning">Edit</a>
                    <form action="{{ route('admin.course_management.programs.destroy', $program) }}" method="POST" style="display:inline-block;">
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
