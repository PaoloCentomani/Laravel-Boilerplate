@extends('layouts.app')

@section('title', __('Home'))

@section('content')
<div class="container mx-auto mt-8">
    <div class="md:flex md:justify-center">
        <div class="card md:w-1/2">
            <div class="card-header">
                {{ __('Home') }}
            </div>

            <div class="card-body">
                You are logged in!
            </div>
        </div>
    </div>
</div>
@endsection
