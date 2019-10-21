@extends('layouts.app')

@section('title', __('Confirm Password'))

@section('content')
<div class="container mx-auto">
    {{-- Card --}}
    <div class="card sm:max-w-sm mt-8 mx-auto">
        <div class="card-header">{{ __('Confirm Password') }}</div>

        <div class="card-body">
            <p class="mb-3">
                {{ __('Please confirm your password before continuing.') }}
            </p>

            <form method="POST" action="{{ route('password.confirm') }}">
                @csrf

                {{-- Password --}}
                <div class="form-group">
                    <label for="password">{{ __('Password') }}</label>

                    <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="current-password" autofocus v-focus>

                    @error('password')
                        <div class="invalid-feedback" role="alert">
                            {{ $message }}
                        </div>
                    @enderror
                </div>

                <div class="form-group mt-4 mb-1">
                    <button type="submit" class="btn btn-primary">
                        {{ __('Confirm Password') }}
                    </button>
                </div>
            </form>
        </div>
    </div>

    {{-- Links --}}
    <p class="mt-8 text-sm text-center">
        @if (Route::has('password.request'))
        <a href="{{ route('password.request') }}" class="text-sm text-gray-500 hover:text-gray-600">
            {{ __('Forgot Password?') }}
        </a>
        @endif
    </p>
</div>
@endsection
