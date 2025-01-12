@extends('layouts.app')

@section('content')
<h1>Categories</h1>
<ul>
    @foreach ($categories as $category)
        <li><a href="{{ route('formulas.index', ['category' => $category->id]) }}">{{ $category->name }}</a></li>
    @endforeach
</ul>
@endsection
