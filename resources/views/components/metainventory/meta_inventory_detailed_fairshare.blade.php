@props(['dataset'])

@php
    $keywords = explode(',', $dataset['keywords']);
    $providerWebsite = explode('\n', $dataset['providerWebsite']);
    if (!preg_match("~^(?:f|ht)tps?://~i", $providerWebsite[0])) {
        $providerWebsite[0] = "https://" . $providerWebsite[0];
    }
    if (!preg_match("~^(?:f|ht)tps?://~i", $dataset['website'])) {
        $dataset['website'] = "https://" . $dataset['website'];
    }
    $videos = explode('\n', $dataset['videos']);
    foreach ($videos as $index=>$video) {
        if (!preg_match("~^(?:f|ht)tps?://~i", $video)) {
        $videos[$index] = "https://" . $video;
        }
    }
@endphp
<div class="dataset_card fairshare mt-5">
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
                    data-collection='fairshare'
                    data-collection-id="{{$dataset['_id']}}"
                    @class([
                        'fa-solid fa-heart heart_custom tooltip_custom favorites_toggle_icon'=>true,
                        'enabled'=>\App\Logic\UserHelper::hasFavorite(request()->user(), 'fairshare', $dataset['_id'])
                    ])
                    type="button" data-toggle="tooltip" data-placement="top" title="Add to favorites"></i>
            @endauth

        </div>
        <p class="mb-0">
            <a target="_blank" class="text-color-dark" href="{{$providerWebsite[0]}}">{{$dataset['providerName']}}</a><span class="ms-5 text-color-dark">{{$dataset['launchYear']}}</span>
        </p>
        <div class="divider divider-small">
            <hr class="bg-color-grey-scale-4">
        </div>
        <p class="text-3-5 mb-3 text-justify">{{ $dataset['desc'] }}</p>
    </div>
</div>

{{--TODO create component for card_subsection--}}
<div class="col-sm-12 my-4 flex_row_responsive px-0 align-items-stretch">
    <div class="card_column col-sm-4 card_column_responsive">
        <div class="card_subsection col-sm-12">
            <h4 class="mb-0 font-weight-semi-bold text-4 text-color-custom-blue">Countries</h4>
            <ul class="text-3-5 mb-3 list-unstyled">
                @foreach($dataset['countries'] as $country)
                    <li>{{$country}}</li>
                @endforeach
            </ul>
        </div>
        <div class="card_subsection col-sm-12">
            <h4 class="mb-0 font-weight-semi-bold text-4 text-color-custom-blue">Languages</h4>
            <ul class="text-3-5 mb-3 list-unstyled">
                @foreach($dataset['languages'] as $language)
                    <li>{{$language}}</li>
                @endforeach
            </ul>
        </div>
        <div class="card_subsection col-sm-12">
            <h4 class="mb-0 font-weight-semi-bold text-4 text-color-custom-blue">Website</h4>
            <a target="_blank" class="text-3-5" href="{{$dataset['website']}}" style="white-space: nowrap; overflow: hidden; text-overflow: ellipsis; display: block; max-width: 100%;">{{$dataset['website']}}</a>
        </div>
        <div class="card_subsection col-sm-12">
            <h4 class="mb-0 font-weight-semi-bold text-4 text-color-custom-blue">Cost</h4>
            <p class="text-3-5 mb-3">{{$dataset['cost']}}</p>
        </div>
        <div class="card_subsection col-sm-12">
            <h4 class="mb-0 font-weight-semi-bold text-4 text-color-custom-blue">License</h4>
            @if(!$dataset['license'])
                <p class="text-3-5 mb-3">Unknown</p>
            @else
                <p class="text-3-5 mb-3">{{$dataset['license']}}</p>
            @endif
        </div>
    </div>
    <div class="col_width">
        <div class="card_column card_column_responsive">
            <div class="flex_row align-items-stretch">
                <div class="card_subsection col_custom">
                    <h4 class="mb-0 font-weight-semi-bold text-4 text-color-custom-blue">Categories</h4>
                    <ul class="text-3-5 mb-3 list-unstyled">
                        @foreach($dataset['category'] as $category)
                            <li>{{$category}}</li>
                        @endforeach
                    </ul>
                </div>
                <div class="card_subsection col_custom">
                    <h4 class="mb-0 font-weight-semi-bold text-4 text-color-custom-blue">Target groups</h4>
                    <ul class="text-3-5 mb-3 list-unstyled">
                        @foreach($dataset['target'] as $target)
                            <li>{{$target}}</li>
                        @endforeach
                    </ul>
                </div>
                <div class="card_subsection col_custom">
                    <h4 class="mb-0 font-weight-semi-bold text-4 text-color-custom-blue">Sectors</h4>
                    <ul class="text-3-5 mb-3 list-unstyled">
                        @foreach($dataset['sector'] as $sector)
                            <li>{{$sector}}</li>
                        @endforeach
                    </ul>
                </div>
            </div>
            <div class="flex_row align-items-stretch">
                <div class="card_subsection col_custom">
                    <h4 class="mb-0 font-weight-semi-bold text-4 text-color-custom-blue">Modes of delivery</h4>
                    <ul class="text-3-5 mb-3 list-unstyled">
                        @foreach($dataset['delivery'] as $delivery)
                            <li>{{$delivery}}</li>
                        @endforeach
                    </ul>
                </div>
                <div class="card_subsection col_custom">
                    <h4 class="mb-0 font-weight-semi-bold text-4 text-color-custom-blue">Source of data</h4>
                    <ul class="text-3-5 mb-3 list-unstyled">
                        @foreach($dataset['source'] as $source)
                            <li>{{$source}}</li>
                        @endforeach
                    </ul>
                </div>
                <div class="card_subsection col_custom">
                    <h4 class="mb-0 font-weight-semi-bold text-4 text-color-custom-blue">Required ICT skills</h4>
                    <p class="text-3-5 mb-3">
                        {{$dataset['know']}}
                    </p>
                </div>
            </div>
        </div>
        <div class="owl-carousel owl-theme nav-inside nav-inside-edge nav-squared nav-with-transparency nav-dark mt-4 mb-0" data-plugin-options="{'items': 1, 'margin': 10, 'loop': false, 'nav': true, 'dots': false}">
            @foreach($dataset['imagePath'] as $image)
                <div>
                    <div class="img-thumbnail border-0 p-0 d-block">
                        <img class="img-fluid border-radius-0" src='{{$image}}' alt="">
                    </div>
                </div>
            @endforeach
        </div>
    </div>
</div>
<div class="card_column col-sm-12 mb-5">
    <div class="flex_row align-items-stretch flex_row_responsive2">
        <div class="card_subsection" @class([
                'col-sm-4'=>(empty($dataset['documentPath']) && !empty($videos)),
                'col-sm-6'=>!(empty($dataset['documentPath']) && !empty($videos)),
        ])>
            <h4 class="mb-0 font-weight-semi-bold text-4 text-color-custom-blue">Benefits</h4>
            <ul class="text-3-5 mb-3 list-unstyled">
                @foreach($dataset['benefits'] as $benefits)
                    <li>{{$benefits}}</li>
                @endforeach
            </ul>
        </div>
        <div class="card_subsection" @class([
                'col-sm-4'=>(empty($dataset['documentPath']) && !empty($videos)),
                'col-sm-6'=>!(empty($dataset['documentPath']) && !empty($videos)),
        ])>
            <h4 class="mb-0 font-weight-semi-bold text-4 text-color-custom-blue">Challenges addressed</h4>
            <ul class="text-3-5 mb-3 list-unstyled">
                @foreach($dataset['challenges'] as $challenges)
                    <li>{{$challenges}}</li>
                @endforeach
            </ul>
        </div>
        @if (!(empty($dataset['documentPath']) && empty($videos)))
            <div class="card_subsection col-sm-4">
                <h4 class="mb-0 font-weight-semi-bold text-4 text-color-custom-blue">Resources</h4>
                <ul class="text-3-5 mb-3 list-unstyled">
                    @foreach($dataset['documentPath'] as $index=>$document)
                        <li> <a target="_blank" class="text-3" href="{{$document}}">Document {{ $index + 1 }}</a></li>
                    @endforeach
                    @foreach($videos as $index=>$video)
                        @if(!($video=='null' || $video=='https://null'))
                            <li> <a target="_blank" class="text-3" href="{{$video}}">Video {{ $index + 1 }}</a></li>
                        @endif
                    @endforeach
                </ul>
            </div>
        @endif
    </div>
</div>
