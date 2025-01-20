@extends('layouts.app')
@section('content')
    <div class="container py-5">
        @foreach ($categories as $category)
            <div class="card mb-4 shadow-sm">
                <div class="card-header bg-primary text-white">
                    <h4 class="mb-0">{{ $category->name }}</h4>
                </div>
                <div class="card-body">
                    @if ($category->formulas->count())
                        <div class="row row-cols-1 row-cols-sm-2 row-cols-md-3 row-cols-lg-6 g-4">
                            @foreach ($category->formulas as $formula)
                                <div class="col">
                                    <x-formula-card :formula="$formula" />
                                </div>
                            @endforeach
                        </div>
                    @else
                        <p class="text-muted">No formulas available in this category.</p>
                    @endif
                </div>
            </div>
        @endforeach
    </div>
@endsection
