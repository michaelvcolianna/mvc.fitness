<div>
    <!-- Generate API Token -->
    <x-form-section submit="createApiToken">
        <x-slot:title>Create API Token</x-slot:title>

        <x-slot:description
            >API tokens allow third-party services to authenticate with our
            application on your behalf.</x-slot:description>

        <x-slot:form>
            <!-- Token Name -->
            <div class="col-span-6 sm:col-span-4">
                <x-label for="name" value="Token Name" />

                <x-input
                    id="name"
                    type="text"
                    class="mt-1 block w-full"
                    wire:model="createApiTokenForm.name"
                    autofocus
                />

                <x-input-error for="name" class="mt-2" />
            </div>

            <!-- Token Permissions -->
            @if (Laravel\Jetstream\Jetstream::hasPermissions())
                <div class="col-span-6">
                    <x-label for="permissions" value="Permissions" />

                    <div class="mt-2 grid grid-cols-1 md:grid-cols-2 gap-4">
                        @foreach (Laravel\Jetstream\Jetstream::$permissions as $permission)
                            <label class="flex items-center">
                                <x-checkbox
                                    wire:model="createApiTokenForm.permissions"
                                    :value="$permission"
                                />

                                <x-auth.label>{{ $permission }}</x-auth.label>
                            </label>
                        @endforeach
                    </div>
                </div>
            @endif
        </x-slot:form>

        <x-slot:actions>
            <x-action-message class="me-3" on="created"
                >Created.</x-action-message>

            <x-button>Create</x-button>
        </x-slot:actions>
    </x-form-section>

    @if ($this->user->tokens->isNotEmpty())
        <x-section-border />

        <!-- Manage API Tokens -->
        <div class="mt-10 sm:mt-0">
            <x-action-section>
                <x-slot:title>Manage API Tokens</x-slot:title>

                <x-slot:description
                    >You may delete any of your existing tokens if they are no
                    longer needed.</x-slot:description>

                <!-- API Token List -->
                <x-slot:content>
                    <div class="space-y-6">
                        @foreach ($this->user->tokens->sortBy('name') as $token)
                            <div class="flex items-center justify-between">
                                <div class="break-all">{{ $token->name }}</div>

                                <div class="flex items-center ms-2">
                                    @if ($token->last_used_at)
                                        <div class="text-sm text-gray-400"
                                            >Last used
                                            {{ $token->last_used_at->diffForHumans() }}</div>
                                    @endif

                                    @if (Laravel\Jetstream\Jetstream::hasPermissions())
                                        <button
                                            class="cursor-pointer ms-6 text-sm
                                            text-gray-400 underline"
                                            wire:click="manageApiTokenPermissions({{ $token->id }})"
                                            >Permissions</button>
                                    @endif

                                    <button
                                        class="cursor-pointer ms-6 text-sm
                                        text-fuchsia-500"
                                        wire:click="confirmApiTokenDeletion({{ $token->id }})"
                                        >Delete</button>
                                </div>
                            </div>
                        @endforeach
                    </div>
                </x-slot:content>
            </x-action-section>
        </div>
    @endif

    <!-- Token Value Modal -->
    <x-dialog-modal wire:model.live="displayingToken">
        <x-slot:title>API Token</x-slot:title>

        <x-slot:content>
            <div
                >Please copy your new API token. For your security, it won't be
                shown again.</div>

            <x-input
                x-ref="plaintextToken"
                type="text"
                readonly
                :value="$plainTextToken"
                class="mt-4 bg-gray-100 px-4 py-2 rounded font-mono text-sm
                text-gray-500 w-full break-all"
                autofocus
                autocomplete="off"
                autocorrect="off"
                autocapitalize="off"
                spellcheck="false"
                @showing-token-modal.window="setTimeout(() => $refs.plaintextToken.select(), 250)"
            />
        </x-slot:content>

        <x-slot:footer>
            <x-secondary-button
                wire:click="$set('displayingToken', false)"
                wire:loading.attr="disabled">Close</x-secondary-button>
        </x-slot:footer>
    </x-dialog-modal>

    <!-- API Token Permissions Modal -->
    <x-dialog-modal wire:model.live="managingApiTokenPermissions">
        <x-slot:title>API Token Permissions</x-slot:title>

        <x-slot:content>
            <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                @foreach (Laravel\Jetstream\Jetstream::$permissions as $permission)
                    <label class="flex items-center">
                        <x-checkbox
                            wire:model="updateApiTokenForm.permissions"
                            :value="$permission"
                        />
                        <x-auth.label>{{ $permission }}</x-auth.label>
                    </label>
                @endforeach
            </div>
        </x-slot:content>

        <x-slot:footer>
            <x-secondary-button
                wire:click="$set('managingApiTokenPermissions', false)"
                wire:loading.attr="disabled"
                >Cancel</x-secondary-button>

            <x-button
                class="ms-3"
                wire:click="updateApiToken"
                wire:loading.attr="disabled"
                >Save</x-button>
        </x-slot:footer>
    </x-dialog-modal>

    <!-- Delete Token Confirmation Modal -->
    <x-confirmation-modal wire:model.live="confirmingApiTokenDeletion">
        <x-slot:title>Delete API Token</x-slot:title>

        <x-slot:content
            >Are you sure you would like to delete this API
            token?</x-slot:content>

        <x-slot:footer>
            <x-secondary-button
                wire:click="$toggle('confirmingApiTokenDeletion')"
                wire:loading.attr="disabled"
                >Cancel</x-secondary-button>

            <x-danger-button
                class="ms-3"
                wire:click="deleteApiToken"
                wire:loading.attr="disabled"
                >Delete</x-danger-button>
        </x-slot:footer>
    </x-confirmation-modal>
</div>
