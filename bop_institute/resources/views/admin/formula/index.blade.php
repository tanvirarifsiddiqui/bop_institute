@extends('layouts.admin_app')

@section('title', 'Formulas')

@section('content')
    <div class="container mt-5">
        <h1>Formula E-Book</h1>
        <a href="{{ route('admin.formulas.create') }}" class="btn btn-primary mb-3">Add Formula E-Book</a>
        @if (session()->has('success'))
            <div class="alert alert-success">{{ session('success') }}</div>
        @endif
        <table class="table table-bordered">
            <thead>
            <tr>
                <th>ID</th>
                <th>Name</th>
                <th>Description</th>
                <th>Image</th>
                <th>Price</th>
                <th>Discount</th>
                <th>PDF</th>
                <th>Purchase</th>
                <th>Category ID</th>
                <th>Edit</th>       <!-- Separate columns -->
                <th>Delete</th>     <!-- for each action -->
                <th>Landing Page</th>
            </tr>
            </thead>
            <tbody>
            @foreach ($formulas as $formula)
                <tr>
                    <td>{{ $formula->id }}</td>
                    <td>{{ $formula->title }}</td>
                    <td>{{ $formula->description }}</td>
                    <td>
                        @if($formula->image)
                            <a href="{{ asset('storage/' . $formula->image) }}" target="_blank">Image</a>
                        @else
                            No Image
                        @endif
                    </td>
                    <td>{{ $formula->price }}</td>
                    <td>{{ $formula->discount }}</td>
                    <td>
                        @if($formula->pdf)
                            <a href="{{ route('admin.formulas.viewPdf', ['id' => $formula->id]) }}" target="_blank">PDF</a>
                        @else
                            No PDF
                        @endif
                    </td>
                    <td>{{ $formula->purchase }}</td>
                    <td>{{ $formula->category_id }}</td>
                    <td>
                        <!-- Edit Button -->
                        <a href="{{ route('admin.formulas.edit', ['formula'=>$formula]) }}" class="btn btn-sm btn-primary">Edit</a>
                    </td>
                    <td>
                        <!-- Delete Button -->
                        <form method="POST" action="{{ route('admin.formulas.destroy', ['formula'=>$formula]) }}" onsubmit="return confirm('Are you sure you want to delete this formula?');">
                            @csrf
                            @method('delete')
                            <button type="submit" class="btn btn-sm btn-danger">Delete</button>
                        </form>
                    </td>
                    <td>
                        <!-- Landing Page Button -->
                        <a href="{{ route('formula.landing', $formula->id) }}" class="btn btn-sm btn-info" target="_blank">Landing Page</a>
                    </td>
                </tr>
            @endforeach
            </tbody>
        </table>
    </div>
@endsection
