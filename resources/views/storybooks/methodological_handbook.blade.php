<x-layout.layout :livewire_enable="true">
    <x-slot:title>
        Codecs | Methodological Handbook
    </x-slot:title>
    <x-slot:keywords>
        Codecs, Methodological Handbook, agriculture, digitalization, tools
    </x-slot:keywords>
    <x-slot:description>
        Codecs | Methodological Handbook
    </x-slot:description>

    <x-slot:hero_section>
        <x-layout.hero_simple>
            <x-slot:current_view>
                Methodological Handbook
            </x-slot:current_view>
        </x-layout.hero_simple>
    </x-slot:hero_section>

    <x-slot:main_body>
        <div class="container py-4 mt-4 mb-5">
            <div class="d-flex w-100 flex-column flex-md-row align-items-center justify-content-center gap-5 mb-5">
                <iframe id="storybook-iframe" allowfullscreen="allowfullscreen" scrolling="no" class="fp-iframe"
                        src="https://heyzine.com/flip-book/4f0a0cc8d6.html"
                        style="border: 1px solid lightgray; width: 100%; height: 800px;"></iframe>
            </div>
        </div>
    </x-slot:main_body>
</x-layout.layout>
