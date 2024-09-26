<x-layout.layout>
    <x-slot:title>
        Codecs | Meta-Inventory / {{ $meta['title'] }}
    </x-slot:title>
    <x-slot:keywords>
        Codecs, meta-inventory, {{ $meta['keywords'] }}
    </x-slot:keywords>
    <x-slot:description>
        Codecs | Meta-Inventory / {{ $meta['description'] }}
    </x-slot:description>

    <x-slot:hero_section>
        <x-layout.hero_simple>
            <x-slot:sub_section>
                <a role="button" href="{{route('meta_inventory_home')}}">Meta-Inventory</a>
            </x-slot:sub_section>
            <x-slot:current_view>
                @if($meta['source'] == 'fairshare')
                    FAIRshare Dataset
                @elseif($meta['source'] == 'smartakis')
                    smartAKIS Dataset
                @elseif($meta['source'] == 'desira')
                    DESIRA Dataset
                @elseif($meta['source'] == 'nutricheck')
                    NUTRI-CHECK NET Dataset
                @elseif($meta['source'] == 'ipmworks')  
                    IPMworks Dataset
                @else
                    {{$meta['source']}} Dataset
                @endif
            </x-slot:current_view>
        </x-layout.hero_simple>
    </x-slot:hero_section>

    <x-slot:main_body>
        <div class="container pt-3 pb-2">

            <div class="row pt-2 mb-5">
                @if($meta['source'] == 'fairshare')
                    <x-metainventory.meta_inventory_detailed_fairshare :dataset="$dataset">

                    </x-metainventory.meta_inventory_detailed_fairshare>
                @elseif($meta['source'] == 'smartakis')
                    <x-metainventory.meta_inventory_detailed_smartakis :dataset="$dataset">

                    </x-metainventory.meta_inventory_detailed_smartakis>
                @elseif($meta['source'] == 'desira')
                    <x-metainventory.meta_inventory_detailed_deshira :dataset="$dataset">

                    </x-metainventory.meta_inventory_detailed_deshira>
                @elseif($meta['source'] == 'nutricheck')
                    <x-metainventory.meta_inventory_detailed_nutricheck :dataset="$dataset">

                    </x-metainventory.meta_inventory_detailed_nutricheck>
                @elseif($meta['source'] == 'ipmworks')
                    <x-metainventory.meta_inventory_detailed_ipmworks :dataset="$dataset">

                    </x-metainventory.meta_inventory_detailed_ipmworks>
                @endif
            </div>

        </div>
    </x-slot:main_body>
    <x-slot:body_scripts>
        <script>
            $(document).ready(()=>{
                $('.favorites_toggle_icon').click(function(){
                    let $this = $(this);
                    $.post('{{route('favorites.set')}}', {
                        collection: $this.data('collection'),
                        collection_id: $this.data('collection-id'),
                    }, function (res){
                        if(res.success)
                        {
                            res.action === 'add'
                                ? $this.addClass('enabled')
                                : $this.removeClass('enabled');
                        }else{
                            swal('error','Request failed','error');
                        }
                    })
                })
            });
        </script>
    </x-slot:body_scripts>

</x-layout.layout>
