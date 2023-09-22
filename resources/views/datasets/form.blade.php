<x-layout.layout :livewire_enable="true">
    <x-slot:title>
        Codecs | Meta-Inventory
    </x-slot:title>
    <x-slot:keywords>
        Codecs, meta-inventory
    </x-slot:keywords>
    <x-slot:description>
        Codecs | Meta-Inventory
    </x-slot:description>

    <x-slot:hero_section>
        <x-layout.hero_simple>
            <x-slot:current_view>
                {{auth()->user()->name.' '. __('Datasets') }}
            </x-slot:current_view>
        </x-layout.hero_simple>
    </x-slot:hero_section>

    <x-slot:main_body>
        <div class="container py-4">
            <div class="row ">
                <div class="col-md-12 col-lg-12 mb-5 mb-lg-0">
                    <livewire:dataset-inventory.upload-form />
                </div>
            </div>
        </div>
    </x-slot:main_body>


    <x-slot:head_scripts>
        <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
    </x-slot:head_scripts>

    <x-slot:body_scripts>
        <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>
    </x-slot:body_scripts>


</x-layout.layout>
