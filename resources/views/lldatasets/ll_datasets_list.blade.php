<x-layout.layout :livewire_enable="true">
    <x-slot:title>
        Codecs | Meta-Inventory / LivingLab Datasets
    </x-slot:title>
    <x-slot:keywords>
        Codecs, meta-inventory, LivingLab Datasets
    </x-slot:keywords>
    <x-slot:description>
        Codecs | Meta-Inventory / Explore the digital technologies deployed in the CODECS Living Labs to deliver context-specific, applied services that support sustainable agricultural digitalisation
    </x-slot:description>

    <x-slot:hero_section>
        <x-layout.hero_simple>
            <x-slot:sub_section>
                <a role="button" href="{{route('meta_inventory_home')}}">Meta-Inventory</a>
            </x-slot:sub_section>
            <x-slot:current_view>
                LivingLab Datasets
            </x-slot:current_view>
        </x-layout.hero_simple>
    </x-slot:hero_section>

    <x-slot:main_body>
        <div class="container pt-3 pb-2">

            <div class="row pt-2">
                <div class="col-lg-12">
                    @forelse(App\Logic\LLDatasetHelper::get_tools() as $dataset)
                        <div class="column">
                            @php
                               $imageUrl = null;
                                if ($dataset->images && is_array($dataset->images) && count($dataset->images) > 0) {
                                    $imageUrl = Storage::disk('lldatasets')->url($dataset->images[0]);
                                }

                                $keywordsArray = [];
                                if (!empty($dataset->keywords)) {
                                    $keywordsArray = preg_split('/[;,]/', $dataset->keywords);
                                    $keywordsArray = array_filter(array_map('trim', $keywordsArray));
                                }
                            @endphp
                            <x-metainventory.ll_inventory_card :dataset="$dataset" :image="$imageUrl" :keywords="$keywordsArray">

                            </x-metainventory.ll_inventory_card>
                            <div class="col">
                                <hr class="my-4">
                            </div>
                        </div>
                    @empty
                        <div class="w-100 text-center">
                            <img src="{{ asset('img/undraw_loading_re_5axr.svg') }}" alt="No results found" class="w-100" style="max-width: 300px"/>
                            <p class="mb-0">No results found.</p>
                        </div>
                    @endforelse

                </div>
            </div>
        </div>
    </x-slot:main_body>


</x-layout.layout>
