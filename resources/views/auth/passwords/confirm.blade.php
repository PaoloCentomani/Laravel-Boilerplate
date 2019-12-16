@extends('layouts.app')

@section('title', __('Confirm Password'))

@section('content')
<div class="container mx-auto">
    <form method="POST" action="{{ route('password.confirm') }}" v-disable-submit>
        @csrf

        {{-- Card --}}
        <div class="card sm:max-w-sm mx-auto">
            <div class="card-header">
                {{ __('Confirm Password') }}
            </div>

            <div class="card-body">
                <p class="mb-3">
                    {{ __('Please confirm your password before continuing.') }}
                </p>

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
            </div>

            <div class="card-footer">
                <div class="form-buttons">
                    <button type="submit" class="btn btn-primary btn-block">
                        {{ __('Confirm Password') }}
                    </button>
                </div>
            </div>
        </div>
    </form>

    {{-- Links --}}
    <p class="mt-8 mb-2 text-sm text-center">
        <a href="javascript:history.back()" class="text-sm text-gray-500 focus:text-gray-600">
            ← {{ __('Back') }}
        </a>
    </p>
</div>
@endsection
