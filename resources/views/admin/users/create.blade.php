@extends('layouts.app')

@section('title', trans('messages.cruds.actions.create') . ' ' . trans('messages.users.singular'))

@section('content')
<div class="container mx-auto">
    <h1 class="mt-0 mb-4">
        @yield('title')
    </h1>

    {{-- Form --}}
    <form method="POST" action="{{ route('admin.users.store') }}" autocomplete="off" v-submit>
        @csrf

        <div class="card">
            <div class="card-body">
                <div class="form-row md:grid-cols-2">
                    {{-- First Name --}}
                    <div class="form-group required">
                        <label for="first_name">{{ __('First Name') }}</label>

                        <input id="first_name" type="text" class="form-control @error('first_name') is-invalid @enderror" name="first_name" value="{{ old('first_name') }}" required autofocus v-focus>

                        @error('first_name')
                            <div class="invalid-feedback" role="alert">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>

                    {{-- Last Name --}}
                    <div class="form-group required">
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

                {{-- Password --}}
                <div class="form-group required">
                    <label for="password">{{ __('Password') }}</label>

                    <v-toggle-password classes="@error('password') is-invalid @enderror"></v-toggle-password>

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

                    <a href="{{ url()->previous() }}" class="btn-link">
                        {{ __('Cancel') }}
                    </a>
                </div>
            </div>
        </div>
    </form>
</div>
@endsection
