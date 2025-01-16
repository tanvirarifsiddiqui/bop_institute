@extends('layouts.admin_app')

@section('title', 'Add Formula')

@section('content')
    <div class="container mt-5">
        <h1 class="text-center mb-4">Add a Formula E-Book</h1>

        <!-- Display validation errors -->
        @if($errors->any())
            <div class="alert alert-danger">
                <ul class="mb-0">
                    @foreach($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <!-- Form -->
        <form method="POST" action="{{ route('admin.formulas.store') }}" enctype="multipart/form-data">
            @csrf

            <div class="mb-3">
                <label for="title" class="form-label">Formula Name</label>
                <input type="text" name="title" id="title" class="form-control" placeholder="Enter formula name" value="{{ old('title') }}">
            </div>

            <div class="mb-3">
                <label for="category_id" class="form-label">Category</label>
                <select name="category_id" id="category_id" class="form-select">
                    <option value="">Select a Category</option>
                    @foreach($categories as $category)
                        <option value="{{ $category->id }}" {{ old('category_id') == $category->id ? 'selected' : '' }}>
                            {{ $category->name }}
                        </option>
                    @endforeach
                </select>
            </div>

            <div class="mb-3">
                <label for="price" class="form-label">Price</label>
                <input type="text" name="price" id="price" class="form-control" placeholder="Enter price" value="{{ old('price') }}">
            </div>

            <div class="mb-3">
                <label for="description" class="form-label">Description</label>
                <textarea name="description" id="description" class="form-control" rows="4" placeholder="Enter description">{{ old('description') }}</textarea>
            </div>

            <div class="mb-3">
                <label for="discount" class="form-label">Discount</label>
                <input type="text" name="discount" id="discount" class="form-control" placeholder="Enter discount" value="{{ old('discount') }}">
            </div>

            <!-- PDF Upload -->
            <div class="mb-3">
                <label for="pdf" class="form-label">Upload PDF</label>
                <input type="file" name="pdf" id="pdf" class="form-control">
            </div>

            <!-- Image Upload with Preview -->
            <div class="mb-3">
                <label for="image" class="form-label">Upload Image</label>
                <input type="file" name="image" id="image" class="form-control" accept="image/*" onchange="previewImage(event)">
                <div class="mt-3">
                    <img id="image-preview" src="#" alt="Image Preview" class="img-fluid d-none" style="max-height: 200px;">
                </div>
            </div>

            <button type="submit" class="btn btn-primary">Save Formula</button>
        </form>
    </div>
@endsection
