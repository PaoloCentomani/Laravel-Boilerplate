@extends('layouts.auth')

@section('title', __('Verify Your E-Mail Address'))

@section('content-inner')
{{-- Card --}}
<div class="card sm:max-w-sm mx-auto mt-8">
    <div class="card-header">{{ __('Verify Your Email Address') }}</div>

    <div class="card-body">
        @if (session('resent'))
            <div class="alert alert-success mb-3" role="alert">
                {{ __('A fresh verification link has been sent to your email address.') }}
            </div>
        @endif

        <p class="mb-3">
            {{ __('Before proceeding, please check your email for a verification link.') }}
        </p>

        <p class="text-sm">
            {{ __('If you did not receive the email') }}, <a href="{{ route('verification.resend') }}">{{ __('click here to request another') }}</a>.
        </p>
    </div>
</div>
@endsection
