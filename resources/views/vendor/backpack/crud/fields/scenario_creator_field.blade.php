{{-- scenario_creator_field_field field --}}
@php
    $field['value'] = old_empty_or_null($field['name'], '') ?? ($field['value'] ?? ($field['default'] ?? ''));
@endphp

@include('crud::fields.inc.wrapper_start')
    <label>{!! $field['label'] !!}</label>
    @include('crud::fields.inc.translatable_icon')

    <div class="d-flex">
        <input
            type="text"
            name="{{ $field['name'] }}"
            data-init-function="bpFieldInitDummyFieldElement"
            value="{{ old($field['name']) ? old($field['name']) : (isset($field['value']) ? $field['value'] : (isset($field['default']) ? $field['default'] : '' )) }}"
            readonly
            @include('crud::fields.inc.attributes')>

        <a href="javascript:void(0)" class="btn btn-primary" data-toggle="modal" data-target="#calculatorModal">Calc</a>
    </div>


    {{-- HINT --}}
    @if (isset($field['hint']))
        <p class="help-block">{!! $field['hint'] !!}</p>
    @endif
@include('crud::fields.inc.wrapper_end')

{{-- CUSTOM CSS --}}
@push('crud_fields_styles')
    {{-- How to load a CSS file? --}}
    @loadOnce('css/query-builder.default.css')

    {{-- How to add some CSS? --}}
    @loadOnce('scenario_creator_field_field_style')
        <style>
            .scenario_creator_field_field_class {
                display: none;
            }
            .rules-group-container {
                width: 100%;
            }
        </style>
    @endLoadOnce
@endpush

{{-- CUSTOM JS --}}
@push('crud_fields_scripts')
    <!-- Calculator Modal -->
    <div class="modal fade" id="calculatorModal" tabindex="-1" role="dialog" aria-labelledby="calculatorModalLabel" aria-hidden="true"  style="z-index: 2222 !important;">
        <div class="modal-dialog modal-xl" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="calculatorModalLabel">Scenario creation tool</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="row mt-3">
                        @foreach(\App\Logic\MetaInventory::VENDORS as $vendor)
                            <div class="col-4" id="{{$vendor['key']}}-container">
                                <h4 class="title">{{$vendor['label']}}</h4>
                                <div id="{{$vendor['key']}}-query-builder"></div>
                            </div>
                        @endforeach

                    </div>

                    <div id="preview-results"></div>
                    <div class="text-center d-none" id="loading-indicator">
                        <em>Searching...</em>
                        <img src="{{asset('img/loading.gif')}}" alt="loading icon">
                    </div>
                </div>
                <div class="modal-footer">
                    <a href="javascript:run()">Run Query</a>
                    <button type="button" class="btn btn-secondary" onclick="closeModal()">Close</button>
                    <button type="button" class="btn btn-primary" id="useThisButton">Use this</button>
                </div>
            </div>
        </div>
    </div>

    {{-- How to add some JS to the field? --}}
    @loadOnce('bpFieldInitDummyFieldElement')
    <script type="text/javascript" src="{{asset('js/jquery-extendext.js')}}"></script>
    <script type="text/javascript" src="{{asset('js/query-builder.js')}}"></script>
    <script>

        const $input = $('input[name="{{ $field['name'] }}"]');
        const $modal = $('#calculatorModal');
        const $preview = $('#preview-results');
        const $loading = $('#loading-indicator');
        let post_request = null;


        const closeModal = ()=>{
            init();
            $modal.modal('hide');
        }
        const show_loader = (status)=>{
            if(status)
            {
                $loading.removeClass('d-none');
                $preview.addClass('d-none');
            }
            else
            {
                $loading.addClass('d-none');
                $preview.removeClass('d-none');
            }
        }

        const getRules = ()=>{
            return {
                @foreach(\App\Logic\MetaInventory::VENDORS as $vendor)
                '{{$vendor['key']}}': $('#{{$vendor['key']}}-query-builder').queryBuilder('getRules'),
                @endforeach
            };
        };

        const run = ()=>{
            if(post_request!=null)
                post_request.abort();

            show_loader(true);
            post_request = $.post(
                '{{route('run-query')}}',
                {
                    rules: getRules()
                },
                function(data){
                    show_loader(false);
                    $preview.html(data);
                }
            );
        }

        const init = ()=>{
            if($input.val()!='')
            {
                let rules = JSON.parse($input.val());
                @foreach(\App\Logic\MetaInventory::VENDORS as $vendor)
                if(rules['{{$vendor['key']}}']!=undefined)
                    $('#{{$vendor['key']}}-query-builder').queryBuilder('setRules', rules['{{$vendor['key']}}']);
                @endforeach
            }

            $preview.html('');
            show_loader(false);
        }

        $('#useThisButton').click(function() {
            let rules = getRules();
            let result = JSON.stringify(rules);
            $input.val(result);
            $modal.modal('hide');
        });


        $(document).ready(function(){
            @foreach(\App\Logic\MetaInventory::VENDORS as $vendor)
                $('#{{$vendor['key']}}-query-builder').queryBuilder({
                    filters:@json($vendor['filters'])
                });
            @endforeach

            init();
        });

        function bpFieldInitDummyFieldElement(element) {
            // this function will be called on pageload, because it's
            // present as data-init-function in the HTML above; the
            // element parameter here will be the jQuery wrapped
            // element where init function was defined

        }
    </script>
    @endLoadOnce
@endpush
