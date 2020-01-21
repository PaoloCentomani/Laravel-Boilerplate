@extends('layouts.auth')

@section('title', __('Register'))

@section('content-inner')
<form method="POST" action="{{ route('register') }}" v-submit>
    @csrf

    {{-- Card --}}
    <div class="card sm:max-w-sm mx-auto">
        <div class="card-header">
            {{ __('Register') }}
        </div>

        <div class="card-body">
            <div class="form-row">
                {{-- First Name --}}
                <div class="form-group required col md:w-1/2 md:pr-2">
                    <label for="first_name">{{ __('First Name') }}</label>

                    <input id="first_name" type="text" class="form-control @error('first_name') is-invalid @enderror" name="first_name" value="{{ old('first_name') }}" required autocomplete="given-name" autofocus v-focus>

                    @error('first_name')
                        <div class="invalid-feedback" role="alert">
                            {{ $message }}
                        </div>
                    @enderror
                </div>

                {{-- Last Name --}}
                <div class="form-group required col md:w-1/2">
                    <label for="last_name">{{ __('Last Name') }}</label>

                    <input id="last_name" type="text" class="form-control @error('last_name') is-invalid @enderror" name="last_name" value="{{ old('last_name') }}" required autocomplete="family-name">

                    @error('last_name')
                        <div class="invalid-feedback" role="alert">
                            {{ $message }}
                        </div>
                    @enderror
                </div>
            </div>

            {{-- E-Mail Address --}}
            <div class="form-group required">
                <label for="email">{{ __('E-Mail Address') }}</label>

                <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email">

                @error('email')
                    <div class="invalid-feedback" role="alert">
                        {{ $message }}
                    </div>
                @enderror
            </div>

            {{-- Password --}}
            <div class="form-group required">
                <label for="password">{{ __('Password') }}</label>

                <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="new-password">

                @error('password')
                    <div class="invalid-feedback" role="alert">
                        {{ $message }}
                    </div>
                @else
                    <span class="form-text">
                        {{ __('Password must be at least 10 characters long and contain one lowercase letter, one uppercase letter and one digit.') }}
                    </span>
                @enderror
            </div>

            {{-- Confirm password --}}
            <div class="form-group required">
                <label for="password-confirm">{{ __('Confirm Password') }}</label>

                <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required autocomplete="new-password">
            </div>
        </div>

        <div class="card-footer">
            {{-- Buttons --}}
            <div class="form-buttons">
                <button type="submit" class="btn btn-primary btn-block">
                    {{ __('Register') }}
                </button>
            </div>
        </div>
    </div>
</form>

{{-- Links --}}
<p class="mt-8 mb-2 text-sm text-center">
    <a href="{{ route('login') }}" class="text-sm text-gray-500 focus:text-gray-600">
        {{ __('Already have an account?') }}
    </a>
</p>
@endsection
