@extends('layouts.app')

@section('title', __('Profile'))

@section('content')
<div class="container mx-auto">
    <div class="md:flex md:justify-center">
        <div class="card md:w-1/2">
            <div class="card-header">
                {{ __('Profile') }}
            </div>

            <div class="card-body">
                <form method="POST" action="{{ route('profile.update') }}">
                    @csrf
                    @method('PUT')

                    <div class="form-row">
                        {{-- First Name --}}
                        <div class="form-group col md:w-1/2 md:pr-2">
                            <label for="first_name">{{ __('First Name') }}</label>

                            <input id="first_name" type="text" class="form-control" value="{{ $user->first_name }}" disabled>
                        </div>

                        {{-- Last Name --}}
                        <div class="form-group col md:w-1/2">
                            <label for="last_name">{{ __('Last Name') }}</label>

                            <input id="last_name" type="text" class="form-control" value="{{ $user->last_name }}" disabled>
                        </div>
                    </div>

                    {{-- E-Mail Address --}}
                    <div class="form-group required">
                        <label for="email">{{ __('E-Mail Address') }}</label>

                        <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') ?: $user->email }}" required autocomplete="email">

                        @if ($mustVerifyEmail)
                        <p class="form-text">{{ __('We’ll send you a confirmation message at your new address.') }}</p>
                        @endif

                        @error('email')
                            <div class="invalid-feedback" role="alert">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>

                    <div class="form-row">
                        {{-- Password --}}
                        <div class="form-group col md:w-1/2 md:pr-2">
                            <label for="password">{{ __('New Password') }}</label>

                            <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" autocomplete="new-password">
                        </div>

                        {{-- Confirm password --}}
                        <div class="form-group col mb-0 md:w-1/2">
                            <label for="password-confirm">{{ __('Confirm Password') }}</label>

                            <input id="password-confirm" type="password" class="form-control" name="password_confirmation" autocomplete="new-password">
                        </div>

                        <p class="form-text">{{ __('Leave this field blank if you don’t want to change your password.') }}</p>

                        @error('password')
                            <div class="invalid-feedback" role="alert">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>

                    {{-- Buttons --}}
                    <div class="form-group mt-4 mb-1">
                        <button type="submit" class="btn btn-primary">
                            {{ __('Update') }}
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection
