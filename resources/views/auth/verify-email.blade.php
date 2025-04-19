<x-guest-layout>
    {{-- x-authentication-card component needs its internal classes prefixed separately --}}
    <x-authentication-card>
        <x-slot name="logo">
            {{-- x-authentication-card-logo component needs its internal classes prefixed separately --}}
            <x-authentication-card-logo />
        </x-slot>

        {{-- Added prefixes --}}
        <div class="tw-mb-4 tw-text-sm tw-text-gray-600">
            {{ __('Before continuing, could you verify your email address by clicking on the link we just emailed to you? If you didn\'t receive the email, we will gladly send you another.') }}
        </div>

        @if (session('status') == 'verification-link-sent')
            {{-- Added prefixes --}}
            <div class="tw-mb-4 tw-font-medium tw-text-sm tw-text-green-600">
                {{ __('A new verification link has been sent to the email address you provided in your profile settings.') }}
            </div>
        @endif

        {{-- Added prefixes --}}
        <div class="tw-mt-4 tw-flex tw-items-center tw-justify-between">
            <form method="POST" action="{{ route('verification.send') }}">
                @csrf

                <div>
                    {{-- x-button component needs its internal classes prefixed separately --}}
                    <x-button type="submit">
                        {{ __('Resend Verification Email') }}
                    </x-button>
                </div>
            </form>

            <div>
                {{-- Added prefixes to anchor tag --}}
                <a
                    href="{{ route('profile.show') }}"
                    class="tw-underline tw-text-sm tw-text-gray-600 hover:tw-text-gray-900 tw-rounded-md focus:tw-outline-none focus:tw-ring-2 focus:tw-ring-offset-2 focus:tw-ring-indigo-500"
                >
                    {{ __('Edit Profile') }}</a>

                {{-- Added prefix to form class --}}
                <form method="POST" action="{{ route('logout') }}" class="tw-inline">
                    @csrf

                    {{-- Added prefixes to button --}}
                    <button type="submit" class="tw-underline tw-text-sm tw-text-gray-600 hover:tw-text-gray-900 tw-rounded-md focus:tw-outline-none focus:tw-ring-2 focus:tw-ring-offset-2 focus:tw-ring-indigo-500 tw-ms-2">
                        {{ __('Log Out') }}
                    </button>
                </form>
            </div>
        </div>
    </x-authentication-card>
</x-guest-layout>