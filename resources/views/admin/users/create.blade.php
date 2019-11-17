@extends('layouts.app')

@section('title', trans('messages.cruds.actions.create') . ' ' . trans('messages.users.singular'))

@section('content')
<div class="container mx-auto">
    {{-- Breadcrumb --}}
    <h1 class="mt-0 mb-4">
        @yield('title')
    </h1>

    {{-- Form --}}
    <form method="POST" action="{{ route('admin.users.store') }}" autocomplete="off">
        @csrf

        <div class="card">
            <div class="card-body">
                <div class="form-row">
                    {{-- First Name --}}
                    <div class="form-group required md:w-1/2 md:pr-2">
                        <label for="first_name">{{ __('First Name') }}</label>

                        <input id="first_name" type="text" class="form-control @error('first_name') is-invalid @enderror" name="first_name" value="{{ old('first_name') }}" required autofocus v-focus>

                        @error('first_name')
                            <div class="invalid-feedback" role="alert">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>

                    {{-- Last Name --}}
                    <div class="form-group required md:w-1/2 md:pl-2">
                        <label for="last_name">{{ __('Last Name') }}</label>

                        <input id="last_name" type="text" class="form-control @error('last_name') is-invalid @enderror" name="last_name" value="{{ old('last_name') }}" required>

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

                    <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required>

                    @error('email')
                        <div class="invalid-feedback" role="alert">
                            {{ $message }}
                        </div>
                    @enderror
                </div>

                <div class="form-row">
                    {{-- Password --}}
                    <div class="form-group required md:w-1/2 md:pr-2">
                        <label for="password">{{ __('Password') }}</label>

                        <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="new-password">
                    </div>

                    {{-- Confirm password --}}
                    <div class="form-group required md:w-1/2 md:pl-2">
                        <label for="password-confirm">{{ __('Confirm Password') }}</label>

                        <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required autocomplete="new-password">
                    </div>

                    @error('password')
                        <div class="invalid-feedback" role="alert">
                            {{ $message }}
                        </div>
                    @enderror
                </div>

                {{-- Roles --}}
                <div class="form-group required">
                    <label for="role_id">{{ __('Role') }}</label>

                    <select name="role_id" id="role_id" class="form-control custom-select" required>
                        <option value="">{{ __('Choose…') }}</option>

                        @foreach ($roles as $role)
                        <option value="{{ $role->id }}"{{ ($role->id === (int) old('role_id')) ? ' selected' : '' }}>
                            @lang("messages.roles.{$role->name}")
                        </option>
                        @endforeach
                    </select>

                    @error('role_id')
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

                    <a href="{{ route('admin.users.index') }}" class="btn-link">
                        {{ __('Cancel') }}
                    </a>
                </div>
            </div>
        </div>
    </form>
</div>
@endsection
