@props(['style' => session('flash.bannerStyle', 'success'), 'message' => session('flash.banner')])

<div x-data="{{ json_encode(['show' => true, 'style' => $style, 'message' => $message]) }}"
    {{-- Prefixed classes in :class object keys --}}
    :class="{ 'tw-bg-indigo-500': style == 'success', 'tw-bg-red-700': style == 'danger', 'tw-bg-yellow-500': style == 'warning', 'tw-bg-gray-500': style != 'success' && style != 'danger' && style != 'warning'}"
            style="display: none;"
            x-show="show && message"
            x-on:banner-message.window="
                style = event.detail.style;
                message = event.detail.message;
                show = true;
            ">
    {{-- Prefixed static classes --}}
    <div class="tw-max-w-screen-xl tw-mx-auto tw-py-2 tw-px-3 sm:tw-px-6 lg:tw-px-8">
        {{-- Prefixed static classes --}}
        <div class="tw-flex tw-items-center tw-justify-between tw-flex-wrap">
            {{-- Prefixed static classes --}}
            <div class="tw-w-0 tw-flex-1 tw-flex tw-items-center tw-min-w-0">
                {{-- Prefixed static classes AND prefixed classes in :class object keys --}}
                <span class="tw-flex tw-p-2 tw-rounded-lg" :class="{ 'tw-bg-indigo-600': style == 'success', 'tw-bg-red-600': style == 'danger', 'tw-bg-yellow-600': style == 'warning' }">
                    {{-- Prefixed static classes on SVGs --}}
                    <svg x-show="style == 'success'" class="tw-size-5 tw-text-white" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M9 12.75L11.25 15 15 9.75M21 12a9 9 0 11-18 0 9 9 0 0118 0z" />
                    </svg>
                    <svg x-show="style == 'danger'" class="tw-size-5 tw-text-white" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M12 9v3.75m9-.75a9 9 0 11-18 0 9 9 0 0118 0zm-9 3.75h.008v.008H12v-.008z" />
                    </svg>
                    <svg x-show="style != 'success' && style != 'danger' && style != 'warning'" class="tw-size-5 tw-text-white" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M11.25 11.25l.041-.02a.75.75 0 011.063.852l-.708 2.836a.75.75 0 001.063.853l.041-.021M21 12a9 9 0 11-18 0 9 9 0 0118 0zm-9-3.75h.008v.008H12V8.25z" />
                    </svg>
                     <svg x-show="style == 'warning'" class="tw-size-5 tw-text-white" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor">
                        <circle cx="12" cy="12" r="10" stroke="currentColor" stroke-width="1.5" fill="none" />
                        <path stroke-linecap="round" stroke-linejoin="round" d="M12 8v4m0 4v.01 0 0 " />
                    </svg>
                </span>

                {{-- Prefixed static classes --}}
                <p class="tw-ms-3 tw-font-medium tw-text-sm tw-text-white tw-truncate" x-text="message"></p>
            </div>

            {{-- Prefixed static classes --}}
            <div class="tw-shrink-0 sm:tw-ms-3">
                <button
                    type="button"
                    {{-- Prefixed static classes (including negative margin) --}}
                    class="tw--me-1 tw-flex tw-p-2 tw-rounded-md focus:tw-outline-none sm:tw--me-2 tw-transition"
                    {{-- Prefixed classes in :class object keys (including modifiers like hover: and focus:) --}}
                    :class="{ 'hover:tw-bg-indigo-600 focus:tw-bg-indigo-600': style == 'success', 'hover:tw-bg-red-600 focus:tw-bg-red-600': style == 'danger', 'hover:tw-bg-yellow-600 focus:tw-bg-yellow-600': style == 'warning'}"
                    aria-label="Dismiss"
                    x-on:click="show = false">
                    {{-- Prefixed static classes on SVG --}}
                    <svg class="tw-size-5 tw-text-white" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M6 18L18 6M6 6l12 12" />
                    </svg>
                </button>
            </div>
        </div>
    </div>
</div>