@extends('layouts.app')

@section('content')
    <div class="container py-5">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card shadow-sm border-0">
                    <div class="card-header bg-primary text-white fw-bold">
                        Purchase Confirmation
                    </div>
                    <div class="card-body">
                        <h5 class="text-primary fw-bold mb-4">Confirm Purchase</h5>

                        <div class="d-flex align-items-center mb-4">
                            <img src="{{ asset('storage/' . $formula->image) }}"
                                 alt="{{ $formula->title }}"
                                 class="img-fluid rounded shadow me-3"
                                 style="width: 120px; height: 160px; object-fit: cover;">
                            <div>
                                <h5 class="fw-bold">{{ $formula->title }}</h5>
                                <p class="text-muted">{{ $formula->description }}</p>
                                @php
                                    $discountAmount = $formula->price * ($formula->discount / 100);
                                    $finalPrice = $formula->price - $discountAmount;
                                @endphp
                                @if ($formula->discount > 0)
                                    <h4>
                                    <span class="text-muted text-decoration-line-through">
                                        ${{ number_format($formula->price, 2) }}
                                    </span>
                                        <span class="text-success fw-bold ms-2">
                                        ${{ number_format($finalPrice, 2) }}
                                    </span>
                                    </h4>
                                @else
                                    <h4 class="text-primary fw-bold">${{ number_format($formula->price, 2) }}</h4>
                                @endif
                            </div>
                        </div>

                        <form method="POST" action="{{ route('formula.processPurchase', $formula->id) }}">
                            @csrf
                            <p class="text-muted">
                                By confirming, you agree to purchase this formula book. Once purchased, it will be available in your account.
                            </p>
                            <button type="submit" class="btn btn-success btn-lg">Confirm Purchase</button>
                            <a href="{{ route('formula.profile', $formula->id) }}" class="btn btn-secondary btn-lg">Cancel</a>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
