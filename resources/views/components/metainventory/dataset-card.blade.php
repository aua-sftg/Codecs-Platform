<div class="dataset_card{{ $source == 'Fairshare' ? ' fairshare' : '' }}{{ $source == 'Desira' ? ' desira' : '' }}{{ $source == 'smartAKIS' ? ' smartakis' : '' }}">
    <div class="row">
        <div class="col-sm-4 mb-4 mb-sm-0">
            <div class="product mb-0">
                <div class="product-thumb-info border-0 mb-0">
                    <a href="shop-product-sidebar-left.html">
                        <div class="product-thumb-info-image">
                            <img alt="" class="img-fluid" src="{{ $image }}">

                        </div>
                    </a>
                </div>
            </div>
        </div>
        <div class="col-sm-8">
            <div class="summary entry-summary">

                <h2 class="mb-0 font-weight-bold text-6"><a href="shop-product-sidebar-left.html" class="text-color-dark text-color-hover-primary text-decoration-none">{{ $title }}</a></h2>
                <div class="flex_row">
                    <p class="mb-0"><strong class="text-color-dark">Source:&nbsp;</strong>
                        {{$source}}
                    </p>
                    <p class="mb-0 mr_2"><strong class="text-color-dark">Last update:&nbsp;</strong>{{ date('d-m-y', strtotime($date)) }}</p>
                </div>

                <div class="divider divider-small">
                    <hr class="bg-color-grey-scale-4">
                </div>

                <p class="text-3-5 mb-3">{{ $short_desc }}</p>
            </div>
        </div>
    </div>
    <div>
        <ul class="list list-unstyled text-2">
            <li class="mb-0">
                <img class="mr-1" src="{{ asset('img/keywords-icon.svg') }}">
                <strong class="text-color-dark mr_2">Keywords: </strong>
                @foreach ($keywords as $keyword)
                    <span class="badge rounded-pill badge-primary">{{ $keyword }}</span>
                @endforeach

            </li>
        </ul>
    </div>
</div>

