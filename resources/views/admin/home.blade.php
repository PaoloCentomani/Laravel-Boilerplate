@extends('layouts.app')

@section('title', __('Home'))

@section('content')
<div class="container mx-auto">
    <section class="md:grid md:grid-cols-2 md:gap-4">
        <div class="card">
            <div class="card-header">Dashboard</div>

            <div class="card-body">
                You are logged in!
            </div>
        </div>

        <v-example class="mt-8 md:mt-0"></v-example>
    </section>

    {{-- Tabs --}}
    <section class="mt-8">
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
    <section class="mt-8">
        <div class="card">
            <div class="card-header">
                Custom Forms
            </div>

            <div class="card-body md:grid md:grid-cols-2 md:gap-4">
                <div>
                    <label for="custom-select">Select</label>

                    <select class="form-control custom-select" id="custom-select">
                        <option value="">{{ __('Choose…') }}</option>
                        <option value="">Lorem ipsum</option>
                        <option value="">Ut enim</option>
                        <option value="">Duis aute</option>
                    </select>
                </div>

                <div class="mt-4 md:mt-0">
                    <v-datetimepicker :enable-time="true" id="datetimepicker" label="Date Picker" placeholder="{{ __('Choose…') }}"></v-datetimepicker>
                </div>
            </div>
        </div>
    </section>

    {{-- Custom Scrollbar --}}
    <section class="mt-8 md:grid md:grid-cols-2 md:gap-4">
        <div>
            @widget('ExampleWidget')
        </div>

        <div class="mt-4 md:mt-0">
            <h1>Custom Scrollbar</h1>

            <div class="h-48" data-simplebar>
                <p class="mb-4">Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Dolor morbi non arcu risus. Justo donec enim diam vulputate ut pharetra sit amet. Elementum tempus egestas sed sed risus pretium quam vulputate. Est pellentesque elit ullamcorper dignissim cras tincidunt lobortis feugiat vivamus. Velit egestas dui id ornare arcu odio. Tristique et egestas quis ipsum suspendisse. Diam maecenas sed enim ut sem viverra aliquet. Tristique et egestas quis ipsum suspendisse ultrices. Id aliquet lectus proin nibh nisl condimentum id venenatis a.</p>
                <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Malesuada nunc vel risus commodo viverra. Est ante in nibh mauris. Aliquam vestibulum morbi blandit cursus risus at ultrices mi tempus. Dictum varius duis at consectetur. Et molestie ac feugiat sed lectus vestibulum. Netus et malesuada fames ac. Maecenas ultricies mi eget mauris pharetra et ultrices neque. Sit amet purus gravida quis blandit turpis cursus in hac. Mus mauris vitae ultricies leo integer malesuada.</p>
            </div>
        </div>
    </section>
</div>
@endsection
