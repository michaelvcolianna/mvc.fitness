<x-guest-layout>
    <x-authentication-card>
        <x-slot:logo>
            <x-authentication-card-logo />
        </x-slot:logo>

        <x-auth.note
            >This is a secure area of the application. Please confirm your
            password before continuing.</x-auth.note>

        <x-validation-errors class="mb-4" />

        <x-auth.form method="POST" :action="{{ route('password.confirm') }}">
            <x-form.text
                label="Password"
                id="password"
                type="password"
                name="password"
                required
                autocomplete="current-password"
                autofocus
            />

            <div class="flex justify-end mt-4">
                <x-button class="ms-4">Confirm</x-button>
            </div>
        </x-auth.form>
    </x-authentication-card>
</x-guest-layout>
