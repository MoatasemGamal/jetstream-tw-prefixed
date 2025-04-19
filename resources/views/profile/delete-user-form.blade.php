{{-- x-action-section component needs its internal classes prefixed separately --}}
<x-action-section>
    <x-slot name="title">
        {{ __('Delete Account') }}
    </x-slot>

    <x-slot name="description">
        {{ __('Permanently delete your account.') }}
    </x-slot>

    <x-slot name="content">
        {{-- Added prefixes --}}
        <div class="tw-max-w-xl tw-text-sm tw-text-gray-600">
            {{ __('Once your account is deleted, all of its resources and data will be permanently deleted. Before deleting your account, please download any data or information that you wish to retain.') }}
        </div>

        {{-- Added prefix --}}
        <div class="tw-mt-5">
            {{-- x-danger-button component needs its internal classes prefixed separately --}}
            <x-danger-button wire:click="confirmUserDeletion" wire:loading.attr="disabled">
                {{ __('Delete Account') }}
            </x-danger-button>
        </div>

        <!-- Delete User Confirmation Modal -->
        {{-- x-dialog-modal component needs its internal classes prefixed separately --}}
        <x-dialog-modal wire:model.live="confirmingUserDeletion">
            <x-slot name="title">
                {{ __('Delete Account') }}
            </x-slot>

            <x-slot name="content">
                {{ __('Are you sure you want to delete your account? Once your account is deleted, all of its resources and data will be permanently deleted. Please enter your password to confirm you would like to permanently delete your account.') }}

                {{-- Added prefix --}}
                <div class="tw-mt-4" x-data="{}" x-on:confirming-delete-user.window="setTimeout(() => $refs.password.focus(), 250)">
                    {{-- Added prefixes to wrapper class AND x-input needs internal prefixing --}}
                    <x-input type="password" class="tw-mt-1 tw-block tw-w-3/4"
                                autocomplete="current-password"
                                placeholder="{{ __('Password') }}"
                                x-ref="password"
                                wire:model="password"
                                wire:keydown.enter="deleteUser" />

                    {{-- Added prefix to wrapper class AND x-input-error needs internal prefixing --}}
                    <x-input-error for="password" class="tw-mt-2" />
                </div>
            </x-slot>

            <x-slot name="footer">
                {{-- x-secondary-button component needs its internal classes prefixed separately --}}
                <x-secondary-button wire:click="$toggle('confirmingUserDeletion')" wire:loading.attr="disabled">
                    {{ __('Cancel') }}
                </x-secondary-button>

                {{-- Added prefix to wrapper class AND x-danger-button needs internal prefixing --}}
                <x-danger-button class="tw-ms-3" wire:click="deleteUser" wire:loading.attr="disabled">
                    {{ __('Delete Account') }}
                </x-danger-button>
            </x-slot>
        </x-dialog-modal>
    </x-slot>
</x-action-section>