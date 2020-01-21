@extends('layouts.auth')

@section('title', __('Reset Password'))

@section('content-inner')
<form method="POST" action="{{ route('password.email') }}" v-submit>
    @csrf

    {{-- Card --}}
    <div class="card sm:max-w-sm mx-auto">
        <div class="card-header">
            {{ __('Reset Password') }}
        </div>

        <div class="card-body">
            {{-- E-Mail Address --}}
            <div class="form-group">
                <label for="email">{{ __('E-Mail Address') }}</label>

                <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus v-focus>

                @error('email')
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
                    {{ __('Send Password Reset Link') }}
                </button>
            </div>
        </div>
    </div>
</form>

{{-- Links --}}
<p class="mt-8 mb-2 text-sm text-center">
    <a href="{{ route('login') }}" class="text-sm text-gray-500 focus:text-gray-600">
        ← {{ __('Back') }}
    </a>
</p>
@endsection
