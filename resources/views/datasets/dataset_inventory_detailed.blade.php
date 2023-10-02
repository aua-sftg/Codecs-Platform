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
            @can(\App\Logic\PermissionHelper::PERMISSION_EDIT_DATASET, $dataset)
                <div class="text-end">
                    <a href="{{route('datasets.form.edit',$dataset)}}" class="bg-yellow rounded-pill p-1 px-3 fw-bold text-4 text-white">
                        {{__('Edit')}}
                    </a>
                </div>
            @endcan

            <div class="row pt-2 mb-5">
                <div class="dataset_card dataset mt-5">
                    <div class="col-sm-12">
                        <div class="summary entry-summary flex-wrap flex_row justify-content-start">
                            <h2 class="mb-0 me-4 font-weight-bold text-6 text-color-custom-blue">{{ $dataset['name'] }}</h2>
                            <div class="keywords-container">
                                @if (!empty($keywords))
                                    <div class="{{ count($keywords) > 4 ? 'overflow-x-auto keywords-scroll' : '' }}">
                                        @foreach ($keywords as $index => $keyword)
                                            <span class="badge rounded-pill badge-primary">{{ strlen($keyword) > 25 ? substr($keyword, 0, 25) . '...' : $keyword }}</span>
                                        @endforeach
                                    </div>
                                @endif
                            </div>
                            @auth
                                <i
                                    data-collection='datasets'
                                    data-collection-id="{{$dataset['_id']}}"
                                    @class([
                                        'fa-solid fa-heart heart_custom tooltip_custom favorites_toggle_icon'=>true,
                                        'enabled'=>\App\Logic\UserHelper::hasFavorite(request()->user(), 'datasets', $dataset['_id'])
                                    ])
                                    type="button" data-toggle="tooltip" data-placement="top" title="Add to favorites"></i>
                            @endauth

                        </div>
                        <p class="mb-0 text-color-dark">
                            {{$dataset['organization']['name']}}<span class="ms-5 text-color-dark">{{ date('d-m-Y', strtotime($dataset['release_date'])) }}</span>
                        </p>
                        <div class="divider divider-small">
                            <hr class="bg-color-grey-scale-4">
                        </div>
                        <p class="text-3-5 mb-3 text-justify">{{ $dataset['description'] }}</p>
                    </div>
                </div>

                {{--TODO create component for card_subsection--}}
                <div class="col-sm-12 my-4 flex_row_responsive px-0 align-items-stretch">
                    <div class="card_column col-sm-4 card_column_responsive">
                        <div class="card_subsection dataset col-sm-12">
                            <h4 class="mb-0 font-weight-semi-bold text-4 text-color-custom-blue">Sector</h4>
                            <ul class="text-3-5 mb-3 list-unstyled">
                                @foreach($sectors as $sector)
                                    <li>{{$sector}}</li>
                                @endforeach
                            </ul>
                        </div>
                        @if(!empty($dataset['reference_link']))
                            <div class="card_subsection dataset col-sm-12">
                                <h4 class="mb-0 font-weight-semi-bold text-4 text-color-custom-blue">DOI/ ROR/ ISSN</h4>
                                <a target="_blank" class="text-3-5" href="{{$dataset['reference_link']}}" style="white-space: nowrap; overflow: hidden; text-overflow: ellipsis; display: block; max-width: 100%;">{{$dataset['reference_link']}}</a>
                            </div>
                        @endif
                    </div>
                    <div class="col_width">
                        <div class="card_column card_column_responsive justify-content-start h-100">
                            <div class="flex_row align-items-stretch">
                                @if(!empty($audiences))
                                    <div class="card_subsection dataset col_custom">
                                        <h4 class="mb-0 font-weight-semi-bold text-4 text-color-custom-blue">Target Audiences</h4>
                                        <ul class="text-3-5 mb-3 list-unstyled">
                                            @foreach($audiences as $audience)
                                                <li>{{$audience}}</li>
                                            @endforeach
                                        </ul>
                                    </div>
                                @endif
                                @if(!empty($dataset['data_collection_method']))
                                        <div class="card_subsection dataset col_custom">
                                            <h4 class="mb-0 font-weight-semi-bold text-4 text-color-custom-blue">Data Collection Method</h4>
                                            <p class="text-3-5 mb-3">{{$dataset['data_collection_method']}}</p>
                                        </div>
                                @endif

                                <div class="card_subsection dataset col_custom">
                                    <h4 class="mb-0 font-weight-semi-bold text-4 text-color-custom-blue">Data Formats</h4>
                                    <ul class="text-3-5 mb-3 list-unstyled">
                                        @foreach($data_formats as $data_format)
                                            <li>{{$data_format}}</li>
                                        @endforeach
                                    </ul>
                                </div>
                            </div>
                            <div class="flex_row align-items-stretch">
                                @if(!empty($dataset['external_data_source']))
                                    <div class="card_subsection dataset col_custom">
                                        <h4 class="mb-0 font-weight-semi-bold text-4 text-color-custom-blue">External data source</h4>
                                        <a target="_blank" class="text-3-5" href="{{$dataset['external_data_source']}}" style="white-space: nowrap; overflow: hidden; text-overflow: ellipsis; display: block; max-width: 100%;">{{$dataset['external_data_source']}}</a>
                                    </div>
                                @endif
                                @if(!empty($dataset['oecd_frascati_classification']))
                                        <div class="card_subsection dataset col_custom">
                                            <h4 class="mb-0 font-weight-semi-bold text-4 text-color-custom-blue">OECD Frascati classification</h4>
                                            <p class="text-3-5 mb-3">
                                                {{$dataset['oecd_frascati_classification']}}
                                            </p>
                                        </div>
                                @endif
                                @if(!empty($dataset['license_scheme']))
                                    <div class="card_subsection dataset col_custom">
                                        <h4 class="mb-0 font-weight-semi-bold text-4 text-color-custom-blue">Licensing Scheme</h4>
                                        <a target="_blank" class="text-3-5" href="{{$dataset['license_scheme']}}" style="white-space: nowrap; overflow: hidden; text-overflow: ellipsis; display: block; max-width: 100%;">{{$dataset['license_scheme']}}</a>
                                    </div>
                                @endif
                            </div>
                        </div>
                    </div>
                </div>

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
