{{-- x-app-layout component needs its internal classes prefixed separately --}}
<x-app-layout>
    <x-slot name="header">
        {{-- Added prefixes --}}
        <h2 class="tw-font-semibold tw-text-xl tw-text-gray-800 tw-leading-tight">
            {{ __('Profile') }}
        </h2>
    </x-slot>

    <div>
        {{-- Added prefixes (after sm:, lg: modifiers) --}}
        <div class="tw-max-w-7xl tw-mx-auto tw-py-10 sm:tw-px-6 lg:tw-px-8">
            @if (Laravel\Fortify\Features::canUpdateProfileInformation())
                {{-- Livewire component 'profile.update-profile-information-form' needs its internal Blade view classes prefixed separately --}}
                @livewire('profile.update-profile-information-form')

                {{-- x-section-border component needs its internal classes prefixed separately --}}
                <x-section-border />
            @endif

            @if (Laravel\Fortify\Features::enabled(Laravel\Fortify\Features::updatePasswords()))
                {{-- Added prefixes (after sm: modifier) --}}
                <div class="tw-mt-10 sm:tw-mt-0">
                    {{-- Livewire component 'profile.update-password-form' needs its internal Blade view classes prefixed separately --}}
                    @livewire('profile.update-password-form')
                </div>

                {{-- x-section-border component needs its internal classes prefixed separately --}}
                <x-section-border />
            @endif

            @if (Laravel\Fortify\Features::canManageTwoFactorAuthentication())
                 {{-- Added prefixes (after sm: modifier) --}}
                <div class="tw-mt-10 sm:tw-mt-0">
                    {{-- Livewire component 'profile.two-factor-authentication-form' needs its internal Blade view classes prefixed separately --}}
                    @livewire('profile.two-factor-authentication-form')
                </div>

                {{-- x-section-border component needs its internal classes prefixed separately --}}
                <x-section-border />
            @endif

             {{-- Added prefixes (after sm: modifier) --}}
            <div class="tw-mt-10 sm:tw-mt-0">
                 {{-- Livewire component 'profile.logout-other-browser-sessions-form' needs its internal Blade view classes prefixed separately --}}
                @livewire('profile.logout-other-browser-sessions-form')
            </div>

            @if (Laravel\Jetstream\Jetstream::hasAccountDeletionFeatures())
                {{-- x-section-border component needs its internal classes prefixed separately --}}
                <x-section-border />

                 {{-- Added prefixes (after sm: modifier) --}}
                <div class="tw-mt-10 sm:tw-mt-0">
                     {{-- Livewire component 'profile.delete-user-form' needs its internal Blade view classes prefixed separately --}}
                    @livewire('profile.delete-user-form')
                </div>
            @endif
        </div>
    </div>
</x-app-layout>