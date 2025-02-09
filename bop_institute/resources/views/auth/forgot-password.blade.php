<x-guest-layout>
    <div class="container d-flex flex-column align-items-center justify-content-center" style="min-height: 50vh;">
        <div class="row justify-content-center w-100">
            <div class="col-md-6">
                <div class="card shadow-lg border-0 rounded-4">
                    <div class="card-body p-4">
                        <h3 class="mb-3 text-center text-primary fw-bold">Reset Your Password</h3>
                        <p class="text-muted text-center">
                            {{ __('Forgot your password? No problem! Enter your email address below, and we\'ll send you a link to reset your password.') }}
                        </p>

                        <!-- Session Status -->
                        @if (session('status'))
                            <div class="alert alert-success text-center rounded-pill">
                                {{ session('status') }}
                            </div>
                        @endif

                        <form method="POST" action="{{ route('password.email') }}">
                            @csrf

                            <!-- Email Address -->
                            <div class="mb-3">
                                <label for="email" class="form-label fw-semibold">{{ __('Email Address') }}</label>
                                <input id="email" type="email" name="email" class="form-control" value="{{ old('email') }}" required autofocus>
                                @error('email')
                                <div class="text-danger mt-1">{{ $message }}</div>
                                @enderror
                            </div>

                            <!-- Submit Button -->
                            <div class="d-grid gap-2 mt-4">
                                <button type="submit" class="btn btn-primary fw-bold">
                                    <i class="fas fa-paper-plane"></i> {{ __('Send Password Reset Link') }}
                                </button>
                            </div>
                        </form>

                        <!-- Back to Login -->
                        <div class="text-center mt-3">
                            <a href="{{ route('login') }}" class="text-decoration-none text-secondary">
                                <i class="fas fa-arrow-left"></i> {{ __('Back to Login') }}
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-guest-layout>
