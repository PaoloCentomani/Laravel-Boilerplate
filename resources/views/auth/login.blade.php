@extends('layouts.app')

@section('title', __('Login'))

@section('content')
<div class="container mx-auto">
    {{-- Card --}}
    <div class="card sm:max-w-sm mx-auto mt-8">
        <div class="card-header">{{ __('Login') }}</div>

        <div class="card-body">
            <form method="POST" action="{{ route('login') }}">
                @csrf

                <div class="form-group">
                    <label for="email">{{ __('E-Mail Address') }}</label>

                    <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email"{{ old('email') ? '' : ' autofocus v-focus' }}>

                    @error('email')
                        <div class="invalid-feedback" role="alert">
                            {{ $message }}
                        </div>
                    @enderror
                </div>

                <div class="form-group">
                    <label for="password">{{ __('Password') }}</label>

                    <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="current-password"{{ old('email') ? ' autofocus v-focus' : '' }}>

                    @error('password')
                        <div class="invalid-feedback" role="alert">
                            {{ $message }}
                        </div>
                    @enderror
                </div>

                <div class="form-group">
                    <div class="custom-control custom-checkbox">
                        <input type="checkbox" class="custom-control-input" id="remember-me" name="remember"{{ old('remember') ? ' checked' : '' }}>
                        <label class="custom-control-label" for="remember-me">{{ __('Remember Me') }}</label>
                    </div>
                </div>

                <div class="form-group mt-4 mb-1">
                    <button type="submit" class="btn btn-primary">
                        {{ __('Login') }}
                    </button>
                </div>
            </form>
        </div>
    </div>

    {{-- Links --}}
    <p class="mt-6 text-sm text-center">
        <a href="{{ route('register') }}" class="mr-5 text-gray-500 hover:text-gray-600">
            {{ __('Register') }}
        </a>

        <a href="{{ route('password.request') }}" class="text-sm text-gray-500 hover:text-gray-600">
            {{ __('Forgot Password?') }}
        </a>
    </p>
</div>
@endsection
