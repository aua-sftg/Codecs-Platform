<x-layout.layout>
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
                Meta-inventory
            </x-slot:current_view>
        </x-layout.hero_simple>
    </x-slot:hero_section>

    <x-slot:main_body>
        <div class="container py-4 mt-4 mb-5">
            <div class="row">
                <div class="col">
                    <div class="row">
                        @foreach(App\Logic\ScenarioHelper::get_scenarios() as $scenario)
                            <div class="col-lg-3 mt-5">
                                <a href="{{route('meta_inventory_list', ['scenario' => $scenario])}}">
                                <span  class="thumb-info thumb-info-no-borders thumb-info-no-borders-rounded thumb-info-lighten thumb-info-bottom-info thumb-info-bottom-info thumb-info-bottom-info-show-more thumb-info-no-zoom">
                                     <span class="thumb-info-wrapper">
                                         <img src="{{ asset('storage/scenarios/' . $scenario->image) }}" class="img-fluid appl_scen_img" alt="{{ $scenario->name }}">
                                         <span class="thumb-info-title">
                                             <span class="thumb-info-inner line-height-1">{{ $scenario->name }}</span>
                                             <span class="thumb-info-show-more-content opacity-7"><p class="text-color-dark mb-0 text-1 line-height-5">{{ $scenario->description }}</p></span>
                                         </span>
                                     </span>
                                </span>
                                </a>
                            </div>
                        @endforeach
                        <div class="col-lg-3 mt-5">
                            <a href="{{route('living_lab_inventory')}}">
                            <span  class="thumb-info thumb-info-no-borders thumb-info-no-borders-rounded thumb-info-lighten thumb-info-bottom-info thumb-info-bottom-info thumb-info-bottom-info-show-more thumb-info-no-zoom">
                                    <span class="thumb-info-wrapper">
                                        <img src="{{ asset('img/ll_datasets.svg') }}" class="img-fluid appl_scen_img" alt="Living Lab Datasets">
                                        <span class="thumb-info-title">
                                            <span class="thumb-info-inner line-height-1">LivingLab Datasets</span>
                                            <span class="thumb-info-show-more-content opacity-7"><p class="text-color-dark mb-0 text-1 line-height-5">Lorem ipsum</p></span>
                                        </span>
                                    </span>
                            </span>
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </x-slot:main_body>


</x-layout.layout>
