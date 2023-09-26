@props(['dataset'])
<div class="dataset_card desira mt-5">
    <div class="col-sm-12">
        <div class="summary entry-summary flex-wrap flex_row justify-content-start">
            <h2 class="mb-0 font-weight-bold text-6 text-color-custom-blue">{{ $dataset['ToolName'] }}</h2>
            <div class="keywords-container">
                @if(!empty($dataset['Keywords']))
                    <div class="keywords-scroll overflow-auto">
                        @foreach ($dataset['Keywords'] as $keyword)
                            <span class="badge rounded-pill badge-primary">{{ $keyword }}</span>
                        @endforeach
                    </div>
                @endif
            </div>
            @auth
                <i
                    data-collection='desira'
                    data-collection-id="{{$dataset['_id']}}"
                    @class([
                        'fa-solid fa-heart heart_custom tooltip_custom favorites_toggle_icon'=>true,
                        'enabled'=>\App\Logic\UserHelper::hasFavorite(request()->user(), 'desira', $dataset['_id'])
                    ])
                    type="button" data-toggle="tooltip" data-placement="top" title="Add to favorites"></i>
            @endauth

        </div>
        <div class="divider divider-small">
            <hr class="bg-color-grey-scale-4">
        </div>
        <p class="text-3-5 mb-3 text-justify">{{ $dataset['Description'] }}</p>
    </div>
</div>

{{--TODO create component for card_subsection desira--}}
<div class="col-sm-12 my-4 flex_row_responsive px-0 align-items-stretch">
    <div class="card_column col-sm-4 card_column_responsive">
        @if(!empty($dataset['CountriesUsed']))
            <div class="card_subsection desira col-sm-12">
                <h4 class="mb-0 font-weight-semi-bold text-4 text-color-custom-blue">Countries</h4>
                <ul class="text-3-5 mb-3 list-unstyled">
                    @foreach($dataset['CountriesUsed'] as $country)
                        <li>{{$country}}</li>
                    @endforeach
                </ul>
            </div>
        @endif
        @if(!empty($dataset['URL']))
                <div class="card_subsection desira col-sm-12">
                    <h4 class="mb-0 font-weight-semi-bold text-4 text-color-custom-blue">Website</h4>
                    <a target="_blank" class="text-3-5" href="{{$dataset['URL']}}" style="white-space: nowrap; overflow: hidden; text-overflow: ellipsis; display: block; max-width: 100%;">{{$dataset['URL']}}</a>
                </div>
        @endif
        <div class="card_subsection desira col-sm-12">
            <h4 class="mb-0 font-weight-semi-bold text-4 text-color-custom-blue">Domain</h4>
            <p class="text-3-5 mb-3">{{$dataset['Domain']}}</p>
        </div>
        <div class="card_subsection desira col-sm-12">
            <h4 class="mb-0 font-weight-semi-bold text-4 text-color-custom-blue">Subdomain</h4>
            <p class="text-3-5 mb-3">{{$dataset['Subdomain']}}</p>
        </div>
        <div class="card_subsection desira col-sm-12">
            <h4 class="mb-0 font-weight-semi-bold text-4 text-color-custom-blue">Maturity level</h4>
            <p class="text-3-5 mb-3">{{$dataset['MaturityLevel']}}</p>
        </div>
    </div>
    <div class="col_width">
        <div class="card_column card_column_responsive justify-content-start h-100">
            <div class="flex_row align-items-stretch">
                <div class="card_subsection desira col_custom">
                    <h4 class="mb-0 font-weight-semi-bold text-4 text-color-custom-blue">Application Scenarios</h4>
                    <ul class="text-3-5 mb-3 list-unstyled">
                        @foreach($dataset['ApplicationScenarios'] as $category)
                            <li>{{$category}}</li>
                        @endforeach
                    </ul>
                </div>
                <div class="card_subsection desira col_custom">
                    <h4 class="mb-0 font-weight-semi-bold text-4 text-color-custom-blue">Target groups</h4>
                    <p class="text-3-5 mb-3">{{$dataset['Users']}}</p>
                </div>
                <div class="card_subsection desira col_custom">
                    <h4 class="mb-0 font-weight-semi-bold text-4 text-color-custom-blue">Outcome</h4>
                    <p class="text-3-5 mb-3">{{$dataset['AchievedOutcome']}}</p>
                </div>
            </div>
            <div class="flex_row align-items-stretch">
                <div class="card_subsection desira col_custom">
                    <h4 class="mb-0 font-weight-semi-bold text-4 text-color-custom-blue">Technology Used</h4>
                    <ul class="text-3-5 mb-3 list-unstyled">
                        @foreach($dataset['DigitalTechUsage'] as $technology)
                            <li>{{$technology}}</li>
                        @endforeach
                        @foreach($dataset['Technology'] as $technology)
                            <li>{{$technology}}</li>
                        @endforeach
                    </ul>
                </div>
                <div class="card_subsection desira col_custom">
                    <h4 class="mb-0 font-weight-semi-bold text-4 text-color-custom-blue">Digital - Physical connection</h4>
                    <ul class="text-3-5 mb-3 list-unstyled">
                        @foreach($dataset['Connection'] as $source)
                            <li>{{$source}}</li>
                        @endforeach
                    </ul>
                </div>
                <div class="card_subsection desira col_custom">
                    <h4 class="mb-0 font-weight-semi-bold text-4 text-color-custom-blue">Human Replacement</h4>
                    <p class="text-3-5 mb-3">
                        {{$dataset['HumanWorkReplacementExtent']}}
                    </p>
                </div>
            </div>
        </div>
    </div>
</div>
