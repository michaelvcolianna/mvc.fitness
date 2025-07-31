<x-form-section submit="updateProfileInformation">
    <x-slot:title>Profile Information</x-slot:title>

    <x-slot:description
        >Update your account's profile information and email
        address.</x-slot:description>

    <x-slot:form>
        <!-- Profile Photo -->
        @if (Laravel\Jetstream\Jetstream::managesProfilePhotos())
            <div x-data="{ photoName: null, photoPreview: null }"
                class="col-span-6 sm:col-span-4">
                <!-- Profile Photo File Input -->
                <input type="file"
                    id="photo"
                    class="hidden"
                    wire:model.live="photo"
                    x-ref="photo"
                    x-on:change="photoName = $refs.photo.files[0].name;
                    const reader = new FileReader();
                    reader.onload = (e) => {
                        photoPreview = e.target.result;
                    };
                    reader.readAsDataURL($refs.photo.files[0]);"
                />

                <x-label for="photo" value="Photo" />

                <!-- Current Profile Photo -->
                <div class="mt-2" x-show="! photoPreview">
                    <img src="{{ $this->user->profile_photo_url }}"
                        alt="{{ $this->user->name }}"
                        class="rounded-full size-20 object-cover"
                    />
                </div>

                <!-- New Profile Photo Preview -->
                <div class="mt-2" x-show="photoPreview" style="display: none;">
                    <span class="block rounded-full size-20 bg-cover
                        bg-no-repeat bg-center"
                        x-bind:style="'background-image: url(\'' + photoPreview + '\');'">
                    </span>
                </div>

                <x-secondary-button class="mt-2 me-2"
                    type="button"
                    x-on:click.prevent="$refs.photo.click()"
                    >Select A New Photo</x-secondary-button>

                @if ($this->user->profile_photo_path)
                    <x-secondary-button type="button"
                        class="mt-2"
                        wire:click="deleteProfilePhoto"
                        >Remove Photo</x-secondary-button>
                @endif

                <x-input-error for="photo" class="mt-2" />
            </div>
        @endif

        <!-- Name -->
        <div class="col-span-6 sm:col-span-4">
            <x-label for="name" value="Name" />

            <x-input id="name"
                type="text"
                class="mt-1 block w-full"
                wire:model="state.name"
                required
                autocomplete="name"
            />

            <x-input-error for="name" class="mt-2" />
        </div>

        <!-- Email -->
        <div class="col-span-6 sm:col-span-4">
            <x-label for="email" value="Email" />

            <x-input id="email"
                type="email"
                class="mt-1 block w-full"
                wire:model="state.email"
                required
                autocomplete="username"
            />

            <x-input-error for="email" class="mt-2" />

            @if (Laravel\Fortify\Features::enabled(Laravel\Fortify\Features::emailVerification()) && ! $this->user->hasVerifiedEmail())
                <p class="text-sm mt-2">
                    Your email address is unverified.

                    <button type="button"
                        class="underline text-sm text-gray-600
                        hover:text-gray-900 rounded-md focus:outline-none
                        focus:ring-2 focus:ring-offset-2 focus:ring-sky-500"
                        wire:click.prevent="sendEmailVerification"
                        >Click here to re-send the verification email.</button>
                </p>

                @if ($this->verificationLinkSent)
                    <p class="mt-2 font-medium text-sm text-green-600"
                        >A new verification link has been sent to your email
                        address.</p>
                @endif
            @endif
        </div>
    </x-slot:form>

    <x-slot:actions>
        <x-action-message class="me-3" on="saved">Saved.</x-action-message>

        <x-button wire:loading.attr="disabled"
            wire:target="photo">Save</x-button>
    </x-slot:actions>
</x-form-section>
