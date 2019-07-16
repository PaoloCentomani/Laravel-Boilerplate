@extends('layouts.app')

@section('title', __('Home'))

@section('content')
<div class="container mx-auto mt-8">
    <div class="md:flex">
        <div class="card md:w-1/2 md:mr-2">
            <div class="card-header">Dashboard</div>

            <div class="card-body">
                You are logged in!
            </div>
        </div>

        <v-example class="mt-6 md:w-1/2 md:mt-0 md:ml-2"></v-example>
    </div>
</div>
@endsection
