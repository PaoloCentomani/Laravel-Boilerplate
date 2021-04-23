<x-guest-layout>
    <x-jet-authentication-card>
        <x-slot name="logo">
            <x-jet-authentication-card-logo />
        </x-slot>

        <x-jet-validation-errors class="mb-4" />

        <form method="POST" action="{{ route('password.update') }}">
            @csrf

            <input type="hidden" name="token" value="{{ $request->route('token') }}">

            <div class="block">
                <x-jet-label for="email" value="{{ __('E-Mail') }}" />
                <x-jet-input id="email" class="block w-full mt-1 text-gray-400 bg-gray-100 cursor-not-allowed" type="email" name="email" :value="old('email', $request->email)" required readonly />
            </div>

            <div class="mt-4">
                <x-jet-label for="password" value="{{ __('New Password') }}" />
                <x-jet-input id="password" class="block w-full mt-1" type="password" name="password" required autocomplete="new-password" />
            </div>

            <div class="mt-4">
                <x-jet-label for="password_confirmation" value="{{ __('Confirm Password') }}" />
                <x-jet-input id="password_confirmation" class="block w-full mt-1" type="password" name="password_confirmation" required autofocus autocomplete="new-password" />
            </div>

            <div class="flex items-center justify-end pt-6 mt-6 border-t border-gray-100">
                <x-jet-button>
                    {{ __('Reset Password') }}
                </x-jet-button>
            </div>
        </form>
    </x-jet-authentication-card>
</x-guest-layout>
