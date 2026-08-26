@extends('layouts.app')

@section('content')
    <div style="background-color: #f0e8f4">
        <div class="container py-5">
            <div class="row justify-content-center">
                <div class="col-md-8">
                    <div class="card shadow py-8" style="border: none">
                        <h1 class="text-center mt-5 fw-bold">{{ __('Register') }}</h1>
                        <div class="card-body">
                            <form method="POST" action="{{ route('register') }}">
                                @csrf
                                <div class="row mb-4">
                                    <label for="name"
                                        class="col-md-4 col-form-label text-md-end">{{ __('Name') }}</label>
                                    <div class="col-md-6">
                                        <input id="name" type="text"
                                            class="form-control @error('name') is-invalid @enderror" name="name"
                                            value="{{ old('name') }}" required autocomplete="name" autofocus
                                            placeholder="Enter your name">

                                        @error('name')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                </div>

                                <div class="row mb-4">
                                    <label for="email"
                                        class="col-md-4 col-form-label text-md-end">{{ __('Email Address') }}</label>

                                    <div class="col-md-6">
                                        <input id="email" type="email"
                                            class="form-control @error('email') is-invalid @enderror" name="email"
                                            value="{{ old('email') }}" required autocomplete="email"
                                            placeholder="Enter you email">

                                        @error('email')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                </div>

                                <div class="row mb-4">
                                    <label for="password"
                                        class="col-md-4 col-form-label text-md-end">{{ __('Password') }}</label>

                                    <div class="col-md-6 position-relative">
                                        <input id="password" type="password"
                                            class="form-control @error('password') is-invalid @enderror" name="password"
                                            required autocomplete="new-password" placeholder="Enter your password">
                                        <span class="position-absolute top-50 end-0 translate-middle-y me-4" role="button"
                                            id="togglePassword">
                                            <i class="bi bi-eye-slash" id="toggleIcon"></i>
                                        </span>
                                        @error('password')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                </div>

                                <div class="row mb-4">
                                    <label for="password-confirm"
                                        class="col-md-4 col-form-label text-md-end">{{ __('Confirm Password') }}</label>

                                    <div class="col-md-6">
                                        <input id="password-confirm" type="password" class="form-control"
                                            name="password_confirmation" required autocomplete="new-password"
                                            placeholder="write the same password">
                                    </div>
                                </div>

                                <div class="my-4 text-center">
                                    <button type="submit" class="btn py-3 w-75"
                                        style="background-color:#5f3475; color:white ">
                                        {{ __('Register') }}
                                    </button>
                                    <p class="mt-4">Already have an account? <a href="{{ route('login') }}"
                                            class="fw-semibold" style="color: #5f3475">Login</a></p>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script>
        document.getElementById('togglePassword').addEventListener('click', function() {
            const input = document.getElementById('password');
            const icon = document.getElementById('toggleIcon');
            const isHidden = input.type === 'password';

            input.type = isHidden ? 'text' : 'password';
            icon.classList.toggle('bi-eye-slash', !isHidden);
            icon.classList.toggle('bi-eye', isHidden);
        })
    </script>
@endsection
