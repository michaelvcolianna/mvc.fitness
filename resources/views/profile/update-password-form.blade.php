<x-form-section submit="updatePassword">
    <x-slot:title>Update Password</x-slot:title>

    <x-slot:description
        >Ensure your account is using a long, random password to stay
        secure.</x-slot:description>

    <x-slot:form>
        <div class="col-span-6 sm:col-span-4">
            <x-label for="current_password" value="Current Password" />

            <x-input id="current_password"
                type="password"
                class="mt-1 block w-full"
                wire:model="state.current_password"
                autocomplete="current-password"
            />

            <x-input-error for="current_password" class="mt-2" />
        </div>

        <div class="col-span-6 sm:col-span-4">
            <x-label for="password" value="New Password" />

            <x-input id="password"
                type="password"
                class="mt-1 block w-full"
                wire:model="state.password"
                autocomplete="new-password"
            />

            <x-input-error for="password" class="mt-2" />
        </div>

        <div class="col-span-6 sm:col-span-4">
            <x-label for="password_confirmation" value="Confirm Password" />

            <x-input id="password_confirmation"
                type="password"
                class="mt-1 block w-full"
                wire:model="state.password_confirmation"
                autocomplete="new-password"
            />

            <x-input-error for="password_confirmation" class="mt-2" />
        </div>
    </x-slot:form>

    <x-slot:actions>
        <x-action-message class="me-3" on="saved">Saved.</x-action-message>

        <x-button>Save</x-button>
    </x-slot:actions>
</x-form-section>
