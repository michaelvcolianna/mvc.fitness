<x-guest-layout>
    <x-layout.wrapper>
        <x-layout.section>
            <x-heading.h1>mvc.fitness</x-heading.h1>

            <x-paragraph.relaxed>
                Track workouts.
                <br>
                Track rest.
                <br>
                Track progress.
            </x-paragraph.relaxed>
        </x-layout.section>

        <x-layout.highlight>
            @if (Route::has('login'))
                <nav class="flex items-center justify-end gap-4">
                    <x-welcome.button label="Log in" :href="route('login')" />

                    <x-welcome.button
                        label="Register"
                        :href="route('register')"
                    />
                </nav>
            @endif
        </x-layout.highlight>
    </x-layout.wrapper>

    @if (Route::has('login'))
        <div class="h-14.5 hidden lg:block"></div>
    @endif
</x-guest-layout>
