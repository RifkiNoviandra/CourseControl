@extends('auth.layouts.main')
@section('title', 'Login | Mind Mingle')
@section('content')
                <!-- Title -->
                <h1 class="fs-2">👋 Welcome back</h1>
                <p class="lead mb-4">Please login to learn many things with us.</p>
                @if(session()->has('message'))
                    <div class="alert alert-success" role="alert">
                        {{ session('message') }}
                    </div>
            @endif

            @error('email')
            <!-- Alert -->
                <div class="alert alert-danger" role="alert">
                    {{ $message }}
                </div>
            @enderror

            <!-- Form START -->
                <form method="POST" action="{{ route('login') }}">
                @csrf
                <!-- Email -->
                    <div class="mb-4">
                        <label for="email" class="form-label">Email address </label>
                        <div class="input-group input-group-lg">
                                        <span class="input-group-text bg-light rounded-start border-0 text-secondary px-3"><i
                                                    class="bi bi-envelope-fill"></i></span>
                            <input type="email" name="email"
                                   class="form-control border-0 bg-light rounded-end ps-1 @error('email') is-invalid @enderror"
                                   placeholder="E-mail" id="email" autofocus autocomplete="email" required>
                        </div>
                    </div>

                    <!-- Password -->
                    <div class="mb-4">
                        <label for="current-password" class="form-label">Password </label>
                        <div class="input-group input-group-lg">
                                        <span class="input-group-text bg-light rounded-start border-0 text-secondary px-3"><i
                                                    class="fas fa-lock"></i></span>
                            <input type="password" name="password"
                                   class="form-control border-0 bg-light ps-1 @error('email') is-invalid @enderror"
                                   placeholder="password" id="current-password"
                                   autocomplete="current-password"
                                   required>
                            <span class="input-group-text bg-light rounded-end border-0 text-secondary px-3"><i
                                        class="fas fa-eye-slash" id="togglePassword"></i></span>
                        </div>
                    </div>

                    <!-- Remember -->
                    <div class="mb-4 d-flex justify-content-between">
                        <div class="form-check">
                            <input type="checkbox" name="remember" class="form-check-input" id="remember">
                            <label class="form-check-label" for="remember">Remember me</label>
                        </div>
                        @if(Route::has('password.request'))
                            <a href="{{ route('password.request') }}"><u>Forgot password?</u></a>
                        @endif
                    </div>
                    <!-- Button -->
                    <div class="align-items-center mt-0">
                        <div class="d-grid">
                            <button class="btn btn-warning mb-0 text-white" type="submit">Login</button>
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
                            Or</p>
                    </div>
                    <!-- Social btn -->
                    <div class="d-grid">
                        <a href="{{ route('auth.google') }}" class="btn bg-google bg-warning mb-2 mb-xxl-0"><i
                                    class="fab fa-fw fa-google text-white me-2"></i>Login with
                            <b>Google</b></a>
                    </div>
                </div>
                <!-- Sign up link -->
                <div class="mt-4 text-center">
                    <span>Don't have an account? <a href="{{ route('register') }}">Register</a></span>
                </div>
@endsection
@push('custom-script')
    <script src="{{ asset('assets/js/page/login.js') }}"></script>
@endpush
