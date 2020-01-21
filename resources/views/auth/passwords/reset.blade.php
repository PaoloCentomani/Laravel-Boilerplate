@extends('layouts.auth')

@section('title', __('Reset Password'))

@section('content-inner')
<form method="POST" action="{{ route('password.update') }}" v-submit>
    @csrf
    <input type="hidden" name="token" value="{{ $token }}">

    {{-- Card --}}
    <div class="card sm:max-w-sm mx-auto">
        <div class="card-header">
            {{ __('Reset Password') }}
        </div>

        <div class="card-body">
            {{-- E-Mail Address --}}
            <div class="form-group">
                <label for="email">{{ __('E-Mail Address') }}</label>

                <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ $email ?? old('email') }}" readonly required>

                @error('email')
                    <div class="invalid-feedback" role="alert">
                        {{ $message }}
                    </div>
                @enderror
            </div>

            {{-- Password --}}
            <div class="form-group required">
                <label for="password">{{ __('Password') }}</label>

                <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="new-password"{{ ($email ?? old('email')) ? ' autofocus v-focus' : '' }}>

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

            {{-- Confirm Password --}}
            <div class="form-group required">
                <label for="password-confirm">{{ __('Confirm Password') }}</label>

                <input id="password-confirm" type="password" class="form-control @error('password_confirmation') is-invalid @enderror" name="password_confirmation" required autocomplete="new-password">

                @error('password_confirmation')
                    <div class="invalid-feedback" role="alert">
                        {{ $message }}
                    </div>
                @enderror
            </div>
        </div>

        <div class="card-footer">
            {{-- Buttons --}}
            <div class="form-buttons">
                <button type="submit" class="btn btn-primary btn-block">
                    {{ __('Reset Password') }}
                </button>
            </div>
        </div>
    </div>
</form>
@endsection
