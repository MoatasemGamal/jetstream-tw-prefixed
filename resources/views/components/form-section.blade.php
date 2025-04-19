@props(['submit'])

{{-- Added prefixes within merge --}}
<div {{ $attributes->merge(['class' => 'md:tw-grid md:tw-grid-cols-3 md:tw-gap-6']) }}>
    {{-- x-section-title component needs its internal classes prefixed separately --}}
    <x-section-title>
        <x-slot name="title">{{ $title }}</x-slot>
        <x-slot name="description">{{ $description }}</x-slot>
    </x-section-title>

    {{-- Added prefixes --}}
    <div class="tw-mt-5 md:tw-mt-0 md:tw-col-span-2">
        <form wire:submit="{{ $submit }}">
            {{-- Added prefixes to static classes and within the conditional --}}
            <div class="tw-px-4 tw-py-5 tw-bg-white sm:tw-p-6 tw-shadow {{ isset($actions) ? 'sm:tw-rounded-tl-md sm:tw-rounded-tr-md' : 'sm:tw-rounded-md' }}">
                {{-- Added prefixes --}}
                <div class="tw-grid tw-grid-cols-6 tw-gap-6">
                    {{ $form }}
                </div>
            </div>

            @if (isset($actions))
                {{-- Added prefixes --}}
                <div class="tw-flex tw-items-center tw-justify-end tw-px-4 tw-py-3 tw-bg-gray-50 tw-text-end sm:tw-px-6 tw-shadow sm:tw-rounded-bl-md sm:tw-rounded-br-md">
                    {{ $actions }}
                </div>
            @endif
        </form>
    </div>
</div>