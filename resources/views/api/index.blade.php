<x-app-layout>
    <x-slot:header>
        <x-heading.h2>API Tokens</x-heading.h2>
    </x-slot:header>

    <div>
        <div class="max-w-7xl mx-auto py-10 sm:px-6 lg:px-8">
            @livewire('api.api-token-manager')
        </div>
    </div>
</x-app-layout>
