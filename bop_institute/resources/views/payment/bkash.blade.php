@extends('layouts.app')

@section('content')
    <div class="container py-5">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card shadow-sm border-0">
                    <div class="card-header bg-primary text-white fw-bold">
                        bKash Payment
                    </div>
                    <div class="card-body">
                        <h5 class="text-primary fw-bold mb-4">Complete Your Payment</h5>

                        <div class="d-flex align-items-center mb-4 flex-wrap">
                            <!-- Product Image and Details -->
                            <div class="d-flex align-items-center flex-grow-1">
                                <img src="{{ asset('storage/' . $formula->image) }}"
                                     alt="{{ $formula->title }}"
                                     class="img-fluid rounded shadow me-3"
                                     style="width: 120px; height: 160px; object-fit: cover;">
                                <div>
                                    <h5 class="fw-bold">{{ $formula->title }}</h5>
                                    @php
                                        $discountAmount = $formula->price * ($formula->discount / 100);
                                        $finalPrice = $formula->price - $discountAmount;
                                    @endphp
                                    <h4 class="text-primary fw-bold mb-0">৳{{ number_format($finalPrice, 2) }}</h4>
                                </div>
                            </div>

                            <!-- bKash Payment Button -->
                            <div class="mt-3 text-center" style="margin-right: 50px">
                                <form method="POST" action="{{ route('bkash-create-payment') }}">
                                    @csrf
                                    <input type="hidden" name="formula_id" value="{{ $formula->id }}">
                                    <input type="hidden" name="amount" value="{{ $finalPrice }}">
                                    <button type="submit" class="btn btn-light p-0 border-0">
                                        <img src="{{ asset('images/bkash.png') }}"
                                             alt="bKash Payment"
                                             class="img-fluid"
                                             style="width: 180px; max-width: 100%; height: auto; padding: 10px">
                                    </button>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
