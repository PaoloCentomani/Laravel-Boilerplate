@extends('layouts.app')

@section('header')@endsection

@section('content')
<div class="flex flex-col flex-auto justify-center">
    <div class="container mx-auto">
        {{-- Logo --}}
        <a class="navbar-brand mt-6 md:mt-0 mb-8 flex justify-center text-gray-500 hover:text-gray-600" href="{{ route('home') }}" rel="home">
            @svg('logo', 'h-12', config('app.name'))
        </a>

        @yield('content-inner')
</div>
@endsection
