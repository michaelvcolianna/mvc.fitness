<x-guest-layout>
    <x-authentication-card>
        <x-slot:logo>
            <x-authentication-card-logo />
        </x-slot:logo>

        <div x-data="{ recovery: false }">
            <div x-show="! recovery">
                <x-auth.note
                    >Please confirm access to your account by entering the
                    authentication code provided by your authenticator
                    application.</x-auth.note>
            </div>

            <div x-cloak x-show="recovery">
                <x-auth.note
                    >Please confirm access to your account by entering one of
                    your emergency recovery codes.</x-auth.note>
            </div>

            <x-validation-errors class="mb-4" />

            <x-auth.form method="POST" :action="route('two-factor.login')">
                <div x-show="! recovery">
                    <x-form.text
                        label="Code"
                        id="code"
                        type="text"
                        inputmode="numeric"
                        name="code"
                        autofocus
                        x-ref="code"
                        autocomplete="one-time-code"
                    />
                </div>

                <div x-cloak x-show="recovery">
                    <x-form.text
                        label="Recovery Code"
                        id="recovery_code"
                        type="text"
                        name="recovery_code"
                        x-ref="recovery_code"
                        autocomplete="one-time-code"
                    />
                </div>

                <x-auth.button-row>
                    <div
                        x-show="! recovery"
                        x-on:click="recovery = true;
                        $nextTick(() => { $refs.recovery_code.focus() });"
                    >
                        <x-auth.2fa-button
                            >Use a recovery code</x-auth.2fa-button>
                    </div>

                    <div
                        x-cloak
                        x-show="recovery"
                        x-on:click="recovery = false;
                        $nextTick(() => { $refs.code.focus() });"
                    >
                        <x-auth.2fa-button
                            >Use an authentication code</x-auth.2fa-button>
                    </div>

                    <x-button class="ms-4">Log in</x-button>
                </x-auth.button-row>
            </x-auth.form>
        </div>
    </x-authentication-card>
</x-guest-layout>
