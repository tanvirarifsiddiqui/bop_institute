@extends('layouts.admin_app')

@section('title', 'Add Category')

@section('content')
    <div class="container mt-5">
        <div class="card shadow-lg">
            <div class="card-header bg-primary text-white">
                <h4>Add a New Category</h4>
            </div>
            <div class="card-body">
                @if ($errors->any())
                    <div class="alert alert-danger">
                        <ul>
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif

                <form method="POST" action="{{ route('categories.store') }}">
                    @csrf
                    @method('post')
                    <div class="mb-3">
                        <label for="name" class="form-label">Category Name</label>
                        <input type="text" class="form-control" id="name" name="name" placeholder="Enter category name" required>
                    </div>
                    <button type="submit" class="btn btn-success">Save Category</button>
                </form>
            </div>
        </div>
    </div>
@endsection
