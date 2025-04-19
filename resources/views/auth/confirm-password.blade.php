<x-guest-layout>
    {{-- x-authentication-card component needs its internal classes prefixed separately --}}
    <x-authentication-card>
        <x-slot name="logo">
            {{-- x-authentication-card-logo component needs its internal classes prefixed separately --}}
            <x-authentication-card-logo />
        </x-slot>

        {{-- Added prefixes --}}
        <div class="tw-mb-4 tw-text-sm tw-text-gray-600">
            {{ __('This is a secure area of the application. Please confirm your password before continuing.') }}
        </div>

        {{-- Added prefix to wrapper class AND x-validation-errors needs internal prefixing --}}
        <x-validation-errors class="tw-mb-4" />

        <form method="POST" action="{{ route('password.confirm') }}">
            @csrf

            <div>
                {{-- x-label component needs its internal classes prefixed separately --}}
                <x-label for="password" value="{{ __('Password') }}" />
                {{-- Added prefixes to wrapper class AND x-input needs internal prefixing --}}
                <x-input id="password" class="tw-block tw-mt-1 tw-w-full" type="password" name="password" required autocomplete="current-password" autofocus />
            </div>

            {{-- Added prefixes --}}
            <div class="tw-flex tw-justify-end tw-mt-4">
                {{-- Added prefix to wrapper class AND x-button needs internal prefixing --}}
                <x-button class="tw-ms-4">
                    {{ __('Confirm') }}
                </x-button>
            </div>
        </form>
    </x-authentication-card>
</x-guest-layout>