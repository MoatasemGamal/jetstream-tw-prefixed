<x-guest-layout>
    {{-- Added prefixes --}}
    <div class="tw-pt-4 tw-bg-gray-100">
        {{-- Added prefixes --}}
        <div class="tw-min-h-screen tw-flex tw-flex-col tw-items-center tw-pt-6 sm:tw-pt-0">
            <div>
                {{-- x-authentication-card-logo component needs its internal classes prefixed separately --}}
                <x-authentication-card-logo />
            </div>

            {{-- Added prefixes, including 'prose' --}}
            <div
                class="tw-w-full sm:tw-max-w-2xl tw-mt-6 tw-p-6 tw-bg-white tw-shadow-md tw-overflow-hidden sm:tw-rounded-lg tw-prose">
                {!! $policy !!}
            </div>
        </div>
    </div>
</x-guest-layout>