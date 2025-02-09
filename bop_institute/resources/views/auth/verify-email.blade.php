<x-guest-layout>
    <div class="container d-flex flex-column align-items-center justify-content-center" style="min-height: 100vh;">
        <div class="row justify-content-center w-100">
            <div class="col-md-8 col-lg-6">
                <div class="card shadow-lg border-0 rounded-4">
                    <div class="card-body p-4 text-center">
                        <h3 class="mb-3 text-primary fw-bold">Email Verification</h3>
                        <p class="text-muted">
                            {{ __('Thanks for signing up! Please verify your email by clicking on the link we just sent. If you didn\'t receive the email, click below to resend.') }}
                        </p>

                        @if (session('status') == 'verification-link-sent')
                            <div class="alert alert-success rounded-pill" role="alert">
                                {{ __('A new verification link has been sent to your email address.') }}
                            </div>
                        @endif

                        <div class="mt-4">
                            <form method="POST" action="{{ route('verification.send') }}">
                                @csrf
                                <button type="submit" class="btn btn-primary w-100 fw-bold">
                                    <i class="fas fa-envelope"></i> {{ __('Resend Verification Email') }}
                                </button>
                            </form>
                        </div>

                        <div class="mt-3">
                            <form method="POST" action="{{ route('logout') }}">
                                @csrf
                                <button type="submit" class="btn btn-outline-danger w-100 fw-bold">
                                    <i class="fas fa-sign-out-alt"></i> {{ __('Log Out') }}
                                </button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-guest-layout>
