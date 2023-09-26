<x-layout.layout>
    <x-slot:title>
        Codecs | inventory of Datasets / {{ $meta['title'] }}
    </x-slot:title>
    <x-slot:keywords>
        Codecs, inventory, datasets, {{ $meta['keywords'] }}
    </x-slot:keywords>
    <x-slot:description>
        Codecs | Meta-Inventory / {{ $meta['description'] }}
    </x-slot:description>

    <x-slot:hero_section>
        <x-layout.hero_simple>
            <x-slot:sub_section>
                <a role="button" href="{{route('inventory_of_datasets')}}">Inventory of Datasets</a>
            </x-slot:sub_section>
            <x-slot:current_view>
                {{$meta['title']}}
            </x-slot:current_view>
        </x-layout.hero_simple>
    </x-slot:hero_section>

    <x-slot:main_body>
        <div class="container pt-3 pb-2">

            <div class="row pt-2 mb-5">
{{--                <x-metainventory.meta_inventory_detailed_fairshare :dataset="$dataset">--}}

{{--                </x-metainventory.meta_inventory_detailed_fairshare>--}}
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
