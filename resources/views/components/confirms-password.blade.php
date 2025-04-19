@props(['title' => __('Confirm Password'), 'content' => __('For your security, please confirm your password to continue.'), 'button' => __('Confirm')])

@php
    $confirmableId = md5($attributes->wire('then'));
@endphp

<span
    {{ $attributes->wire('then') }}
    x-data
    x-ref="span"
    x-on:click="$wire.startConfirmingPassword('{{ $confirmableId }}')"
    x-on:password-confirmed.window="setTimeout(() => $event.detail.id === '{{ $confirmableId }}' && $refs.span.dispatchEvent(new CustomEvent('then', { bubbles: false })), 250);"
>
    {{ $slot }}
</span>

@once
{{-- x-dialog-modal component needs its internal classes prefixed separately --}}
<x-dialog-modal wire:model.live="confirmingPassword">
    <x-slot name="title">
        {{ $title }}
    </x-slot>

    <x-slot name="content">
        {{ $content }}

        {{-- Added prefix --}}
        <div class="tw-mt-4" x-data="{}" x-on:confirming-password.window="setTimeout(() => $refs.confirmable_password.focus(), 250)">
            {{-- Added prefixes to wrapper class AND x-input needs internal prefixing --}}
            <x-input type="password" class="tw-mt-1 tw-block tw-w-3/4" placeholder="{{ __('Password') }}" autocomplete="current-password"
                        x-ref="confirmable_password"
                        wire:model="confirmablePassword"
                        wire:keydown.enter="confirmPassword" />

            {{-- Added prefix to wrapper class AND x-input-error needs internal prefixing --}}
            <x-input-error for="confirmable_password" class="tw-mt-2" />
        </div>
    </x-slot>

    <x-slot name="footer">
        {{-- x-secondary-button component needs its internal classes prefixed separately --}}
        <x-secondary-button wire:click="stopConfirmingPassword" wire:loading.attr="disabled">
            {{ __('Cancel') }}
        </x-secondary-button>

        {{-- Added prefix to wrapper class AND x-button needs internal prefixing --}}
        <x-button class="tw-ms-3" dusk="confirm-password-button" wire:click="confirmPassword" wire:loading.attr="disabled">
            {{ $button }}
        </x-button>
    </x-slot>
</x-dialog-modal>
@endonce