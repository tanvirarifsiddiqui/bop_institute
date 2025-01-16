@extends('layouts.admin_app')

@section('title', 'Edit Formula')

@section('content')
    <div class="container mt-5">
        <h1 class="text-center mb-4">Edit Formula E-Book</h1>

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
        <form method="POST" action="{{ route('admin.formulas.update', ['formula' => $formula]) }}" enctype="multipart/form-data">
            @csrf
            @method('put')

            <!-- Formula Name -->
            <div class="mb-3">
                <label for="title" class="form-label">Formula Name</label>
                <input type="text" name="title" id="title" class="form-control" placeholder="Enter formula name" value="{{ $formula->title }}">
            </div>

            <!-- Category Dropdown -->
            <div class="mb-3">
                <label for="category_id" class="form-label">Category</label>
                <select name="category_id" id="category_id" class="form-select">
                    <option value="">Select a Category</option>
                    @foreach($categories as $category)
                        <option value="{{ $category->id }}" {{ $formula->category_id == $category->id ? 'selected' : '' }}>
                            {{ $category->name }}
                        </option>
                    @endforeach
                </select>
            </div>

            <!-- Price -->
            <div class="mb-3">
                <label for="price" class="form-label">Price</label>
                <input type="text" name="price" id="price" class="form-control" placeholder="Enter price" value="{{ $formula->price }}">
            </div>

            <!-- Description -->
            <div class="mb-3">
                <label for="description" class="form-label">Description</label>
                <textarea name="description" id="description" class="form-control" rows="4" placeholder="Enter description">{{ $formula->description }}</textarea>
            </div>

            <!-- Discount -->
            <div class="mb-3">
                <label for="discount" class="form-label">Discount</label>
                <input type="text" name="discount" id="discount" class="form-control" placeholder="Enter discount" value="{{ $formula->discount }}">
            </div>

            <!-- PDF Upload -->
            <div class="mb-3">
                <label for="pdf" class="form-label">Upload PDF</label>
                <input type="file" name="pdf" id="pdf" class="form-control">
                @if($formula->pdf)
                    <p class="mt-2">
                        <a href="{{ route('admin.formulas.viewPdf', ['id' => $formula->id]) }}" target="_blank" class="text-info">View Current PDF</a>
                    </p>
                @endif
            </div>

            <!-- Image Upload with Preview -->
            <div class="mb-3">
                <label for="image" class="form-label">Upload Image</label>
                <input type="file" name="image" id="image" class="form-control" accept="image/*" onchange="previewImage(event)">
                <div class="mt-3">
                    @if($formula->image)
                        <img id="image-preview" src="{{ asset('storage/' . $formula->image) }}" alt="Current Image" class="img-fluid" style="max-height: 200px;">
                    @else
                        <img id="image-preview" src="#" alt="Image Preview" class="img-fluid d-none" style="max-height: 200px;">
                    @endif
                </div>
            </div>

            <!-- Submit Button -->
            <div class="text-center">
                <button type="submit" class="btn btn-primary">Update Formula</button>
            </div>
        </form>
    </div>

    <!-- Image Preview Script -->
    <script>
        function previewImage(event) {
            const imagePreview = document.getElementById('image-preview');
            const file = event.target.files[0];
            if (file) {
                const reader = new FileReader();
                reader.onload = function(e) {
                    imagePreview.src = e.target.result;
                    imagePreview.classList.remove('d-none');
                };
                reader.readAsDataURL(file);
            }
        }
    </script>
@endsection
