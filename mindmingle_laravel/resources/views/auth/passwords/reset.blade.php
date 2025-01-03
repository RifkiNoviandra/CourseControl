@extends('auth.layouts.main')
@section('title', 'Reset | Mind Mingle')
@section('content')

    <!-- Title -->
    <h1 class="fs-2">🔐 Reset password</h1>
    <p class="lead mb-4">Please enter tour new password.</p>

    @if (session()->has('message'))
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
    <form method="POST" action="{{ route('password.update') }}">
        @csrf

        <input type="hidden" name="token" value="{{ $token }}">
        @csrf
        <!-- Email -->
        <div class="mb-4">
            <label for="email" class="form-label">{{ __('Email Address') }}</label>
            <div class="input-group input-group-lg">
                <span class="input-group-text bg-light rounded-start border-0 text-secondary px-3"><i
                        class="bi bi-envelope-fill"></i></span>
                <input type="email" name="email"
                    class="form-control border-0 bg-light rounded-end ps-1 @error('email') is-invalid @enderror"
                    placeholder="E-mail" id="email" value="{{ $email ?? old('email') }}" autofocus
                    autocomplete="email" required>
                @error('email')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </div>
        </div>

        <!-- Password -->
        <div class="mb-4">
            <label for="current-password" class="form-label">{{ __('Password') }}</label>
            <div class="input-group input-group-lg">
                <span class="input-group-text bg-light rounded-start border-0 text-secondary px-3"><i
                        class="fas fa-lock"></i></span>
                <input type="password" name="password"
                    class="form-control border-0 bg-light ps-1 @error('email') is-invalid @enderror" placeholder="password"
                    id="password" autocomplete="new-password" required>
                <span class="input-group-text bg-light rounded-end border-0 text-secondary px-3"><i class="fas fa-eye-slash"
                        id="togglePassword"></i></span>
                @error('password')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </div>
        </div>

        <!-- Confirmation Password -->
        <div class="mb-4">
            <label for="password_confirm" class="form-label">{{ __('Password Confirmation') }}</label>
            <div class="input-group input-group-lg">
                <span class="input-group-text bg-light rounded-start border-0 text-secondary px-3"><i
                        class="fas fa-lock"></i></span>
                <input type="password" name="password_confirmation"
                    class="form-control border-0 bg-light rounded-end ps-1 @error('password') is-invalid @enderror"
                    placeholder="Password confirmation" id="password-confirm" autocomplete="new-password" required>
            </div>
        </div>

        <!-- Button -->
        <div class="align-items-center mt-0">
            <div class="d-grid">
                <button class="btn btn-primary mb-0" type="submit">{{ __('Reset Password') }}</button>
            </div>
        </div>
    </form>
    <!-- Form END -->





    {{-- <div class="row mb-3">
            <label for="email" class="col-md-4 col-form-label text-md-end">{{ __('Email Address') }}</label>

            <div class="col-md-6">
                <input id="email" type="email" class="form-control @error('email') is-invalid @enderror"
                    name="email" value="{{ $email ?? old('email') }}" required autocomplete="email" autofocus>

                @error('email')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </div>
        </div>

        <div class="row mb-3">
            <label for="password" class="col-md-4 col-form-label text-md-end">{{ __('Password') }}</label>

            <div class="col-md-6">
                <input id="password" type="password" class="form-control @error('password') is-invalid @enderror"
                    name="password" required autocomplete="new-password">

                @error('password')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </div>
        </div>

        <div class="row mb-3">
            <label for="password-confirm"
                class="col-md-4 col-form-label text-md-end">{{ __('Confirm Password') }}</label>

            <div class="col-md-6">
                <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required
                    autocomplete="new-password">
            </div>
        </div>

        <div class="row mb-0">
            <div class="col-md-6 offset-md-4">
                <button type="submit" class="btn btn-primary">
                    {{ __('Reset Password') }}
                </button>
            </div>
        </div>
    </form> --}}
@endsection
