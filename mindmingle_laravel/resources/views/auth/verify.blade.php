@extends('auth.layouts.main')
@section('title', 'Verify Email | Mind Mingle')
@section('content')

                <!-- Title -->
                <h1 class="fs-2">✉️ Verify first your email address.</h1>
                <p class="lead mb-4">If you cannot find <b>email
                        verification</b> mail in the index folder, please check the Junk/Spam folder.</p>
                <p class="lead mb-4">If you did not receive the <b>email verification</b> mail please click
                    on the resend button.</p>

                <!-- Alert -->
                @if (session('resent'))
                    <div class="alert alert-success" role="alert">
                        A fresh verification link has been sent to your email address.
                    </div>
            @endif

            <!-- Form START -->
                <form method="POST" action="{{ route('verification.resend') }}">
                @csrf
                <!-- Button -->
                    <div class="align-items-center mt-0">
                        <div class="d-grid">
                            <button class="btn bg-warning mb-0 disabled" type="submit" id="verify">Resend
                                verification
                                email
                            </button>
                        </div>
                    </div>
                </form>
                <!-- Form END -->

                <!-- Social buttons and divider -->
                <div class="row">
                    <!-- Divider with text -->
                    <div class="position-relative my-3">
                        <hr>
                        <p class="small position-absolute top-50 start-50 translate-middle bg-body px-5">
                            Resend verification: <span class="fw-bold" id="timer">30</span></p>
                    </div>
                </div>

@endsection
@push('custom-script')
    <script src="{{ asset('assets/js/page/verify.js') }}"></script>
@endpush
