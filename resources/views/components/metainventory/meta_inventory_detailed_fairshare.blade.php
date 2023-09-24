@props(['dataset'])

@php
    $keywords = explode(',', $dataset['keywords'])

@endphp

<div class="dataset_card fairshare mt-5">
    <div class="col-sm-12">
        <div class="summary entry-summary flex-wrap flex_row">
            <h2 class="mb-0 font-weight-bold text-6 text-color-custom-blue">{{ $dataset['name'] }}</h2>
            <div>
                @if(empty($keywords) == false)
                    @foreach ($keywords as $keyword)
                        <span class="badge rounded-pill badge-primary">{{ $keyword }}</span>
                    @endforeach
                @endif
            </div>
            <i class="fa-solid fa-heart heart_custom tooltip_custom" type="button" data-toggle="tooltip" data-placement="top" title="Add to favorites"></i>
        </div>
        <p class="mb-0">
            <a target="_blank" class="text-color-dark" href="{{$dataset['providerWebsite']}}">{{$dataset['providerName']}}</a><span class="ms-5 text-color-dark">{{$dataset['launchYear']}}</span>
        </p>
        <div class="divider divider-small">
            <hr class="bg-color-grey-scale-4">
        </div>
        <p class="text-3-5 mb-3 text-justify">{{ $dataset['desc'] }}</p>
    </div>
</div>
<div class="col-sm-12 my-4 flex_row px-0">
    <div class="card_column col-sm-4">
        <div class="card_subsection col-sm-12">
            <h4 class="mb-0 font-weight-bold text-4 text-color-custom-blue">Agricultural sectors</h4>
            <p class="text-3-5 mb-3">{{ $dataset['desc'] }}</p>
        </div>
    </div>
</div>
