{{-- x-form-section component needs its internal classes prefixed separately --}}
<x-form-section submit="updatePassword">
    <x-slot name="title">
        {{ __('Update Password') }}
    </x-slot>

    <x-slot name="description">
        {{ __('Ensure your account is using a long, random password to stay secure.') }}
    </x-slot>

    <x-slot name="form">
        {{-- Added prefixes (after sm: modifier) --}}
        <div class="tw-col-span-6 sm:tw-col-span-4">
            {{-- x-label component needs its internal classes prefixed separately --}}
            <x-label for="current_password" value="{{ __('Current Password') }}" />
            {{-- Added prefixes to wrapper class AND x-input needs internal prefixing --}}
            <x-input id="current_password" type="password" class="tw-mt-1 tw-block tw-w-full" wire:model="state.current_password" autocomplete="current-password" />
            {{-- Added prefix to wrapper class AND x-input-error needs internal prefixing --}}
            <x-input-error for="current_password" class="tw-mt-2" />
        </div>

        {{-- Added prefixes (after sm: modifier) --}}
        <div class="tw-col-span-6 sm:tw-col-span-4">
            {{-- x-label component needs its internal classes prefixed separately --}}
            <x-label for="password" value="{{ __('New Password') }}" />
            {{-- Added prefixes to wrapper class AND x-input needs internal prefixing --}}
            <x-input id="password" type="password" class="tw-mt-1 tw-block tw-w-full" wire:model="state.password" autocomplete="new-password" />
            {{-- Added prefix to wrapper class AND x-input-error needs internal prefixing --}}
            <x-input-error for="password" class="tw-mt-2" />
        </div>

        {{-- Added prefixes (after sm: modifier) --}}
        <div class="tw-col-span-6 sm:tw-col-span-4">
            {{-- x-label component needs its internal classes prefixed separately --}}
            <x-label for="password_confirmation" value="{{ __('Confirm Password') }}" />
            {{-- Added prefixes to wrapper class AND x-input needs internal prefixing --}}
            <x tw-w-full" wire:model="state.password_confirmation" autocomplete="new-password" />
             {{-- Added prefix to wrapper class AND x-input-error needs internal prefixing --}}
            <x-input-error for="password_confirmation" class="tw-mt-2" />
        </div>
    </x-slot>

    <x-slot name="actions">
         {{-- Added prefix to wrapper class AND x-action-message needs internal prefixing --}}
        <x-action-message class="tw-me-3" on="saved">
            {{ __('Saved.') }}
        </x-action-message>

         {{-- x-button component needs its internal classes prefixed separately --}}
        <x-button>
            {{ __('Save') }}
        </x-button>
    </x-slot>
</x-form-section>