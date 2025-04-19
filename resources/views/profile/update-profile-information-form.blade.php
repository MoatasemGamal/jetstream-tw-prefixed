<x-form-section submit="updateProfileInformation">
    <x-slot name="title">
        {{ __('Profile Information') }}
    </x-slot>

    <x-slot name="description">
        {{ __('Update your account\'s profile information and email address.') }}
    </x-slot>

    <x-slot name="form">
        <!-- Profile Photo -->
        @if (Laravel\Jetstream\Jetstream::managesProfilePhotos())
        {{-- Added prefixes to wrapper div --}}
        <div x-data="{photoName: null, photoPreview: null}" class="tw-col-span-6 sm:tw-col-span-4">
            <!-- Profile Photo File Input -->
            {{-- Added prefix to input --}}
            <input type="file" id="photo" class="tw-hidden" wire:model.live="photo" x-ref="photo" x-on:change="
                                    photoName = $refs.photo.files[0].name;
                                    const reader = new FileReader();
                                    reader.onload = (e) => {
                                        photoPreview = e.target.result;
                                    };
                                    reader.readAsDataURL($refs.photo.files[0]);
                            " />

            {{-- x-label component needs its internal classes prefixed separately --}}
            <x-label for="photo" value="{{ __('Photo') }}" />

            <!-- Current Profile Photo -->
            {{-- Added prefix to wrapper div --}}
            <div class="tw-mt-2" x-show="! photoPreview">
                {{-- Added prefixes to img --}}
                <img src="{{ $this->user->profile_photo_url }}" alt="{{ $this->user->name }}"
                    class="tw-rounded-full tw-size-20 tw-object-cover">
            </div>

            <!-- New Profile Photo Preview -->
            {{-- Added prefix to wrapper div --}}
            <div class="tw-mt-2" x-show="photoPreview" style="display: none;">
                {{-- Added prefixes to span --}}
                <span class="tw-block tw-rounded-full tw-size-20 tw-bg-cover tw-bg-no-repeat tw-bg-center"
                    x-bind:style="'background-image: url(\'' + photoPreview + '\');'">
                </span>
            </div>

            {{-- Added prefix to button wrapper class AND x-secondary-button needs internal prefixing --}}
            <x-secondary-button class="tw-mt-2 tw-me-2" type="button" x-on:click.prevent="$refs.photo.click()">
                {{ __('Select A New Photo') }}
            </x-secondary-button>

            @if ($this->user->profile_photo_path)
            {{-- Added prefix to button wrapper class AND x-secondary-button needs internal prefixing --}}
            <x-secondary-button type="button" class="tw-mt-2" wire:click="deleteProfilePhoto">
                {{ __('Remove Photo') }}
            </x-secondary-button>
            @endif

            {{-- Added prefix to error wrapper class AND x-input-error needs internal prefixing --}}
            <x-input-error for="photo" class="tw-mt-2" />
        </div>
        @endif

        <!-- Name -->
        {{-- Added prefixes to wrapper div --}}
        <div class="tw-col-span-6 sm:tw-col-span-4">
            {{-- x-label component needs its internal classes prefixed separately --}}
            <x-label for="name" value="{{ __('Name') }}" />
            {{-- Added prefixes to input wrapper class AND x-input needs internal prefixing --}}
            <x-input id="name" type="text" class="tw-mt-1 tw-block tw-w-full" wire:model="state.name" required
                autocomplete="name" />
            {{-- Added prefix to error wrapper class AND x-input-error needs internal prefixing --}}
            <x-input-error for="name" class="tw-mt-2" />
        </div>

        <!-- Email -->
        {{-- Added prefixes to wrapper div --}}
        <div class="tw-col-span-6 sm:tw-col-span-4">
            {{-- x-label component needs its internal classes prefixed separately --}}
            <x-label for="email" value="{{ __('Email') }}" />
            {{-- Added prefixes to input wrapper class AND x-input needs internal prefixing --}}
            <x-input id="email" type="email" class="tw-mt-1 tw-block tw-w-full" wire:model="state.email" required
                autocomplete="username" />
            {{-- Added prefix to error wrapper class AND x-input-error needs internal prefixing --}}
            <x-input-error for="email" class="tw-mt-2" />

            @if (Laravel\Fortify\Features::enabled(Laravel\Fortify\Features::emailVerification()) && !
            $this->user->hasVerifiedEmail())
            {{-- Added prefixes to paragraph --}}
            <p class="tw-text-sm tw-mt-2">
                {{ __('Your email address is unverified.') }}

                {{-- Added prefixes to button --}}
                <button type="button"
                    class="tw-underline tw-text-sm tw-text-gray-600 hover:tw-text-gray-900 tw-rounded-md focus:tw-outline-none focus:tw-ring-2 focus:tw-ring-offset-2 focus:tw-ring-indigo-500"
                    wire:click.prevent="sendEmailVerification">
                    {{ __('Click here to re-send the verification email.') }}
                </button>
            </p>

            @if ($this->verificationLinkSent)
            {{-- Added prefixes to paragraph --}}
            <p class="tw-mt-2 tw-font-medium tw-text-sm tw-text-green-600">
                {{ __('A new verification link has been sent to your email address.') }}
            </p>
            @endif
            @endif
        </div>
    </x-slot>

    <x-slot name="actions">
        {{-- Added prefix to message wrapper class AND x-action-message needs internal prefixing --}}
        <x-action-message class="tw-me-3" on="saved">
            {{ __('Saved.') }}
        </x-action-message>

        {{-- x-button component needs its internal classes prefixed separately --}}
        <x-button wire:loading.attr="disabled" wire:target="photo">
            {{ __('Save') }}
        </x-button>
    </x-slot>
</x-form-section>