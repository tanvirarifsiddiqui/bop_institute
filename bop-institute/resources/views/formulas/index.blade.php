@extends('layouts.app')

@section('content')
<h1>Formulas</h1>
@foreach ($formulas as $formula)
    <div>
        <h2>{{ $formula->title }}</h2>
        <p>Price: {{ $formula->price }}</p>
        <p>Discount: {{ $formula->discount }}%</p>
        <a href="{{ route('formulas.show', $formula->id) }}">View Details</a>
    </div>
@endforeach
@endsection
