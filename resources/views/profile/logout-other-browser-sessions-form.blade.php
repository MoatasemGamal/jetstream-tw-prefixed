{{-- x-action-section component needs its internal classes prefixed separately --}}
<x-action-section>
    <x-slot name="title">
        {{ __('Browser Sessions') }}
    </x-slot>

    <x-slot name="description">
        {{ __('Manage and log out your active sessions on other browsers and devices.') }}
    </x-slot>

    <x-slot name="content">
        {{-- Added prefixes --}}
        <div class="tw-max-w-xl tw-text-sm tw-text-gray-600">
            {{ __('If necessary, you may log out of all of your other browser sessions across all of your devices. Some of your recent sessions are listed below; however, this list may not be exhaustive. If you feel your account has been compromised, you should also update your password.') }}
        </div>

        @if (count($this->sessions) > 0)
            {{-- Added prefixes --}}
            <div class="tw-mt-5 tw-space-y-6">
                <!-- Other Browser Sessions -->
                @foreach ($this->sessions as $session)
                    {{-- Added prefixes --}}
                    <div class="tw-flex tw-items-center">
                        <div>
                            @if ($session->agent->isDesktop())
                                {{-- Added prefixes to SVG --}}
                                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="tw-size-8 tw-text-gray-500">
                                    <path stroke-linecap="round" stroke-linejoin="round" d="M9 17.25v1.007a3 3 0 01-.879 2.122L7.5 21h9l-.621-.621A3 3 0 0115 18.257V17.25m6-12V15a2.25 2.25 0 01-2.25 2.25H5.25A2.25 2.25 0 013 15V5.25m18 0A2.25 2.25 0 0018.75 3H5.25A2.25 2.25 0 003 5.25m18 0V12a2.25 2.25 0 01-2.25 2.25H5.25A2.25 2.25 0 013 12V5.25" />
                                </svg>
                            @else
                                {{-- Added prefixes to SVG --}}
                                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="tw-size-8 tw-text-gray-500">
                                    <path stroke-linecap="round" stroke-linejoin="round" d="M10.5 1.5H8.25A2.25 2.25 0 006 3.75v16.5a2.25 2.25 0 002.25 2.25h7.5A2.25 2.25 0 0018 20.25V3.75a2.25 2.25 0 00-2.25-2.25H13.5m-3 0V3h3V1.5m-3 0h3m-3 18.75h3" />
                                </svg>
                            @endif
                        </div>

                        {{-- Added prefix --}}
                        <div class="tw-ms-3">
                            {{-- Added prefixes --}}
                            <div class="tw-text-sm tw-text-gray-600">
                                {{ $session->agent->platform() ? $session->agent->platform() : __('Unknown') }} - {{ $session->agent->browser() ? $session->agent->browser() : __('Unknown') }}
                            </div>

                            <div>
                                {{-- Added prefixes --}}
                                <div class="tw-text-xs tw-text-gray-500">
                                    {{ $session->ip_address }},

                                    @if ($session->is_current_device)
                                        {{-- Added prefixes --}}
                                        <span class="tw-text-green-500 tw-font-semibold">{{ __('This device') }}</span>
                                    @else
                                        {{ __('Last active') }} {{ $session->last_active }}
                                    @endif
                                </div>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        @endif

        {{-- Added prefixes --}}
        <div class="tw-flex tw-items-center tw-mt-5">
            {{-- x-button component needs its internal classes prefixed separately --}}
            <x-button wire:click="confirmLogout" wire:loading.attr="disabled">
                {{ __('Log Out Other Browser Sessions') }}
            </x-button>

            {{-- Added prefix to wrapper class AND x-action-message needs internal prefixing --}}
            <x-action-message class="tw-ms-3" on="loggedOut">
                {{ __('Done.') }}
            </x-action-message>
        </div>

        <!-- Log Out Other Devices Confirmation Modal -->
        {{-- x-dialog-modal component needs its internal classes prefixed separately --}}
        <x-dialog-modal wire:model.live="confirmingLogout">
            <x-slot name="title">
                {{ __('Log Out Other Browser Sessions') }}
            </x-slot>

            <x-slot name="content">
                {{ __('Please enter your password to confirm you would like to log out of your other browser sessions across all of your devices.') }}

                {{-- Added prefix --}}
                <div class="tw-mt-4" x-data="{}" x-on:confirming-logout-other-browser-sessions.window="setTimeout(() => $refs.password.focus(), 250)">
                    {{-- Added prefixes to wrapper class AND x-input needs internal prefixing --}}
                    <x-input type="password" class="tw-mt-1 tw-block tw-w-3/4"
                                autocomplete="current-password"
                                placeholder="{{ __('Password') }}"
                                x-ref="password"
                                wire:model="password"
                                wire:keydown.enter="logoutOtherBrowserSessions" />

                    {{-- Added prefix to wrapper class AND x-input-error needs internal prefixing --}}
                    <x-input-error for="password" class="tw-mt-2" />
                </div>
            </x-slot>

            <x-slot name="footer">
                {{-- x-secondary-button component needs its internal classes prefixed separately --}}
                <x-secondary-button wire:click="$toggle('confirmingLogout')" wire:loading.attr="disabled">
                    {{ __('Cancel') }}
                </x-secondary-button>

                {{-- Added prefix to wrapper class AND x-button needs internal prefixing --}}
                <x-button class="tw-ms-3"
                            wire:click="logoutOtherBrowserSessions"
                            wire:loading.attr="disabled">
                    {{ __('Log Out Other Browser Sessions') }}
                </x-button>
            </x-slot>
        </x-dialog-modal>
    </x-slot>
</x-action-section>