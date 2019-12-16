@extends('layouts.app')

@section('title', __('Profile'))

@section('content')
<div class="container mx-auto">
    {{-- Form --}}
    <form method="POST" action="{{ route('profile.update') }}" v-disable-submit>
        @csrf
        @method('PUT')

        <div class="card mx-auto md:w-1/2">
            <div class="card-header">
                {{ __('Profile') }}
            </div>

            <div class="card-body">
                <div class="form-row">
                    {{-- First Name --}}
                    <div class="form-group md:w-1/2 md:pr-2">
                        <label for="first_name">{{ __('First Name') }}</label>

                        <input id="first_name" type="text" class="form-control" value="{{ $user->first_name }}" disabled>
                    </div>

                    {{-- Last Name --}}
                    <div class="form-group md:w-1/2 md:pl-2">
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

                {{-- Password --}}
                <div class="form-group">
                    <label for="password">{{ __('Password') }}</label>

                    <v-toggle-password classes="@error('password') is-invalid @enderror"></v-toggle-password>

                    <span class="form-text">{{ __('Leave this field blank if you don’t want to change the password.') }}</span>

                    @error('password')
                        <div class="invalid-feedback" role="alert">
                            {{ $message }}
                        </div>
                    @enderror
                </div>
            </div>

            <div class="card-footer">
                {{-- Buttons --}}
                <div class="form-buttons">
                    <button type="submit" class="btn btn-primary">
                        {{ __('Save Changes') }}
                    </button>

                    <a href="{{ route('home') }}" class="btn-link">
                        {{ __('Cancel') }}
                    </a>
                </div>
            </div>
        </div>
    </form>
</div>
@endsection
