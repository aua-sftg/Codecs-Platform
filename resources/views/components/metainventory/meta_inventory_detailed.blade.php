<x-layout.layout>
    <x-slot:title>
        Codecs | Meta-Inventory / {{ $meta['title'] }}
    </x-slot:title>
    <x-slot:keywords>
        Codecs, meta-inventory / {{ $meta['keywords'] }}
    </x-slot:keywords>
    <x-slot:description>
        Codecs | Meta-Inventory / {{ $meta['description'] }}
    </x-slot:description>

    <x-slot:hero_section>
        <x-layout.hero_simple>
            <x-slot:current_view>
                Meta-inventory / Detailed View
            </x-slot:current_view>
        </x-layout.hero_simple>
    </x-slot:hero_section>

    <x-slot:main_body>
        <div class="container pt-3 pb-2">

            <div class="row pt-2">
                @if($meta['source'] == 'fairshare')
                    <x-metainventory.meta_inventory_detailed_fairshare :dataset="$dataset">

                    </x-metainventory.meta_inventory_detailed_fairshare>
                @endif
            </div>

        </div>


    </x-slot:main_body>


</x-layout.layout>
