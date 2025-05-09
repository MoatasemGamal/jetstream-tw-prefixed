@props(['active'])

@php
$classes = ($active ?? false)
            // Prefixed classes for the 'active' state
            ? 'tw-block tw-w-full tw-ps-3 tw-pe-4 tw-py-2 tw-border-l-4 tw-border-indigo-400 tw-text-start tw-text-base tw-font-medium tw-text-indigo-700 tw-bg-indigo-50 focus:tw-outline-none focus:tw-text-indigo-800 focus:tw-bg-indigo-100 focus:tw-border-indigo-700 tw-transition tw-duration-150 tw-ease-in-out'
            // Prefixed classes for the 'inactive' state
            : 'tw-block tw-w-full tw-ps-3 tw-pe-4 tw-py-2 tw-border-l-4 tw-border-transparent tw-text-start tw-text-base tw-font-medium tw-text-gray-600 hover:tw-text-gray-800 hover:tw-bg-gray-50 hover:tw-border-gray-300 focus:tw-outline-none focus:tw-text-gray-800 focus:tw-bg-gray-50 focus:tw-border-gray-300 tw-transition tw-duration-150 tw-ease-in-out';
@endphp

<a {{ $attributes->merge(['class' => $classes]) }}>
    {{ $slot }}
</a>