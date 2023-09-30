<div class="dataset_card {{$containerClass}}">
    <div class="row">
        @isset($image)
            <div class="col-sm-4 mb-4 mb-sm-0 align-self-center">
                <div class="product mb-0">
                    <div class="product-thumb-info border-0 mb-0">
                        <a href="{{$link??'javascript:void(0)'}}">
                            <div class="product-thumb-info-image">
                                <img alt="" class="img-fluid" src="{{ $image }}">

                            </div>
                        </a>
                    </div>
                </div>
            </div>
        @endisset

        <div
            @class([
                'col-sm-12'=>!isset($image),
                'col-sm-8'=>isset($image),
            ])>
            <div class="summary entry-summary">

                <h2 class="mb-0 font-weight-bold text-6"><a href="{{$link??'javascript:void(0)'}}" class="text-color-custom-blue text-color-hover-primary text-decoration-none">{{ $title }}</a></h2>
                {{$afterTitle??''}}

                <div class="divider divider-small">
                    <hr class="bg-color-grey-scale-4">
                </div>

                <p class="text-3-5 mb-3 text-justify">{{ $exceptr }}</p>
            </div>
        </div>
    </div>
    <div class="d-flex justify-content-between text-2">
        <div class="d-flex keywords">
            @if(empty($keywords) == false)
                <div class="d-flex align-items-center">
                    <img class="mr-1" src="{{ asset('img/keywords-icon.svg') }}">
                    <span><strong class="text-color-dark mr_2">Keywords: </strong></span>
                </div>
               <div>
                   @foreach ($keywords as $keyword)
                       <span class="badge rounded-pill badge-primary">{{ strlen($keyword) > 25 ? substr($keyword, 0, 25) . '...' : $keyword }}</span>
                   @endforeach
               </div>

            @endif
        </div>
        @isset($actions)
            <div>
                {{$actions}}
            </div>
        @endisset
    </div>
</div>
