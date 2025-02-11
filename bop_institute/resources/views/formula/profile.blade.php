@extends('layouts.app')
@section('content')
    <div class="container py-5">
        <div class="row">
            <div class="col-md-4">
                <img src="{{ asset('uploads/' . $formula->image) }}" alt="{{ $formula->title }}"
                     class="img-fluid rounded shadow" style="aspect-ratio: 8.5 / 11; object-fit: cover;">
            </div>
            <div class="col-md-8">
                <h1 class="text-primary fw-bold">{{ $formula->title }}</h1>
                <p class="text-muted">{{ $formula->description }}</p>
                <hr>
                <div class="mb-4">
                    @php
                        $discountAmount = $formula->price * ($formula->discount / 100);
                        $finalPrice = $formula->price - $discountAmount;
                    @endphp
                    @if ($formula->discount > 0)
                        <h4>
                            <span class="text-muted text-decoration-line-through">৳{{ number_format($formula->price, 2) }}</span>
                            <span class="text-success fw-bold ms-2">৳{{ number_format($finalPrice, 2) }}</span>
                        </h4>
                    @else
                        <h4 class="text-primary fw-bold">৳{{ number_format($formula->price, 2) }}</h4>
                    @endif
                </div>
{{--                <a href="{{ route('formula.purchase', $formula->id) }}"--}}
                <a href="{{ route('coming-soon', $formula->id) }}"
                   class="btn btn-primary btn-lg">
                    Purchase
                </a>

            </div>
        </div>
    </div>
@endsection
