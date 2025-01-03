@extends('auth.layouts.main')
@section('title', 'Email | Mind Mingle')
@section('content')

    <!-- Title -->
    <h1 class="fs-2">📧 Email</h1>
    <p class="lead mb-4">Please enter your email.</p>

    @if (session()->has('message'))
        <div class="alert alert-success" role="alert">
            {{ session('message') }}
        </div>
    @endif

    <!-- Form START -->
    <form method="POST" action="{{ route('password.email') }}">
        @csrf
        <!-- Email -->
        <div class="mb-4">
            <label for="email" class="form-label">{{ __('Email Address') }}</label>
            <div class="input-group input-group-lg">
                <span class="input-group-text bg-light rounded-start border-0 text-secondary px-3"><i
                        class="bi bi-envelope-fill"></i></span>
                <input type="email" name="email"
                    class="form-control border-0 bg-light rounded-end ps-1 @error('email') is-invalid @enderror"
                    placeholder="E-mail" id="email" value="{{ old('email') }}" autofocus autocomplete="email"
                    required>

                @error('email')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </div>
        </div>

        <!-- Button -->
        <div class="align-items-center mt-0">
            <div class="d-grid">
                <button class="btn btn-primary" type="submit">
                    {{ __('Send Password Reset Link') }}
                </button>
            </div>
        </div>
    </form>
    <!-- Form END -->



    {{-- <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">{{ __('Reset Password') }}</div>

                    <div class="card-body">
                        @if (session('status'))
                            <div class="alert alert-success" role="alert">
                                {{ session('status') }}
                            </div>
                        @endif

                        <form method="POST" action="{{ route('password.email') }}">
                            @csrf

                            <div class="mb-4">
                                <label for="email" class="form-label">{{ __('Email Address') }}</label>
                                <div class="input-group input-group-lg">
                                    <span class="input-group-text bg-light rounded-start border-0 text-secondary px-3"><i
                                            class="bi bi-envelope-fill"></i></span>
                                    <input type="email" name="email"
                                        class="form-control border-0 bg-light rounded-end ps-1 @error('email') is-invalid @enderror"
                                        placeholder="E-mail" id="email" value="{{ old('email') }}" autofocus
                                        autocomplete="email" required>

                                    @error('email')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>


                            <div class="row mb-0">
                                <div class="col-md-6 offset-md-4">
                                    <button type="submit" class="btn btn-primary">
                                        {{ __('Send Password Reset Link') }}
                                    </button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div> --}}
@endsection
{{-- <div class="row mb-3">
    <label for="email" class="col-md-4 col-form-label text-md-end">{{ __('Email Address') }}</label>

    <div class="col-md-6">
        <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>

        @error('email')
            <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
            </span>
        @enderror
    </div>
</div> --}}
