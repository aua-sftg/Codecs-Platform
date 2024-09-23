@props(['dataset'])
@php
    if (!empty($dataset['URL'])) {
        if (!preg_match("~^(?:f|ht)tps?://~i", $dataset['URL'])) {
        $dataset['URL'] = "https://" . $dataset['URL'];
        }
    }
@endphp
<div class="dataset_card nutricheck mt-5">
    <div class="col-sm-12">
        <div class="summary entry-summary flex-wrap flex_row justify-content-start">
            <h2 class="mb-0 me-4 font-weight-bold text-6 text-color-custom-blue">{{ $dataset['name'] }}</h2>
            @auth
                <i
                    data-collection='nutricheck'
                    data-collection-id="{{$dataset['_id']}}"
                    @class([
                        'fa-solid fa-heart heart_custom tooltip_custom favorites_toggle_icon'=>true,
                        'enabled'=>\App\Logic\UserHelper::hasFavorite(request()->user(), 'nutricheck', $dataset['_id'])
                    ])
                    type="button" data-toggle="tooltip" data-placement="top" title="Add to favorites"></i>
            @endauth

        </div>
        @if (!empty($dataset['manufacturer']))
            <p class="mb-0 text-color-dark">
                {{$dataset['manufacturer']}}
            </p>
        @endif
        <div class="divider divider-small">
            <hr class="bg-color-grey-scale-4">
        </div>
        <p class="text-3-5 mb-3 text-justify">{{ $dataset['description'] }}</p>
    </div>
</div>

{{--TODO create component for card_subsection nutricheck--}}
<div class="col-sm-12 my-4 flex_row_responsive px-0 align-items-stretch">
    <div class="card_column col-sm-4 card_column_responsive">
        @if(!empty($dataset['countries']))
            <div class="card_subsection nutricheck col-sm-12">
                <h4 class="mb-0 font-weight-semi-bold text-4 text-color-custom-blue">Countries</h4>
                <ul class="text-3-5 mb-3 list-unstyled">
                    @foreach($dataset['countries'] as $country)
                        <li>{{$country}}</li>
                    @endforeach
                </ul>
            </div>
        @endif
        @if(!empty($dataset['url']))
                <div class="card_subsection nutricheck col-sm-12">
                    <h4 class="mb-0 font-weight-semi-bold text-4 text-color-custom-blue">Website</h4>
                    <a target="_blank" class="text-3-5" href="{{$dataset['url']}}" style="white-space: nowrap; overflow: hidden; text-overflow: ellipsis; display: block; max-width: 100%;">{{$dataset['url']}}</a>
                </div>
        @endif
        @if (!empty($dataset['trl_level']))
            <div class="card_subsection nutricheck col-sm-12">
                <h4 class="mb-0 font-weight-semi-bold text-4 text-color-custom-blue">Maturity level</h4>
                <p class="text-3-5 mb-3">{{$dataset['trl_level']}}</p>
            </div>
        @endif
        <div class="card_subsection nutricheck col-sm-12">
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
                @if (!empty($dataset['target_audience']))
                    <div class="card_subsection nutricheck col_custom">
                        <h4 class="mb-0 font-weight-semi-bold text-4 text-color-custom-blue">Target audience</h4>
                        <p class="text-3-5 mb-3">{{$dataset['target_audience']}}</p>
                    </div>
                @endif
                @if (!empty($dataset['tool_type']))
                    <div class="card_subsection nutricheck col_custom">
                        <h4 class="mb-0 font-weight-semi-bold text-4 text-color-custom-blue">Tool type</h4>
                        <p class="text-3-5 mb-3">{{$dataset['tool_type']}}</p>
                    </div>
                @endif
                @if(!empty($dataset['freq_of_assessments']))
                    <div class="card_subsection nutricheck col_custom">
                        <h4 class="mb-0 font-weight-semi-bold text-4 text-color-custom-blue">Frequency of Assessments</h4>
                        <p class="text-3-5 mb-3">{{$dataset['freq_of_assessments']}}</p>
                    </div>
                @endif
            </div>
            <div class="flex_row align-items-stretch">
                @if(!empty($dataset['language']))
                    <div class="card_subsection nutricheck col_custom_duo">
                        <h4 class="mb-0 font-weight-semi-bold text-4 text-color-custom-blue">Languages</h4>
                        @php
                            $languages = [$dataset['language']];
                            if (!empty($dataset['available_in_other_languages']) && $dataset['available_in_other_languages'] == 1) {
                                $additional_languages = !empty($dataset['additional_languages']) ? explode(', ', $dataset['additional_languages']) : [];
                                $languages = array_unique(array_merge($languages, $additional_languages));
                            }
                        @endphp
                        <p class="text-3-5 mb-3">{{ implode(', ', $languages) }}</p>
                    </div>
                @endif
                @if (!empty($dataset['crop_types']))
                    <div class="card_subsection nutricheck col_custom_duo">
                        <h4 class="mb-0 font-weight-semi-bold text-4 text-color-custom-blue">Crop types</h4>
                        <p class="text-3-5 mb-3">{{$dataset['crop_types']}}</p>
                    </div>
                @endif
            </div>
        </div>
    </div>
</div>
