@props(['id' => null, 'maxWidth' => null])

{{-- x-modal component needs its internal classes prefixed separately --}}
<x-modal :id="$id" :maxWidth="$maxWidth" {{ $attributes }}>
    {{-- Added prefixes --}}
    <div class="tw-px-6 tw-py-4">
        {{-- Added prefixes --}}
        <div class="tw-text-lg tw-font-medium tw-text-gray-900">
            {{ $title }}
        </div>

        {{-- Added prefixes --}}
        <div class="tw-mt-4 tw-text-sm tw-text-gray-600">
            {{ $content }}
        </div>
    </div>

    {{-- Added prefixes --}}
    <div class="tw-flex tw-flex-row tw-justify-end tw-px-6 tw-py-4 tw-bg-gray-100 tw-text-end">
        {{ $footer }}
    </div>
</x-modal>