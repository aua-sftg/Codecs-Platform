<x-layout.layout :livewire_enable="true">
    <x-slot:title>
        Codecs | Meta-Inventory / {{ $scenario->name }}
    </x-slot:title>
    <x-slot:keywords>
        Codecs, meta-inventory, {{ $scenario->name }}
    </x-slot:keywords>
    <x-slot:description>
        Codecs | Meta-Inventory / {{ $scenario->name }}
    </x-slot:description>

    <x-slot:hero_section>
        <x-layout.hero_simple>
            <x-slot:current_view>
                Meta-inventory / {{ $scenario->name }}
            </x-slot:current_view>
        </x-layout.hero_simple>
    </x-slot:hero_section>

    <x-slot:main_body>
        <div class="container pt-3 pb-2">

            <div class="row pt-2">
                @livewire('meta-inventory-filters')
                <div class="col-lg-9">
                    @livewire('meta-inventory-search')
                    @livewire('meta-inventory-list', ['scenario' => $scenario])

                </div>

            </div>

        </div>


    </x-slot:main_body>


</x-layout.layout>
