@props(['dataset'])
@php
    $vendorWebsite = $dataset['vendorWebsite'] ?? null;
    $website = $dataset['website'] ?? null;
    $supportingLinks = $dataset['supportingLinks'] ?? [];

    if (!empty($vendorWebsite)) {
        if (!preg_match("~^(?:f|ht)tps?://~i", $vendorWebsite)) {
            $vendorWebsite = "https://" . $vendorWebsite;
        }
    }
    if (!empty($website)) {
        if (!preg_match("~^(?:f|ht)tps?://~i", $website)) {
            $website = "https://" . $website;
        }
    }
    foreach ($supportingLinks as $index => $link) {
        if (!preg_match("~^(?:f|ht)tps?://~i", $link)) {
            $supportingLinks[$index] = "https://" . $link;
        }
    }
@endphp
<div class="dataset_card smartakis mt-5">
    <div class="col-sm-12">
        <div class="summary entry-summary flex-wrap flex_row justify-content-start">
            <h2 class="mb-0 me-4 font-weight-bold text-6 text-color-custom-blue">{{ $dataset['title'] }}</h2>
            <div class="keywords-container">
                @if (!empty($dataset['croppingSystem']))
                    <div class="{{ count($dataset['croppingSystem']) > 4 ? 'overflow-x-auto keywords-scroll' : '' }}">
                        @foreach ($dataset['croppingSystem'] as $index => $keyword)
                            <span class="badge rounded-pill badge-primary">{{ strlen($keyword) > 25 ? substr($keyword, 0, 25) . '...' : $keyword }}</span>
                        @endforeach
                    </div>
                @endif
            </div>
            @auth
                <i
                    data-collection='smartakis'
                    data-collection-id="{{$dataset['_id']}}"
                    @class([
                        'fa-solid fa-heart heart_custom tooltip_custom favorites_toggle_icon'=>true,
                        'enabled'=>\App\Logic\UserHelper::hasFavorite(request()->user(), 'smartakis', $dataset['_id'])
                    ])
                    type="button" data-toggle="tooltip" data-placement="top" title="Add to favorites"></i>
            @endauth
        </div>
        <p class="mb-0">
            <a target="_blank" class="text-color-dark" href="{{$vendorWebsite}}">{{$dataset['vendor']}}</a>
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
        @if(!empty($dataset['country']))
            <div class="card_subsection smartakis col-sm-12">
                <h4 class="mb-0 font-weight-semi-bold text-4 text-color-custom-blue">Countries</h4>
                <ul class="text-3-5 mb-3 list-unstyled">
                    @foreach($dataset['country'] as $country)
                        <li>{{$country}}</li>
                    @endforeach
                </ul>
            </div>
        @endif
        @if(!empty($website))
                <div class="card_subsection smartakis col-sm-12">
                    <h4 class="mb-0 font-weight-semi-bold text-4 text-color-custom-blue">Website</h4>
                    <a target="_blank" class="text-3-5" href="{{$website}}" style="white-space: nowrap; overflow: hidden; text-overflow: ellipsis; display: block; max-width: 100%;">{{$website}}</a>
                </div>
        @endif
        <div class="card_subsection smartakis col-sm-12">
            <h4 class="mb-0 font-weight-semi-bold text-4 text-color-custom-blue">TRL</h4>
            <p class="text-3-5 mb-3">{{$dataset['trl']}}</p>
        </div>
        <div class="card_subsection smartakis col-sm-12">
            <h4 class="mb-0 font-weight-semi-bold text-4 text-color-custom-blue">License</h4>
            @if(!$dataset['license'])
                <p class="text-3-5 mb-3">Unknown</p>
            @else
                <p class="text-3-5 mb-3">{{$dataset['license']}}</p>
            @endif
        </div>
    </div>
    <div class="col_width">
        <div class="card_column card_column_responsive justify-content-start">
            <div class="flex_row align-items-stretch">
                <div class="card_subsection smartakis col_custom">
                    <h4 class="mb-0 font-weight-semi-bold text-4 text-color-custom-blue">Technology</h4>
                    <ul class="text-3-5 mb-3 list-unstyled">
                        @foreach($dataset['sftType'] as $technology)
                            <li>{{$technology}}</li>
                        @endforeach
                    </ul>
                </div>
                <div class="card_subsection smartakis col_custom">
                    <h4 class="mb-0 font-weight-semi-bold text-4 text-color-custom-blue">Technology effect on</h4>
                    <ul class="text-3-5 mb-3 list-unstyled">
                        @foreach($dataset['sftEffectOn'] as $technology)
                            <li>{{$technology}}</li>
                        @endforeach
                    </ul>
                </div>
                <div class="card_subsection smartakis col_custom">
                    <h4 class="mb-0 font-weight-semi-bold text-4 text-color-custom-blue">Resources</h4>
                    <ul class="text-3-5 mb-3 list-unstyled">
                        @foreach($supportingLinks as $link)
                            <li> <a target="_blank" class="text-3-5" style="white-space: nowrap; overflow: hidden; text-overflow: ellipsis; display: block; max-width: 100%;" href="{{$link}}">{{$link}}</a></li>
                        @endforeach
                        <li> <a target="_blank" class="text-3-5" style="white-space: nowrap; overflow: hidden; text-overflow: ellipsis; display: block; max-width: 100%;" href="{{$dataset['pdf']}}">{{$dataset['pdf']}}</a></li>
                    </ul>
                </div>
            </div>
        </div>
        <div class="owl-carousel owl-theme nav-inside nav-inside-edge nav-squared nav-with-transparency nav-dark mt-4 mb-0" data-plugin-options="{'items': 1, 'margin': 10, 'loop': false, 'nav': true, 'dots': false}">
            @foreach($dataset['picAddress'] as $image)
                <div>
                    <div class="img-thumbnail border-0 p-0 d-block">
                        <img class="img-fluid border-radius-0" src='{{$image}}' alt="">
                    </div>
                </div>
            @endforeach
        </div>
    </div>
</div>