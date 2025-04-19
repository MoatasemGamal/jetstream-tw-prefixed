<x-guest-layout>
    {{-- x-authentication-card component needs its internal classes prefixed separately --}}
    <x-authentication-card>
        <x-slot name="logo">
            {{-- x-authentication-card-logo component needs its internal classes prefixed separately --}}
            <x-authentication-card-logo />
        </x-slot>

        {{-- Added prefix to wrapper class AND x-validation-errors needs internal prefixing --}}
        <x-validation-errors class="tw-mb-4" />

        <form method="POST" action="{{ route('password.update') }}">
            @csrf

            <input type="hidden" name="token" value="{{ $request->route('token') }}">

            {{-- Added prefix --}}
            <div class="tw-block">
                {{-- x-label component needs its internal classes prefixed separately --}}
                <x-label for="email" value="{{ __('Email') }}" />
                {{-- Added prefixes to wrapper class AND x-input needs internal prefixing --}}
                <x-input id="email" class="tw-block tw-mt-1 tw-w-full" type="email" name="email" :value="old('email', $request->email)" required autofocus autocomplete="username" />
            </div>

            {{-- Added prefix --}}
            <div class="tw-mt-4">
                {{-- x-label component needs its internal classes prefixed separately --}}
                <x-label for="password" value="{{ __('Password') }}" />
                {{-- Added prefixes to wrapper class AND x-input needs internal prefixing --}}
                <x-input id="password" class="tw-block tw-mt-1 tw-w-full" type="password" name="password" required autocomplete="new-password" />
            </div>

            {{-- Added prefix --}}
            <div class="tw-mt-4">
                {{-- x-label component needs its internal classes prefixed separately --}}
                <x-label for="password_confirmation" value="{{ __('Confirm Password') }}" />
                {{-- Added prefixes to wrapper class AND x-input needs internal prefixing --}}
                <x-input id="password_confirmation" class="tw-block tw-mt-1 tw-w-full" type="password" name="password_confirmation" required autocomplete="new-password" />
            </div>

            {{-- Added prefixes --}}
            <div class="tw-flex tw-items-center tw-justify-end tw-mt-4">
                {{-- x-button component needs its internal classes prefixed separately --}}
                <x-button>
                    {{ __('Reset Password') }}
                </x-button>
            </div>
        </form>
    </x-authentication-card>
</x-guest-layout>