<x-layout.layout :livewire_enable="true">
    <x-slot:title>
        Codecs | Inventory of Datasets
    </x-slot:title>
    <x-slot:keywords>
        Codecs, Inventory, Datasets, agriculture, digitalization
    </x-slot:keywords>
    <x-slot:description>
        Codecs | Inventory of Datasets, A structured digital repository for CODECS datasets
    </x-slot:description>

    <x-slot:hero_section>
        <x-layout.hero_simple>
            <x-slot:current_view>
                Inventory of Datasets
            </x-slot:current_view>
        </x-layout.hero_simple>
    </x-slot:hero_section>

    <x-slot:main_body>
        <div class="container pt-3 pb-2">

            <div class="row pt-2">
{{--                @livewire('meta-inventory-filters')--}}
                <div class="col-lg-9">
                    @livewire('meta-inventory-search')
                    @livewire('dataset-inventory.datasets-inventory-list')

                </div>

            </div>

        </div>


    </x-slot:main_body>


</x-layout.layout>
