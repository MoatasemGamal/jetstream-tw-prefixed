<x-guest-layout>
    {{-- x-authentication-card component needs its internal classes prefixed separately --}}
    <x-authentication-card>
        <x-slot name="logo">
            {{-- x-authentication-card-logo component needs its internal classes prefixed separately --}}
            <x-authentication-card-logo />
        </x-slot>

        <div x-data="{ recovery: false }">
            {{-- Added prefixes --}}
            <div class="tw-mb-4 tw-text-sm tw-text-gray-600" x-show="! recovery">
                {{ __('Please confirm access to your account by entering the authentication code provided by your authenticator application.') }}
            </div>

            {{-- Added prefixes --}}
            <div class="tw-mb-4 tw-text-sm tw-text-gray-600" x-cloak x-show="recovery">
                {{ __('Please confirm access to your account by entering one of your emergency recovery codes.') }}
            </div>

            {{-- Added prefix to wrapper class AND x-validation-errors needs internal prefixing --}}
            <x-validation-errors class="tw-mb-4" />

            <form method="POST" action="{{ route('two-factor.login') }}">
                @csrf

                {{-- Added prefix --}}
                <div class="tw-mt-4" x-show="! recovery">
                    {{-- x-label component needs its internal classes prefixed separately --}}
                    <x-label for="code" value="{{ __('Code') }}" />
                    {{-- Added prefixes to wrapper class AND x-input needs internal prefixing --}}
                    <x-input id="code" class="tw-block tw-mt-1 tw-w-full" type="text" inputmode="numeric" name="code" autofocus x-ref="code" autocomplete="one-time-code" />
                </div>

                {{-- Added prefix --}}
                <div class="tw-mt-4" x-cloak x-show="recovery">
                    {{-- x-label component needs its internal classes prefixed separately --}}
                    <x-label for="recovery_code" value="{{ __('Recovery Code') }}" />
                    {{-- Added prefixes to wrapper class AND x-input needs internal prefixing --}}
                    <x-input id="recovery_code" class="tw-block tw-mt-1 tw-w-full" type="text" name="recovery_code" x-ref="recovery_code" autocomplete="one-time-code" />
                </div>

                {{-- Added prefixes --}}
                <div class="tw-flex tw-items-center tw-justify-end tw-mt-4">
                    {{-- Added prefixes --}}
                    <button type="button" class="tw-text-sm tw-text-gray-600 hover:tw-text-gray-900 tw-underline tw-cursor-pointer"
                                    x-show="! recovery"
                                    x-on:click="
                                        recovery = true;
                                        $nextTick(() => { $refs.recovery_code.focus() })
                                    ">
                        {{ __('Use a recovery code') }}
                    </button>

                    {{-- Added prefixes --}}
                    <button type="button" class="tw-text-sm tw-text-gray-600 hover:tw-text-gray-900 tw-underline tw-cursor-pointer"
                                    x-cloak
                                    x-show="recovery"
                                    x-on:click="
                                        recovery = false;
                                        $nextTick(() => { $refs.code.focus() })
                                    ">
                        {{ __('Use an authentication code') }}
                    </button>

                    {{-- Added prefix to wrapper class AND x-button needs internal prefixing --}}
                    <x-button class="tw-ms-4">
                        {{ __('Log in') }}
                    </x-button>
                </div>
            </form>
        </div>
    </x-authentication-card>
</x-guest-layout>