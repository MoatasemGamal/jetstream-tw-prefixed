<x-guest-layout>
    {{-- x-authentication-card component needs its internal classes prefixed separately --}}
    <x-authentication-card>
        <x-slot name="logo">
            {{-- x-authentication-card-logo component needs its internal classes prefixed separately --}}
            <x-authentication-card-logo />
        </x-slot>

        {{-- Added prefixes --}}
        <div class="tw-mb-4 tw-text-sm tw-text-gray-600">
            {{ __('Forgot your password? No problem. Just let us know your email address and we will email you a password reset link that will allow you to choose a new one.') }}
        </div>

        @session('status')
            {{-- Added prefixes --}}
            <div class="tw-mb-4 tw-font-medium tw-text-sm tw-text-green-600">
                {{ $value }}
            </div>
        @endsession

        {{-- Added prefix to wrapper class AND x-validation-errors needs internal prefixing --}}
        <x-validation-errors class="tw-mb-4" />

        <form method="POST" action="{{ route('password.email') }}">
            @csrf

            {{-- Added prefix --}}
            <div class="tw-block">
                {{-- x-label component needs its internal classes prefixed separately --}}
                <x-label for="email" value="{{ __('Email') }}" />
                {{-- Added prefixes to wrapper class AND x-input needs internal prefixing --}}
                <x-input id="email" class="tw-block tw-mt-1 tw-w-full" type="email" name="email" :value="old('email')" required autofocus autocomplete="username" />
            </div>

            {{-- Added prefixes --}}
            <div class="tw-flex tw-items-center tw-justify-end tw-mt-4">
                {{-- x-button component needs its internal classes prefixed separately --}}
                <x-button>
                    {{ __('Email Password Reset Link') }}
                </x-button>
            </div>
        </form>
    </x-authentication-card>
</x-guest-layout>