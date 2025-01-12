@extends('layouts.app')

@section('content')
<h1>Receipt</h1>
<p>Formula: {{ $receipt->formula->title }}</p>
<p>User: {{ $receipt->user->name }}</p>
<a href="{{ asset('storage/' . $receipt->receipt_pdf) }}" download>Download Receipt</a>
<a href="{{ asset('storage/' . $receipt->formula->pdf) }}" download>Download Formula</a>
@endsection
