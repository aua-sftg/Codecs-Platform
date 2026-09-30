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
                <div class="col-md-6 col-lg-3 mb-5 mb-lg-0 shadow p-3">
                    @include('profile.partials.sidebar')
                </div>
                <div class="col-md-6 col-lg-9 mb-5 mb-lg-0">
                    <livewire:dataset-inventory.archive />
                </div>
            </div>
        </div>
    </x-slot:main_body>


</x-layout.layout>
