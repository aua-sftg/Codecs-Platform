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
               value="{{ $field['value'] }}"
               disabled="disabled"
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
                    <h5 class="modal-title" id="calculatorModalLabel">Calculator</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div id="query-builder"></div>
                    <div id="preview-results"></div>
                </div>
                <div class="modal-footer">
                    <a href="javascript:run()">Run Query</a>
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
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


        function run() {
            let result = $('#query-builder').queryBuilder('getRules');
            $.post('{{route('run-query')}}',{query:result},function(data){
                $('#preview-results').html(data);
            });
        }

        $('#useThisButton').click(function() {
            let result = JSON.stringify($('#query-builder').queryBuilder('getRules'));
            $('input[name="{{ $field['name'] }}"]').val(result);
            $('#calculatorModal').modal('hide');
        });

        $(document).ready(function(){
            $('#query-builder').queryBuilder({
                filters: [
                    {
                        id: 'name',
                        label: 'S: Name',
                        type: 'string',
                        optgroup: 'SmartAKIS'
                    },
                    {
                        id: 'age',
                        label: 'S: Age',
                        type: 'integer',
                        optgroup: 'SmartAKIS'
                    },
                    {
                        id: 'created_at',
                        label: 'Creation Date',
                        type: 'datetime'
                    }
                ]
            });
        });

        function bpFieldInitDummyFieldElement(element) {
            // this function will be called on pageload, because it's
            // present as data-init-function in the HTML above; the
            // element parameter here will be the jQuery wrapped
            // element where init function was defined
            console.log(element.val());


        }
    </script>
    @endLoadOnce
@endpush
