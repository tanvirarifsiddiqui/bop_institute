@extends('layouts.admin_app')

@section('title', 'Formulas')

@section('content')
    <div class="container mt-5">
        <h1>Formula E-Book</h1>
        <a href="{{ route('formulas.create') }}" class="btn btn-primary mb-3">Add Formula E-Book</a>
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
                <th>Edit</th>
                <th>Delete</th>
            </tr>
            </thead>
            <tbody>
            @foreach ($formulas as $formula)
                <tr>
                    <td>{{ $formula->id }}</td>
                    <td>{{ $formula->title }}</td>
                    <td>{{ $formula->description }}</td>
                    <td>{{ $formula->image }}</td>
                    <td>{{ $formula->price }}</td>
                    <td>{{ $formula->discount }}</td>
                    <td>{{ $formula->pdf }}</td>
                    <td>{{ $formula->purchase }}</td>
                    <td>{{ $formula->category_id }}</td>
                    <td>
                        <a href="{{ route('formulas.edit', ['formula'=>$formula]) }}" class="btn btn-sm btn-primary">Edit</a>
                    </td>
                    <td>
                        <form method="POST" action="{{ route('formulas.destroy', ['formula'=>$formula]) }}">
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
