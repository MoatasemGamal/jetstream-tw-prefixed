{{-- x-action-section component needs its internal classes prefixed separately --}}
<x-action-section>
    <x-slot name="title">
        {{ __('Two Factor Authentication') }}
    </x-slot>

    <x-slot name="description">
        {{ __('Add additional security to your account using two factor authentication.') }}
    </x-slot>

    <x-slot name="content">
        {{-- Added prefixes --}}
        <h3 class="tw-text-lg tw-font-medium tw-text-gray-900">
            @if ($this->enabled)
                @if ($showingConfirmation)
                    {{ __('Finish enabling two factor authentication.') }}
                @else
                    {{ __('You have enabled two factor authentication.') }}
                @endif
            @else
                {{ __('You have not enabled two factor authentication.') }}
            @endif
        </h3>

        {{-- Added prefixes --}}
        <div class="tw-mt-3 tw-max-w-xl tw-text-sm tw-text-gray-600">
            <p>
                {{ __('When two factor authentication is enabled, you will be prompted for a secure, random token during authentication. You may retrieve this token from your phone\'s Google Authenticator application.') }}
            </p>
        </div>

        @if ($this->enabled)
            @if ($showingQrCode)
                {{-- Added prefixes --}}
                <div class="tw-mt-4 tw-max-w-xl tw-text-sm tw-text-gray-600">
                    {{-- Added prefix --}}
                    <p class="tw-font-semibold">
                        @if ($showingConfirmation)
                            {{ __('To finish enabling two factor authentication, scan the following QR code using your phone\'s authenticator application or enter the setup key and provide the generated OTP code.') }}
                        @else
                            {{ __('Two factor authentication is now enabled. Scan the following QR code using your phone\'s authenticator application or enter the setup key.') }}
                        @endif
                    </p>
                </div>

                {{-- Added prefixes --}}
                <div class="tw-mt-4 tw-p-2 tw-inline-block tw-bg-white">
                    {!! $this->user->twoFactorQrCodeSvg() !!}
                </div>

                {{-- Added prefixes --}}
                <div class="tw-mt-4 tw-max-w-xl tw-text-sm tw-text-gray-600">
                     {{-- Added prefix --}}
                    <p class="tw-font-semibold">
                        {{ __('Setup Key') }}: {{ decrypt($this->user->two_factor_secret) }}
                    </p>
                </div>

                @if ($showingConfirmation)
                    {{-- Added prefix --}}
                    <div class="tw-mt-4">
                         {{-- x-label component needs its internal classes prefixed separately --}}
                        <x-label for="code" value="{{ __('Code') }}" />

                        {{-- Added prefixes to wrapper class AND x-input needs internal prefixing --}}
                        <x-input id="code" type="text" name="code" class="tw-block tw-mt-1 tw-w-1/2" inputmode="numeric" autofocus autocomplete="one-time-code"
                            wire:model="code"
                            wire:keydown.enter="confirmTwoFactorAuthentication" />

                        {{-- Added prefix to wrapper class AND x-input-error needs internal prefixing --}}
                        <x-input-error for="code" class="tw-mt-2" />
                    </div>
                @endif
            @endif

            @if ($showingRecoveryCodes)
                 {{-- Added prefixes --}}
                <div class="tw-mt-4 tw-max-w-xl tw-text-sm tw-text-gray-600">
                     {{-- Added prefix --}}
                    <p class="tw-font-semibold">
                        {{ __('Store these recovery codes in a secure password manager. They can be used to recover access to your account if your two factor authentication device is lost.') }}
                    </p>
                </div>

                {{-- Added prefixes --}}
                <div class="tw-grid tw-gap-1 tw-max-w-xl tw-mt-4 tw-px-4 tw-py-4 tw-font-mono tw-text-sm tw-bg-gray-100 tw-rounded-lg">
                    @foreach (json_decode(decrypt($this->user->two_factor_recovery_codes), true) as $code)
                        <div>{{ $code }}</div>
                    @endforeach
                </div>
            @endif
        @endif

        {{-- Added prefix --}}
        <div class="tw-mt-5">
            @if (! $this->enabled)
                 {{-- x-confirms-password component needs its internal classes prefixed separately --}}
                <x-confirms-password wire:then="enableTwoFactorAuthentication">
                     {{-- x-button component needs its internal classes prefixed separately --}}
                    <x-button type="button" wire:loading.attr="disabled">
                        {{ __('Enable') }}
                    </x-button>
                </x-confirms-password>
            @else
                @if ($showingRecoveryCodes)
                    {{-- x-confirms-password component needs its internal classes prefixed separately --}}
                    <x-confirms-password wire:then="regenerateRecoveryCodes">
                        {{-- Added prefix to wrapper class AND x-secondary-button needs internal prefixing --}}
                        <x-secondary-button class="tw-me-3">
                            {{ __('Regenerate Recovery Codes') }}
                        </x-secondary-button>
                    </x-confirms-password>
                @elseif ($showingConfirmation)
                    {{-- x-confirms-password component needs its internal classes prefixed separately --}}
                    <x-confirms-password wire:then="confirmTwoFactorAuthentication">
                         {{-- Added prefix to wrapper class AND x-button needs internal prefixing --}}
                        <x-button type="button" class="tw-me-3" wire:loading.attr="disabled">
                            {{ __('Confirm') }}
                        </x-button>
                    </x-confirms-password>
                @else
                     {{-- x-confirms-password component needs its internal classes prefixed separately --}}
                    <x-confirms-password wire:then="showRecoveryCodes">
                         {{-- Added prefix to wrapper class AND x-secondary-button needs internal prefixing --}}
                        <x-secondary-button class="tw-me-3">
                            {{ __('Show Recovery Codes') }}
                        </x-secondary-button>
                    </x-confirms-password>
                @endif

                @if ($showingConfirmation)
                    {{-- x-confirms-password component needs its internal classes prefixed separately --}}
                    <x-confirms-password wire:then="disableTwoFactorAuthentication">
                         {{-- x-secondary-button component needs its internal classes prefixed separately --}}
                        <x-secondary-button wire:loading.attr="disabled">
                            {{ __('Cancel') }}
                        </x-secondary-button>
                    </x-confirms-password>
                @else
                    {{-- x-confirms-password component needs its internal classes prefixed separately --}}
                    <x-confirms-password wire:then="disableTwoFactorAuthentication">
                        {{-- x-danger-button component needs its internal classes prefixed separately --}}
                        <x-danger-button wire:loading.attr="disabled">
                            {{ __('Disable') }}
                        </x-danger-button>
                    </x-confirms-password>
                @endif

            @endif
        </div>
    </x-slot>
</x-action-section>