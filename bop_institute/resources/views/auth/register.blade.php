<x-guest-layout>
    <div class="container py-5">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card shadow-lg border-0 rounded-4">
                    <div class="card-body p-4">
                        <h3 class="text-center text-primary fw-bold">{{ __('Create an Account') }}</h3>
                        <hr>
                        <p class="text-muted text-center">
                            {{ __('Join us today! Fill in the details below to create your account.') }}
                        </p>

                        <!-- Check for Session Status -->
                        @if (session('status'))
                            <div class="alert alert-success text-center rounded-pill">
                                {{ session('status') }}
                            </div>
                        @endif

                        <form method="POST" action="{{ route('register') }}">
                            @csrf

                            <div class="row">
                                <!-- Name -->
                                <div class="col-12 mb-3">
                                    <label for="name" class="form-label fw-semibold">{{ __('Full Name') }}</label>
                                    <input type="text" id="name" name="name" class="form-control" value="{{ old('name') }}" required autofocus>
                                    @error('name')
                                    <div class="text-danger mt-1">{{ $message }}</div>
                                    @enderror
                                </div>

                                <!-- Mobile Number -->
                                <div class="col-md-6 mb-3">
                                    <label for="mobile_no" class="form-label fw-semibold">{{ __('Mobile Number') }}</label>
                                    <input type="text" id="mobile_no" name="mobile_no" class="form-control" value="{{ old('mobile_no') }}" required>
                                    @error('mobile_no')
                                    <div class="text-danger mt-1">{{ $message }}</div>
                                    @enderror
                                </div>

                                <!-- Birth Date -->
                                <div class="col-md-6 mb-3">
                                    <label for="birth_date" class="form-label fw-semibold">{{ __('Birth Date') }}</label>
                                    <input type="date" id="birth_date" name="birth_date" class="form-control" value="{{ old('birth_date') }}" required>
                                    @error('birth_date')
                                    <div class="text-danger mt-1">{{ $message }}</div>
                                    @enderror
                                </div>

                                <!-- Institution -->
                                <div class="col-12 mb-3">
                                    <label for="institution" class="form-label fw-semibold">{{ __('Institution/Company') }}</label>
                                    <input type="text" id="institution" name="institution" class="form-control" value="{{ old('institution') }}" required>
                                    @error('institution')
                                    <div class="text-danger mt-1">{{ $message }}</div>
                                    @enderror
                                </div>

                                <!-- Address -->
                                <div class="col-12 mb-3">
                                    <label for="address" class="form-label fw-semibold">{{ __('Address') }}</label>
                                    <input type="text" id="address" name="address" class="form-control" value="{{ old('address') }}" required>
                                    @error('address')
                                    <div class="text-danger mt-1">{{ $message }}</div>
                                    @enderror
                                </div>

                                <!-- Gender -->
                                <div class="col-12 mb-3">
                                    <label for="gender" class="form-label fw-semibold">{{ __('Gender') }}</label>
                                    <select id="gender" name="gender" class="form-select" required>
                                        <option value="" disabled selected>{{ __('Select Gender') }}</option>
                                        <option value="male">{{ __('Male') }}</option>
                                        <option value="female">{{ __('Female') }}</option>
                                        <option value="other">{{ __('Other') }}</option>
                                    </select>
                                    @error('gender')
                                    <div class="text-danger mt-1">{{ $message }}</div>
                                    @enderror
                                </div>

                                <!-- Email -->
                                <div class="col-12 mb-3">
                                    <label for="email" class="form-label fw-semibold">{{ __('Email Address') }}</label>
                                    <input type="email" id="email" name="email" class="form-control" value="{{ old('email') }}" required>
                                    @error('email')
                                    <div class="text-danger mt-1">{{ $message }}</div>
                                    @enderror
                                </div>

                                <!-- Password -->
                                <div class="col-md-6 mb-3">
                                    <label for="password" class="form-label fw-semibold">{{ __('Password') }}</label>
                                    <input type="password" id="password" name="password" class="form-control" required>
                                    @error('password')
                                    <div class="text-danger mt-1">{{ $message }}</div>
                                    @enderror
                                </div>

                                <!-- Confirm Password -->
                                <div class="col-md-6 mb-3">
                                    <label for="password_confirmation" class="form-label fw-semibold">{{ __('Confirm Password') }}</label>
                                    <input type="password" id="password_confirmation" name="password_confirmation" class="form-control" required>
                                    @error('password_confirmation')
                                    <div class="text-danger mt-1">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>

                            <!-- Register Button -->
                            <div class="d-grid gap-2 mt-4">
                                <button type="submit" class="btn btn-primary fw-bold">
                                    <i class="fas fa-user-plus"></i> {{ __('Register') }}
                                </button>
                            </div>

                            <!-- Already Registered -->
                            <div class="text-center mt-3">
                                <a href="{{ route('login') }}" class="text-decoration-none text-secondary">
                                    <i class="fas fa-arrow-left"></i> {{ __('Already registered? Login') }}
                                </a>
                            </div>
                        </form>

                    </div> <!-- End Card Body -->
                </div> <!-- End Card -->
            </div> <!-- End Col -->
        </div> <!-- End Row -->
    </div> <!-- End Container -->
</x-guest-layout>
