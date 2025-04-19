<x-app-layout>
    <x-slot name="header">
        {{-- Added prefixes --}}
        <h2 class="tw-font-semibold tw-text-xl tw-text-gray-800 tw-leading-tight">
            {{ __('API Tokens') }}
        </h2>
    </x-slot>

    <div>
        {{-- Added prefixes --}}
        <div class="tw-max-w-7xl tw-mx-auto tw-py-10 sm:tw-px-6 lg:tw-px-8">
            {{-- The Livewire component 'api.api-token-manager' needs its internal Blade view classes prefixed separately --}}
            @livewire('api.api-token-manager')
        </div>
    </div>
</x-app-layout>