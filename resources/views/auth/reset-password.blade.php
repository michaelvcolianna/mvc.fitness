<x-guest-layout>
    <x-authentication-card>
        <x-slot:logo>
            <x-authentication-card-logo />
        </x-slot:logo>

        <x-validation-errors class="mb-4" />

        <x-auth.form method="POST" :action="route('password.update')">
            <input
                type="hidden"
                name="token"
                value="{{ $request->route('token') }}"
            />

            <x-form.text
                label="Email"
                id="email"
                type="email"
                name="email"
                :value="old('email', $request->email)"
                required
                autofocus
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

            <x-auth.button-row>
                <x-button>Reset Password</x-button>
            </x-auth.button-row>
        </x-auth.password>
    </x-authentication-card>
</x-guest-layout>
