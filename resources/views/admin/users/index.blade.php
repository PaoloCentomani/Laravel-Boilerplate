@extends('layouts.app')

@section('title', ucfirst(trans('messages.users.plural')))

@section('content')
<div class="container mx-auto">
    <div class="mb-4 md:flex md:justify-between md:items-center">
        <h1 class="m-0">
            @yield('title')
        </h1>

        <div class="flex justify-between mt-2 md:mt-0">
            <form method="GET" action="{{ route('admin.users.index') }}" class="search-form md:mr-4" autocomplete="off">
                <input type="search" class="form-control" name="s" minlength="3" aria-label="@lang('messages.cruds.actions.search')">
                @svg('search', trans('messages.cruds.actions.search'), 'w-5 h-5 fill-current')
            </form>

            <div class="actions">
                <a class="btn" href="{{ route('admin.users.create') }}">
                    @svg('create', trans('messages.cruds.actions.create'), 'w-5 h-5 fill-current')
                    @lang('messages.cruds.actions.create')
                </a>
            </div>
        </div>
    </div>

    @include('shared.search')

    @if ($users->isEmpty())
    @include('shared.empty')
    @else
    <div class="card">
        <div class="card-body p-0">
            <div class="table-responsive">
                <table class="table table-hover">
                    <thead>
                        <tr>
                            <th scope="col">@lang('messages.cruds.fields.id')</th>
                            <th scope="col">@lang('messages.users.fields.full_name')</th>
                            <th scope="col">@lang('messages.users.fields.email')</th>
                            <th scope="col">{{ ucfirst(trans('messages.roles.singular')) }}</th>
                            <th scope="col">@lang('messages.cruds.fields.created_at')</th>
                            <th></th>
                        </tr>
                    </thead>

                    <tbody>
                        @foreach ($users as $user)
                        <tr class="{{ $user->trashed() ? 'line-through text-gray-500' : '' }}">
                            <th scope="row">{{ $user->id }}</th>
                            <td>
                                <a href="{{ route('admin.users.show', $user) }}">{{ $user->fullName }}</a>
                            </td>
                            <td>{{ $user->email }}</td>
                            <td>
                                @foreach ($user->roles as $role)
                                <span class="badge">
                                    @lang("messages.roles.{$role->name}")
                                </span>
                                @endforeach
                            </td>
                            <td>{{ $user->created_at->format(config('boilerplate.time.default')) }}</td>
                            <td>
                                <div class="links">
                                    @if ($user->trashed())
                                    <form method="POST" action="{{ route('admin.users.restore', $user->id) }}">
                                        @csrf
                                        @method('PATCH')

                                        <a href="javascript:" onclick="confirm('{{ __('Confirm restoring :name?', ['name' => $user->fullName]) }}') && this.parentNode.submit()" class="cursor-pointer">
                                            @svg('restore', trans('messages.cruds.actions.restore'))
                                        </a>
                                    </form>
                                    @else
                                    <a href="{{ route('admin.users.show', $user) }}">
                                        @svg('show', trans('messages.cruds.actions.show'))
                                    </a>

                                    <a href="{{ route('admin.users.edit', $user) }}">
                                        @svg('edit', trans('messages.cruds.actions.edit'))
                                    </a>
                                    @endif
                                </div>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>

    {{ $users->appends(['s' => $search])->links() }}
    @endif
</div>
@endsection
