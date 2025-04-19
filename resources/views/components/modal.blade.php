@props(['id', 'maxWidth'])

@php
$id = $id ?? md5($attributes->wire('model'));

// Prefixed classes in the array values
$maxWidth = [
    'sm' => 'sm:tw-max-w-sm',
    'md' => 'sm:tw-max-w-md',
    'lg' => 'sm:tw-max-w-lg',
    'xl' => 'sm:tw-max-w-xl',
    '2xl' => 'sm:tw-max-w-2xl',
][$maxWidth ?? '2xl']; // Default is also prefixed now
@endphp

<div
    x-data="{ show: @entangle($attributes->wire('model')) }"
    x-on:close.stop="show = false"
    x-on:keydown.escape.window="show = false"
    x-show="show"
    id="{{ $id }}"
    {{-- Added prefixes to static classes --}}
    class="jetstream-modal tw-fixed tw-inset-0 tw-overflow-y-auto tw-px-4 tw-py-6 sm:tw-px-0 tw-z-50"
    style="display: none;"
>
    {{-- Added prefixes to static classes and Alpine transitions --}}
    <div x-show="show" class="tw-fixed tw-inset-0 tw-transform tw-transition-all" x-on:click="show = false" x-transition:enter="tw-ease-out tw-duration-300"
                    x-transition:enter-start="tw-opacity-0"
                    x-transition:enter-end="tw-opacity-100"
                    x-transition:leave="tw-ease-in tw-duration-200"
                    x-transition:leave-start="tw-opacity-100"
                    x-transition:leave-end="tw-opacity-0">
        {{-- Added prefixes --}}
        <div class="tw-absolute tw-inset-0 tw-bg-gray-500 tw-opacity-75"></div>
    </div>

    {{-- Added prefixes to static classes. $maxWidth variable already contains prefixed class. --}}
    <div x-show="show" class="tw-mb-6 tw-bg-white tw-rounded-lg tw-overflow-hidden tw-shadow-xl tw-transform tw-transition-all sm:tw-w-full {{ $maxWidth }} sm:tw-mx-auto"
                    x-trap.inert.noscroll="show"
                     {{-- Added prefixes to Alpine transitions --}}
                    x-transition:enter="tw-ease-out tw-duration-300"
                    x-transition:enter-start="tw-opacity-0 tw-translate-y-4 sm:tw-translate-y-0 sm:tw-scale-95"
                    x-transition:enter-end="tw-opacity-100 tw-translate-y-0 sm:tw-scale-100"
                    x-transition:leave="tw-ease-in tw-duration-200"
                    x-transition:leave-start="tw-opacity-100 tw-translate-y-0 sm:tw-scale-100"
                    x-transition:leave-end="tw-opacity-0 tw-translate-y-4 sm:tw-translate-y-0 sm:tw-scale-95">
        {{ $slot }}
    </div>
</div>