<x-layout.layout :livewire_enable="true">
    <x-slot:title>
        Codecs | Virtual Tours
    </x-slot:title>
    <x-slot:keywords>
        Codecs, Inventory, Virtual Tours, agriculture, digitalization
    </x-slot:keywords>
    <x-slot:description>
        Codecs | Virtual Tours, A structured digital repository for CODECS Virtual Tours
    </x-slot:description>

    <x-slot:hero_section>
        <x-layout.hero_simple>
            <x-slot:current_view>
                Virtual Tours
            </x-slot:current_view>
        </x-layout.hero_simple>
    </x-slot:hero_section>

    <x-slot:main_body>
        <div class="container py-4 mt-4 mb-5">
            <div class="row">
                <div class="col">
                    <div class="products product-thumb-info-list" data-plugin-masonry data-plugin-options="{'layoutMode': 'fitRows'}">
                        @forelse(App\Logic\VirtualToursHelper::get_tools() as $tool)
                            <div class="column">
                                @php
                                    $imageUrl = $tool->image ? Storage::disk('virtualtours')->url($tool->image) : null;
                                @endphp
                                <x-virtualtours.virtual_tours_card :dataset="$tool" :image="$imageUrl">

                                </x-virtualtours.virtual_tours_card>
                                <div class="col">
                                    <hr class="my-4">
                                </div>
                            </div>
                        @empty
                            <div class="w-100 text-center">
                                <img src="{{ asset('img/undraw_loading_re_5axr.svg') }}" alt="No results found" class="w-100" style="max-width: 300px"/>
                                <p class="mb-0">No virtual tours found.</p>
                            </div>
                        @endforelse
                    </div>
                </div>
            </div>
        </div>
    </x-slot:main_body>


</x-layout.layout>
