@extends('layouts.admin_app')

@section('title', 'Categories')

@section('content')
    <div class="container mt-4">
        <h1>Categories</h1>
        <a href="{{ route('categories.create') }}" class="btn btn-primary mb-3">Create Category</a>
        @if (session()->has('success'))
            <div class="alert alert-success">{{ session('success') }}</div>
        @endif
        <table class="table table-bordered">
            <thead>
            <tr>
                <th>ID</th>
                <th>Name</th>
                <th>Edit</th>
                <th>Delete</th>
            </tr>
            </thead>
            <tbody>
            @foreach ($categories as $category)
                <tr>
                    <td>{{ $category->id }}</td>
                    <td>{{ $category->name }}</td>
                    <td>
                        <a href="{{ route('categories.edit', ['category'=>$category]) }}"
                           class="btn btn-sm btn-primary">Edit</a>
                    </td>
                    <td>
                        <form method="POST" action="{{ route('categories.destroy', ['category'=>$category]) }}">
                            @csrf
                            @method('delete')
                            <button type="submit" class="btn btn-sm btn-danger">Delete</button>
                        </form>
                    </td>
                </tr>
            @endforeach
            </tbody>
        </table>
    </div>
@endsection
