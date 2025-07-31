<x-guest-layout>
    <x-authentication-card>
        <x-slot:logo>
            <x-authentication-card-logo />
        </x-slot:logo>

        <x-auth.note
            >Before continuing, could you verify your email address by clicking
            on the link we just emailed to you? If you didn't receive the email,
            we will gladly send you another.</x-auth.note>

        @if (session('status') == 'verification-link-sent')
            <x-auth.status
                >A new verification link has been sent to the email address you
                provided in your profile settings.</x-auth.status>
        @endif

        <div class="mt-4 flex items-center justify-between">
            <x-auth.form method="POST" :action="route('verification.send')">
                <div>
                    <x-button type="submit">Resend Verification Email</x-button>
                </div>
            </x-auth.form>

            <div>
                <x-auth.link :href="route('profile.show')"
                    >Edit Profile</x-auth.link>

                <div class="inline">
                    <x-auth.form method="POST" :action="route('logout')">
                        <button
                            type="submit"
                            class="underline text-sm text-gray-600
                            hover:text-gray-900 rounded-md focus:outline-none
                            focus:ring-2 focus:ring-offset-2
                            focus:ring-sky-500 ms-2"
                            >Log Out</button>
                </form>
            </div>
        </div>
    </x-authentication-card>
</x-guest-layout>
