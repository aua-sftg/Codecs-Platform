@props(['dataset'])
@php
    if (!empty($dataset['URL'])) {
        if (!preg_match("~^(?:f|ht)tps?://~i", $dataset['URL'])) {
        $dataset['URL'] = "https://" . $dataset['URL'];
        }
    }

    use Carbon\Carbon;
@endphp
<div class="dataset_card ipmworks mt-5">
    <div class="col-sm-12">
        <div class="summary entry-summary flex-wrap flex_row justify-content-start">
            <h2 class="mb-0 me-4 font-weight-bold text-6 text-color-custom-blue">{{ $dataset['name'] }}</h2>
            @auth
                <i
                    data-collection='ipmworks'
                    data-collection-id="{{$dataset['_id']}}"
                    @class([
                        'fa-solid fa-heart heart_custom tooltip_custom favorites_toggle_icon'=>true,
                        'enabled'=>\App\Logic\UserHelper::hasFavorite(request()->user(), 'ipmworks', $dataset['_id'])
                    ])
                    type="button" data-toggle="tooltip" data-placement="top" title="Add to favorites"></i>
            @endauth

        </div>
        @if(!empty($dataset['institution']))
            <p class="mb-0 text-color-dark">
                {{$dataset['institution']}}<span class="ms-5 text-color-dark">{{ (new DateTime($dataset['ipm_creation_date']))->format('Y') }}</span>
            </p>
        @endif
        
        <div class="divider divider-small">
            <hr class="bg-color-grey-scale-4">
        </div>
        <p class="text-3-5 mb-3 text-justify">{{ $dataset['description'] }}</p>
    </div>
</div>

{{--TODO create component for card_subsection ipmworks--}}
<div class="col-sm-12 my-4 flex_row_responsive px-0 align-items-stretch">
    <div class="card_column col-sm-4 card_column_responsive">
        @if(!empty($dataset['url']))
                <div class="card_subsection ipmworks col-sm-12">
                    <h4 class="mb-0 font-weight-semi-bold text-4 text-color-custom-blue">Website</h4>
                    <a target="_blank" class="text-3-5" href="{{$dataset['url']}}" style="white-space: nowrap; overflow: hidden; text-overflow: ellipsis; display: block; max-width: 100%;">{{$dataset['url']}}</a>
                </div>
        @endif
        @if(!empty($dataset['language']))
            <div class="card_subsection ipmworks col-sm-12">
                <h4 class="mb-0 font-weight-semi-bold text-4 text-color-custom-blue">Language</h4>
                <p class="text-3-5 mb-3">({{$dataset['language']}})</p>
            </div>
        @endif
        @if(!empty($dataset['regions']))
            <div class="card_subsection ipmworks col-sm-12">
                <h4 class="mb-0 font-weight-semi-bold text-4 text-color-custom-blue">Countries</h4>
                <ul class="text-3-5 mb-3 list-unstyled">
                    @foreach($dataset['regions'] as $country)
                        <li>{{$country}}</li>
                    @endforeach
                </ul>
            </div>
        @endif
        <div class="card_subsection ipmworks col-sm-12">
            <h4 class="mb-0 font-weight-semi-bold text-4 text-color-custom-blue">License</h4>
            @if(!$dataset['license'])
                <p class="text-3-5 mb-3">Unknown</p>
            @else
                <p class="text-3-5 mb-3">{{$dataset['license']}}</p>
            @endif

        </div>
    </div>
    <div class="col_width">
        <div class="card_column card_column_responsive justify-content-start h-100">
            <div class="flex_row align-items-stretch">
                @if (!empty($dataset['source_project']))
                    <div class="card_subsection ipmworks col_custom">
                        <h4 class="mb-0 font-weight-semi-bold text-4 text-color-custom-blue">Source Project</h4>
                        @if(!empty($dataset['source_project_link']))
                            <a target="_blank" class="text-3-5" href="{{$dataset['source_project_link']}}" style="white-space: nowrap; overflow: hidden; text-overflow: ellipsis; display: block; max-width: 100%;">{{$dataset['source_project']}}</a>
                        @else
                            <p class="text-3-5 mb-3">{{$dataset['source_project']}}</p>
                        @endif
                    </div>
                @endif
                @if (!empty($dataset['resource_type']))
                    <div class="card_subsection ipmworks col_custom">
                        <h4 class="mb-0 font-weight-semi-bold text-4 text-color-custom-blue">Resource Type</h4>
                        <p class="text-3-5 mb-3">{{$dataset['resource_type']}}</p>
                    </div>
                @endif
                @if (!empty($dataset['crops']))
                    <div class="card_subsection ipmworks col_custom">
                        <h4 class="mb-0 font-weight-semi-bold text-4 text-color-custom-blue">Crop types</h4>
                        <p class="text-3-5 mb-3">{{ implode(', ', $dataset['crops']) }}</p>
                    </div>
                @endif
            </div>
            <div class="flex_row align-items-stretch">
                @if (!empty($dataset['pests']))
                    <div class="card_subsection ipmworks col_custom_duo">
                        <h4 class="mb-0 font-weight-semi-bold text-4 text-color-custom-blue">Pest types</h4>
                        <p class="text-3-5 mb-3">{{ implode(', ', $dataset['pests']) }}</p>
                    </div>
                @endif
                @if(!empty($dataset['links']))
                    <div class="card_subsection ipmworks col_custom_duo">
                        <h4 class="mb-0 font-weight-semi-bold text-4 text-color-custom-blue">Resources</h4>
                        <ul class="text-3-5 mb-3 list-unstyled">
                            @foreach($dataset['links'] as $link)
                                <li><a href="{{ $link }}" target="_blank" class="text-3" style="white-space: nowrap; overflow: hidden; text-overflow: ellipsis; display: block; max-width: 100%;">{{ $link }}</a></li>
                            @endforeach
                        </ul>
                    </div>
                @endif
            </div>
        </div>
    </div>
</div>
