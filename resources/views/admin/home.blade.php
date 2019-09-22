@extends('layouts.app')

@section('title', __('Home'))

@section('content')
<div class="container mx-auto mt-8">
    <section class="md:flex">
        <div class="card md:w-1/2 md:mr-2">
            <div class="card-header">Dashboard</div>

            <div class="card-body">
                You are logged in!
            </div>
        </div>

        <v-example class="mt-6 md:w-1/2 md:mt-0 md:ml-2"></v-example>
    </section>

    {{-- Tabs --}}
    <section class="md:flex mt-10">
        <v-tabs id="tab-sample" v-cloak>
            <v-tab title="Lorem ipsum" active>
                <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.</p>
            </v-tab>

            <v-tab title="Ut enim">
                <p>Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.</p>
            </v-tab>

            <v-tab title="Duis aute">
                <p>Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</p>
            </v-tab>
        </v-tabs>
    </section>

    {{-- Custom Forms --}}
    <section class="mt-6">
        <div class="card">
            <div class="card-header">
                Custom Forms
            </div>

            <div class="card-body">
                <select class="form-control custom-select">
                    <option value="">{{ __('Choose…') }}</option>
                    <option value="">Lorem ipsum</option>
                    <option value="">Ut enim</option>
                    <option value="">Duis aute</option>
                </select>
            </div>
        </div>
    </section>

    {{-- Tables --}}
    <section class="mt-8">
        <h1>Tables</h1>

        <div class="table-responsive">
            <table>
                <thead>
                    <tr>
                        <th>Nome e cognome</th>
                        <th>E-mail</th>
                        <th>Iscritto il</th>
                    </tr>
                </thead>

                <tbody>
                    @foreach ($users as $user)
                    <tr>
                        <td>{{ $user->fullName }}</td>
                        <td>{{ $user->email }}</td>
                        <td>{{ $user->created_at->format(config('boilerplate.time.default')) }}</td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>

        {{ $users->links() }}
    </section>
</div>
@endsection
