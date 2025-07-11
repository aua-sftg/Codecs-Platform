@props(['dataset'])

@php
    use Illuminate\Support\Facades\Storage;
    $keywords = explode(',', $dataset['keywords']);
    if (!preg_match("~^(?:f|ht)tps?://~i", $dataset['link'])) {
        $dataset['link'] = "https://" . $dataset['link'];
    }
    $targetusers = [];
    if (!empty($dataset['targetusers'])) {
        // First split by semicolons, then by commas
        $targetusers = preg_split('/[;,]/', $dataset['targetusers']);
        // Trim whitespace from each item and remove empty entries
        $targetusers = array_filter(array_map('trim', $targetusers));
    }
    $appscenarios = [];
    if (!empty($dataset['appscenarios'])) {
        $appscenarios = preg_split('/[;,]/', $dataset['appscenarios']);
        $appscenarios = array_filter(array_map('trim', $appscenarios));
    }
    $components = [];
    if (!empty($dataset['components'])) {
        $components = preg_split('/[;,]/', $dataset['components']);
        $components = array_filter(array_map('trim', $components));
    }
    $types =[];
    if (!empty($dataset['type'])) {
        $types = preg_split('/[;,]/', $dataset['type']);
        $types = array_filter(array_map('trim', $types));
    }
@endphp
<div class="dataset_card lldatasets mt-5">
    <div class="col-sm-12">
        <div class="summary entry-summary flex-wrap flex_row justify-content-start">
            <h2 class="mb-0 me-4 font-weight-bold text-6 text-color-custom-blue">{{ $dataset['name'] }}</h2>
            <div class="keywords-container" style="max-width: unset;">
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
                    data-collection='lldatasets'
                    data-collection-id="{{$dataset['_id']}}"
                    @class([
                        'fa-solid fa-heart heart_custom tooltip_custom favorites_toggle_icon'=>true,
                        'enabled'=>\App\Logic\UserHelper::hasFavorite(request()->user(), 'lldatasets', $dataset['_id'])
                    ])
                    type="button" data-toggle="tooltip" data-placement="top" title="Add to favorites"></i>
            @endauth

        </div>
        <p class="mb-0">
            {{ $dataset['llname'] ?? 'N/A' }}
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
        <div class="card_subsection lldatasets col-sm-12">
            <h4 class="mb-0 font-weight-semi-bold text-4 text-color-custom-blue">Digital Components</h4>
            <ul class="text-3-5 mb-3 list-unstyled">
                @foreach($components as $component)
                    <li>{{ $component }}</li>
                @endforeach
            </ul>
        </div>
        <div class="card_subsection lldatasets col-sm-12">
            <h4 class="mb-0 font-weight-semi-bold text-4 text-color-custom-blue">Type</h4>
            <ul class="text-3-5 mb-3 list-unstyled">
                @foreach($types as $type)
                    <li>{{ $type }}</li>
                @endforeach
            </ul>
        </div>
        @if (!empty($dataset['website']))
            <div class="card_subsection lldatasets col-sm-12">
                <h4 class="mb-0 font-weight-semi-bold text-4 text-color-custom-blue">Website</h4>
                <a target="_blank" class="text-3-5" href="{{$dataset['website']}}" style="white-space: nowrap; overflow: hidden; text-overflow: ellipsis; display: block; max-width: 100%;">{{$dataset['website']}}</a>
            </div>
        @endif
        
    </div>
    <div class="col_width">
        <div class="card_column card_column_responsive">
            <div class="flex_row align-items-stretch">
                <div class="card_subsection lldatasets col_custom">
                    <h4 class="mb-0 font-weight-semi-bold text-4 text-color-custom-blue">Living Lab Country</h4>
                    <ul class="text-3-5 mb-3 list-unstyled">
                        <li>{{$dataset['llcountry']}}</li>
                        
                    </ul>
                </div>
                <div class="card_subsection lldatasets col_custom">
                    <h4 class="mb-0 font-weight-semi-bold text-4 text-color-custom-blue">Application Scenarios</h4>
                    <ul class="text-3-5 mb-3 list-unstyled">
                        @foreach($appscenarios as $scenario)
                            <li>{{ $scenario }}</li>
                        @endforeach
                    </ul>
                </div>
                <div class="card_subsection lldatasets col_custom">
                    <h4 class="mb-0 font-weight-semi-bold text-4 text-color-custom-blue">Agricultural Sector</h4>
                    <ul class="text-3-5 mb-3 list-unstyled">
                        <li>{{$dataset['agrsectors']}}</li>
                    </ul>
                </div>
            </div>
            <div class="flex_row align-items-stretch">
                <div class="card_subsection lldatasets col_custom">
                    <h4 class="mb-0 font-weight-semi-bold text-4 text-color-custom-blue">Required Skill Level</h4>
                    <ul class="text-3-5 mb-3 list-unstyled">
                        <li>{{$dataset['skilllvl']}}</li>
                    </ul>
                </div>
                <div class="card_subsection lldatasets col_custom">
                    <h4 class="mb-0 font-weight-semi-bold text-4 text-color-custom-blue">Target users</h4>
                    <ul class="text-3-5 mb-3 list-unstyled">
                        @foreach($targetusers as $user)
                            <li>{{ $user }}</li>
                        @endforeach
                    </ul>
                </div>
                @if (!empty($dataset['origincountry']))
                    <div class="card_subsection lldatasets col_custom">
                        <h4 class="mb-0 font-weight-semi-bold text-4 text-color-custom-blue">Country of Origin</h4>
                        <ul class="text-3-5 mb-3 list-unstyled">
                            <li>{{$dataset['origincountry']}}</li>
                        </ul>
                    </div>
                @endif
                

            </div>
        </div>
        <div class="owl-carousel owl-theme nav-inside nav-inside-edge nav-squared nav-with-transparency nav-dark mt-4 mb-0" data-plugin-options="{'items': 1, 'margin': 10, 'loop': false, 'nav': true, 'dots': false}">
            @if(!empty($dataset['images']) && is_array($dataset['images']))
                @foreach($dataset['images'] as $image)
                    <div>
                        <div class="img-thumbnail border-0 p-0 d-block">
                            <img class="img-fluid border-radius-0" src='{{ Storage::disk("lldatasets")->url($image) }}' alt="">
                        </div>
                    </div>
                @endforeach
            @endif
        </div>
    </div>
</div>
