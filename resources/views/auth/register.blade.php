<x-guest-layout>
    <x-authentication-card>
        <x-slot:logo>
            <x-authentication-card-logo />
        </x-slot:logo>

        <x-validation-errors class="mb-4" />

        <x-auth.form method="POST" :action="route('register')">
            <x-form.text
                label="Name"
                id="name"
                type="text"
                name="name"
                :value="old('name')"
                required
                autofocus
                autocomplete="name"
            />

            <x-form.text
                label="Email"
                id="email"
                type="email"
                name="email"
                :value="old('email')"
                required
                autocomplete="username"
            />

            <x-form.text
                label="Password"
                id="password"
                type="password"
                name="password"
                required
                autocomplete="new-password"
            />

            <x-form.text
                label="Confirm Password"
                id="password_confirmation"
                type="password"
                name="password_confirmation"
                required
                autocomplete="new-password"
            />

            <div>
                <x-label for="registration_key" value="Registration Key" />

                <x-input
                    id="registration_key"
                    class="block mt-1 w-full"
                    type="text"
                    name="registration_key"
                    required
                    autocomplete="one-time-code"
                />

                <div class="my-2 text-gray-600 text-xs leading-normal"
                    >Public registration is closed. Please provide the
                    registration key given to you by MVC.</div>
            </div>

            <x-auth.button-row>
                <x-auth.link :href="route('login')"
                    >Already registered?</x-auth.link>

                <x-button class="ms-4">Register</x-button>
            </x-auth.button-row>
        </x-auth.form>
    </x-authentication-card>
</x-guest-layout>
