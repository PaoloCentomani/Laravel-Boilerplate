@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="ml-auto mr-auto col-lg-5 mt-4">
            <div class="card">
                <div class="card-header">@lang('messages.login')</div>

                <div class="card-body">
                    <form method="POST" action="{{ route('login') }}">
                        @csrf

                        <div class="form-group">
                            <label for="email">@lang('messages.email')</label>

                            <input id="email" type="email" class="form-control{{ $errors->has('email') ? ' is-invalid' : '' }}" name="email" value="{{ old('email') }}" required autofocus>

                            @if ($errors->has('email'))
                                <div class="invalid-feedback">
                                    {{ $errors->first('email') }}
                                </div>
                            @endif
                        </div>

                        <div class="form-group">
                            <label for="password">@lang('messages.password')</label>

                            <input id="password" type="password" class="form-control{{ $errors->has('password') ? ' is-invalid' : '' }}" name="password" required>

                            @if ($errors->has('password'))
                                <div class="invalid-feedback">
                                    {{ $errors->first('password') }}
                                </div>
                            @endif
                        </div>

                        <div class="form-group">
                            <div class="custom-control custom-checkbox">
                                <input type="checkbox" class="custom-control-input" id="remember-me" name="remember" {{ old('remember') ? 'checked' : '' }}>
                                <label class="custom-control-label" for="remember-me">@lang('messages.remember_me')</label>
                            </div>
                        </div>

                        <div class="form-group mb-0 d-flex justify-content-between">
                            <button type="submit" class="btn btn-primary">
                                @lang('messages.login')
                            </button>

                            <a class="btn btn-link" href="{{ route('password.request') }}">
                                @lang('messages.forgot_password')
                            </a>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
