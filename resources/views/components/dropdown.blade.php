@props(['align' => 'right', 'width' => '48', 'contentClasses' => 'tw-py-1 tw-bg-white', 'dropdownClasses' => '']) {{-- Prefixed default contentClasses --}}

@php
// Prefixed classes within the match expression
$alignmentClasses = match ($align) {
    'left' => 'ltr:tw-origin-top-left rtl:tw-origin-top-right tw-start-0',
    'top' => 'tw-origin-top',
    'none', 'false' => '',
    default => 'ltr:tw-origin-top-right rtl:tw-origin-top-left tw-end-0',
};

// Prefixed classes within the match expression
$width = match ($width) {
    '48' => 'tw-w-48',
    '60' => 'tw-w-60',
    default => 'tw-w-48', // Default also prefixed
};
@endphp

{{-- Added prefix --}}
<div class="tw-relative" x-data="{ open: false }" @click.away="open = false" @close.stop="open = false">
    <div @click="open = ! open">
        {{ $trigger }}
    </div>

    <div x-show="open"
            x-transition:enter="tw-transition tw-ease-out tw-duration-200"
            x-transition:enter-start="tw-transform tw-opacity-0 tw-scale-95"
            x-transition:enter-end="tw-transform tw-opacity-100 tw-scale-100"
            x-transition:leave="tw-transition tw-ease-in tw-duration-75"
            x-transition:leave-start="tw-transform tw-opacity-100 tw-scale-100"
            x-transition:leave-end="tw-transform tw-opacity-0 tw-scale-95"
             {{-- Added prefixes to static classes. Variables $width and $alignmentClasses now contain prefixed classes. $dropdownClasses should be passed with prefixes. --}}
            class="tw-absolute tw-z-50 tw-mt-2 {{ $width }} tw-rounded-md tw-shadow-lg {{ $alignmentClasses }} {{ $dropdownClasses }}"
            style="display: none;"
            @click="open = false">
         {{-- Added prefixes to static classes. $contentClasses has a prefixed default or should be passed with prefixes. --}}
        <div class="tw-rounded-md tw-ring-1 tw-ring-black tw-ring-opacity-5 {{ $contentClasses }}">
            {{ $content }}
        </div>
    </div>
</div>