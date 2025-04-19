{{-- Added prefixes (after md: modifier) --}}
<div class="md:tw-col-span-1 tw-flex tw-justify-between">
    {{-- Added prefixes (after sm: modifier) --}}
    <div class="tw-px-4 sm:tw-px-0">
        {{-- Added prefixes --}}
        <h3 class="tw-text-lg tw-font-medium tw-text-gray-900">{{ $title }}</h3>

        {{-- Added prefixes --}}
        <p class="tw-mt-1 tw-text-sm tw-text-gray-600">
            {{ $description }}
        </p>
    </div>

    {{-- Added prefixes (after sm: modifier) --}}
    <div class="tw-px-4 sm:tw-px-0">
        {{ $aside ?? '' }}
    </div>
</div>