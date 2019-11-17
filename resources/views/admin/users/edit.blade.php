@extends('layouts.app')

@section('title', $user->fullName)

@section('content')
<div class="container mx-auto">
    {{-- Breadcrumb --}}
    <h1 class="mt-0 mb-4">
        @yield('title')
    </h1>

    {{-- Form --}}
    <form method="POST" action="{{ route('admin.users.update', $user) }}" autocomplete="off">
        @csrf
        @method('PUT')

        <div class="card">
            <div class="card-body">
                <div class="form-row">
                    {{-- First Name --}}
                    <div class="form-group required md:w-1/2 md:pr-2">
                        <label for="first_name">{{ __('First Name') }}</label>

                        <input id="first_name" type="text" class="form-control @error('first_name') is-invalid @enderror" name="first_name" value="{{ old('first_name') ?? $user->first_name }}" required>

                        @error('first_name')
                            <div class="invalid-feedback" role="alert">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>

                    {{-- Last Name --}}
                    <div class="form-group required md:w-1/2 md:pl-2">
                        <label for="last_name">{{ __('Last Name') }}</label>

                        <input id="last_name" type="text" class="form-control @error('last_name') is-invalid @enderror" name="last_name" value="{{ old('last_name') ?? $user->last_name }}" required>

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

                    <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') ?? $user->email }}" required>

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

                {{-- Roles --}}
                <div class="form-group required">
                    <label for="role_id">{{ ucfirst(trans('messages.roles.singular')) }}</label>

                    <select name="role_id" id="role_id" class="form-control custom-select" required>
                        <option value="">{{ __('Choose…') }}</option>

                        @foreach ($roles as $role)
                        <option value="{{ $role->id }}"{{ ($role->id === (int) old('role_id')) || ($role->id === $user->roles->first()->id) ? ' selected' : '' }}>
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
