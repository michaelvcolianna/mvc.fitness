<x-action-section>
    <x-slot:title>Two Factor Authentication</x-slot:title>

    <x-slot:description
        >Add additional security to your account using two factor
        authentication.</x-slot:description>

    <x-slot:content>
        <x-heading.h3>
            @if ($this->enabled)
                @if ($showingConfirmation)
                    Finish enabling two factor authentication.
                @else
                    You have enabled two factor authentication.
                @endif
            @else
                You have not enabled two factor authentication.
            @endif
        </x-heading.h3>

        <div class="mt-3 max-w-xl text-sm text-gray-600">
            <p>When two factor authentication is enabled, you will be prompted
                for a secure, random token during authentication. You may
                retrieve this token from your phone's Google Authenticator
                application.</p>
        </div>

        @if ($this->enabled)
            @if ($showingQrCode)
                <div class="mt-4 max-w-xl text-sm text-gray-600">
                    <p class="font-semibold">
                        @if ($showingConfirmation)
                            To finish enabling two factor authentication, scan
                            the following QR code using your phone's
                            authenticator application or enter the setup key and
                            provide the generated OTP code.
                        @else
                            Two factor authentication is now enabled. Scan the
                            following QR code using your phone's authenticator
                            application or enter the setup key.
                        @endif
                    </p>
                </div>

                <div class="mt-4 p-2 inline-block bg-white">
                    {!! $this->user->twoFactorQrCodeSvg() !!}
                </div>

                <div class="mt-4 max-w-xl text-sm text-gray-600">
                    <p class="font-semibold">
                        Setup Key: {{ decrypt($this->user->two_factor_secret) }}
                    </p>
                </div>

                @if ($showingConfirmation)
                    <div class="mt-4">
                        <x-label for="code" value="Code" />

                        <x-input id="code"
                            type="text"
                            name="code"
                            class="block mt-1 w-1/2"
                            inputmode="numeric"
                            autofocus
                            autocomplete="one-time-code"
                            wire:model="code"
                            wire:keydown.enter="confirmTwoFactorAuthentication"
                        />

                        <x-input-error for="code" class="mt-2" />
                    </div>
                @endif
            @endif

            @if ($showingRecoveryCodes)
                <div class="mt-4 max-w-xl text-sm text-gray-600">
                    <p class="font-semibold">Store these recovery codes in a
                        secure password manager. They can be used to recover
                        access to your account if your two factor authentication
                        device is lost.</p>
                </div>

                <div class="grid gap-1 max-w-xl mt-4 px-4 py-4 font-mono text-sm
                bg-gray-100 rounded-lg">
                    @foreach (json_decode(decrypt($this->user->two_factor_recovery_codes), true) as $code)
                        <div>{{ $code }}</div>
                    @endforeach
                </div>
            @endif
        @endif

        <div class="mt-5">
            @if (! $this->enabled)
                <x-confirms-password wire:then="enableTwoFactorAuthentication">
                    <x-button type="button"
                        wire:loading.attr="disabled">Enable</x-button>
                </x-confirms-password>
            @else
                @if ($showingRecoveryCodes)
                    <x-confirms-password wire:then="regenerateRecoveryCodes">
                        <x-secondary-button class="me-3"
                            >Regenerate Recovery Codes</x-secondary-button>
                    </x-confirms-password>
                @elseif ($showingConfirmation)
                    <x-confirms-password wire:then="confirmTwoFactorAuthentication">
                        <x-button type="button"
                            class="me-3"
                            wire:loading.attr="disabled">Confirm</x-button>
                    </x-confirms-password>
                @else
                    <x-confirms-password wire:then="showRecoveryCodes">
                        <x-secondary-button class="me-3"
                            >Show Recovery Codes</x-secondary-button>
                    </x-confirms-password>
                @endif

                @if ($showingConfirmation)
                    <x-confirms-password wire:then="disableTwoFactorAuthentication">
                        <x-secondary-button wire:loading.attr="disabled"
                            >Cancel</x-secondary-button>
                    </x-confirms-password>
                @else
                    <x-confirms-password wire:then="disableTwoFactorAuthentication">
                        <x-danger-button wire:loading.attr="disabled"
                            >Disable</x-danger-button>
                    </x-confirms-password>
                @endif

            @endif
        </div>
    </x-slot:content>
</x-action-section>
