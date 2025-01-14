@extends('layouts.admin_app')

@section('title', 'Add Formula')

@section('content')
    <div class="container mt-5">
        <h1 class="text-center mb-4">Add a Formula E-Book</h1>

        <!-- Display Errors -->
        @if($errors->any())
            <div class="alert alert-danger">
                <ul class="mb-0">
                    @foreach($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <form method="POST" action="{{ route('formulas.store') }}" class="p-4 bg-light rounded shadow">
            @csrf
            @method('post')

            <!-- Formula Name -->
            <div class="mb-3">
                <label for="title" class="form-label">Formula Name</label>
                <input type="text" class="form-control" id="title" name="title" placeholder="Enter formula name">
            </div>

            <!-- Category ID -->
            <div class="mb-3">
                <label for="category_id" class="form-label">Category ID</label>
                <input type="text" class="form-control" id="category_id" name="category_id" placeholder="Enter category ID">
            </div>

            <!-- Price -->
            <div class="mb-3">
                <label for="price" class="form-label">Price</label>
                <input type="text" class="form-control" id="price" name="price" placeholder="Enter price">
            </div>

            <!-- Description -->
            <div class="mb-3">
                <label for="description" class="form-label">Description</label>
                <textarea class="form-control" id="description" name="description" rows="3" placeholder="Enter description"></textarea>
            </div>

            <!-- Discount -->
            <div class="mb-3">
                <label for="discount" class="form-label">Discount (%)</label>
                <input type="text" class="form-control" id="discount" name="discount" placeholder="Enter discount">
            </div>

            <!-- Submit Button -->
            <div class="text-center">
                <button type="submit" class="btn btn-success w-50">Save Formula</button>
            </div>
        </form>
    </div>
@endsection
