<div class="card h-100 shadow-sm border-0 position-relative formula-card">
    <!-- Image Container with A4 Aspect Ratio -->
    <div class="position-relative">
        <div class="a4-image-container">
            <img src="{{ asset('uploads/' . $formula->image) }}"
                 alt="{{ $formula->title }}"
                 class="a4-image">
        </div>
        <!-- Discount Badge -->
        @if ($formula->discount > 0)
            <span class="position-absolute bottom-0 start-0 badge bg-danger text-white m-2">-{{ $formula->discount }}% Off</span>
        @endif
    </div>
    <!-- Card Content -->
    <div class="card-body d-flex flex-column justify-content-between">
        <!-- Formula Title -->
        <h6 class="card-title text-primary-emphasis fw-bold">{{ $formula->title }}</h6>
        <!-- Formula Description -->
{{--        <p class="card-text text-muted small text-justify">{{ Str::limit($formula->description, 50) }}</p>--}}
        <!-- Author Name -->
        <p class="card-text text-secondary small text-justify">Author: Harun or Rashid (Rasel Talukder)</p>
        <!-- Pricing Section -->
        @php
            $discountAmount = $formula->price * ($formula->discount / 100);
            $finalPrice = $formula->price - $discountAmount;
        @endphp
        <div>
            @if ($formula->discount > 0)
                <span class="text-muted text-decoration-line-through">৳{{ number_format($formula->price, 2) }}</span>
                <span class="text-success fw-bold ms-2">৳{{ number_format($finalPrice, 2) }}</span>
            @else
                <span class="text-primary fw-bold">৳{{ number_format($formula->price, 2) }}</span>
            @endif
        </div>
    </div>
    <!-- Card Footer -->
    <div class="card-footer bg-white text-center border-0">
        <a href="{{ route('formula.profile', $formula->id) }}" class="btn btn-outline-primary w-100">View Details</a>
    </div>
</div>
