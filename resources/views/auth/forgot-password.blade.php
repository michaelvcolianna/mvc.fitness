<x-guest-layout>
    <x-authentication-card>
        <x-slot:logo>
            <x-authentication-card-logo />
        </x-slot:logo>

        <x-auth.note
            >Forgot your password? No problem. Just let us know your email
            address and we will email you a password reset link that will allow
            you to choose a new one.</x-auth.note>

        @session('status')
            <x-auth.status>{{ $value }}</x-auth.status>
        @endsession

        <x-validation-errors class="mb-4" />

        <x-auth.form method="POST" :action="route('password.email')">
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

            <x-auth.button-row>
                <x-button>Email Password Reset Link</x-button>
            </x-auth.button-row>
        </x-auth.form>
    </x-authentication-card>
</x-guest-layout>
