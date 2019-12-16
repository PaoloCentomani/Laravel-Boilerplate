@extends('layouts.auth')

@section('title', __('Login'))

@section('content-inner')
<form method="POST" action="{{ route('login') }}" v-disable-submit>
    @csrf

    {{-- Card --}}
    <div class="card mx-auto sm:max-w-sm">
        <div class="card-header">
            {{ __('Login') }}
        </div>

        <div class="card-body">
            {{-- E-Mail Address --}}
            <div class="form-group">
                <label for="email">{{ __('E-Mail Address') }}</label>

                <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email"{{ old('email') ? '' : ' autofocus v-focus' }}>

                @error('email')
                    <div class="invalid-feedback" role="alert">
                        {{ $message }}
                    </div>
                @enderror
            </div>

            {{-- Password --}}
            <div class="form-group">
                <label for="password">{{ __('Password') }}</label>

                <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="current-password"{{ old('email') ? ' autofocus v-focus' : '' }}>

                @error('password')
                    <div class="invalid-feedback" role="alert">
                        {{ $message }}
                    </div>
                @enderror
            </div>

            {{-- Remember Me --}}
            <div class="form-group">
                <div class="custom-control custom-checkbox">
                    <input type="checkbox" class="custom-control-input" id="remember-me" name="remember"{{ old('remember') ? ' checked' : '' }}>
                    <label class="custom-control-label" for="remember-me">{{ __('Remember Me') }}</label>
                </div>
            </div>
        </div>

        <div class="card-footer">
            <div class="form-buttons">
                <button type="submit" class="btn btn-primary btn-block">
                    {{ __('Login') }}
                </button>
            </div>
        </div>
    </div>
</form>

{{-- Links --}}
<p class="mt-8 mb-2 text-sm text-center">
    @if (Route::has('register'))
    <a href="{{ route('register') }}" class="mr-5 text-gray-500 focus:text-gray-600">
        {{ __('Register') }}
    </a>
    @endif

    @if (Route::has('password.request'))
    <a href="{{ route('password.request') }}" class="text-sm text-gray-500 focus:text-gray-600">
        {{ __('Forgot Password?') }}
    </a>
    @endif
</p>
@endsection
