<x-guest-layout>
    <x-authentication-card>
        <x-slot:logo>
            <x-authentication-card-logo />
        </x-slot:logo>

        <x-validation-errors class="mb-4" />

        @session('status')
            <x-auth.status>{{ $value }}</x-auth.status>
        @endsession

        <x-auth.form method="POST" :action="route('login')">
            <x-form.text
                label="Email"
                id="email"
                type="email"
                name="email"
                :value="old('email')"
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
                autocomplete="current-password"
            />

            <x-form.checkbox
                label="Remember me"
                id="remember_me"
                name="remember"
            />

            <x-auth.button-row>
                <x-auth.link :href="route('password.request')"
                    >Forgot your password?</x-auth.link>

                <x-button class="ms-4">Log in</x-button>
            </x-auth.button-row>
        </x-auth.form>
    </x-authentication-card>
</x-guest-layout>
