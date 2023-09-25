@php
    /** @var \Illuminate\Support\Collection $steps */
    $steps = \App\Logic\DatasetHelper::stepped_fields();

    /** @var \App\Logic\DatasetHelper $required_fields */
    $required_fields = \App\Logic\DatasetHelper::required_fields();
@endphp

<x-layout.layout :livewire_enable="true">
    <x-slot:title>
        Codecs | Meta-Inventory
    </x-slot:title>
    <x-slot:keywords>
        Codecs, meta-inventory
    </x-slot:keywords>
    <x-slot:description>
        Codecs | Meta-Inventory
    </x-slot:description>

    <x-slot:hero_section>
        <x-layout.hero_simple>
            <x-slot:current_view>
                {{auth()->user()->name.' '. __('Datasets') }}
            </x-slot:current_view>
        </x-layout.hero_simple>
    </x-slot:hero_section>

    <x-slot:main_body>
        <div class="container py-4">
            <div class="row ">
                <div class="col-md-12 col-lg-12 mb-5 mb-lg-0">
                    <div class="stepper-wrapper pb-4">
                        @foreach($steps->keys() as $step)
                            <div
                                @class([
                                    'stepper-item'=>true,
                                    'completed'=>$step==1,
                                    'active'=>$step==1,
                                ])
                                data-step-icon="{{$step}}"
                            >
                                <div class="step-counter text-white fw-bold">{{$step}}</div>
                            </div>
                        @endforeach
                    </div>

                    <form method="POST" enctype="multipart/form-data" action="{{route('datasets.form.save')}}">
                        @csrf
                        <input type="hidden" name="dataset_id" value="{{$dataset->id??null}}">
                        @foreach($steps as $step=>$fields)
                            <div data-step="{{$step}}">
                                <div class="d-flex flex-column flex-md-row align-items-md-center align-items-start text-decoration-none justify-content-between ">
                                    <h3 class="my-2">Step {{$step}} - {{$fields[0]['tab']}}</h3>
                                    <a href="javascript:Form.save_draft()" class="bg-yellow text-decoration-none save_draft_btn text-white align-self-center my-3 rounded-pill px-4"><i class="fa fa-save"></i> Save draft</a>
                                </div>

                                @foreach($fields as $field)
                                    @php
                                        $required = in_array($field['name'],$required_fields);

                                        $value = old($field['name']);
                                        if (isset($dataset)) {
                                            $value = match ($field['type']){
                                                'select2_multiple' => old($field['name'], $dataset->{$field['entity']}()->get()->pluck('id')->toArray() ?? null),
                                                'select2_from_ajax_multiple' => old($field['name'], $dataset->{$field['entity']}()->get()->pluck('name','id')->toArray() ?? null),
                                                default => old($field['name'], $dataset->getAttributes()[$field['name']] ?? null)
                                            };
                                        }
                                    @endphp

                                    @switch($field['type'])
                                        @case('text')
                                        @case('url')
                                        @case('date')
                                        @case('number')
                                            @include('partials.datasets.form-fields.input-text',['field'=>$field])
                                            @break
                                        @case('select')
                                        @case('select_from_array')
                                            @include('partials.datasets.form-fields.select',['field'=>$field])
                                            @break
                                        @case('textarea')
                                            @include('partials.datasets.form-fields.textarea',['field'=>$field])
                                            @break
                                        @case('select2_from_ajax_multiple')
                                            @include('partials.datasets.form-fields.select2_from_ajax_multiple',['field'=>$field])
                                            @break
                                        @case('select2_multiple')
                                            @include('partials.datasets.form-fields.select2_multiple',['field'=>$field])
                                            @break
                                        @case('upload')
                                            @include('partials.datasets.form-fields.upload',['field'=>$field])
                                            @break
                                    @endswitch
                                @endforeach
                            </div>
                        @endforeach

                        <div class="d-flex justify-content-center align-items-center gap-2">
                            <a href="javascript:Form.prev_step()" id="prev_btn" class="rounded-pill bg-blue p-1 px-4 fw-bold text-white  text-decoration-none">Previous</a>
                            <a href="javascript:Form.next_step()" id="next_btn" class="rounded-pill bg-yellow p-1 px-4 fw-bold text-white text-decoration-none">Next</a>
                            <a href="javascript:Form.submit()" id="submit_btn" class="d-none rounded-pill bg-yellow p-1 px-4 fw-bold text-white text-decoration-none">Upload</a>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </x-slot:main_body>


    <x-slot:head_scripts>
        <link href="{{asset('packages/select2/dist/css/select2.min.css')}}" rel="stylesheet"/>
        <style>
            .upload-form-container{
                margin:10px 0;
            }

            .upload-form-container .form-group{
                margin:30px 0;
            }

            .stepper-wrapper {
                margin-top: auto;
                display: flex;
                justify-content: space-between;
                margin-bottom: 20px;
            }
            .stepper-item {
                position: relative;
                display: flex;
                flex-direction: column;
                align-items: center;
                flex: 1;

                @media (max-width: 768px) {
                    font-size: 12px;
                }
            }

            .stepper-item::before {
                position: absolute;
                content: "";
                border-bottom: 2px solid #cfda9d;
                width: 100%;
                top: 20px;
                left: -50%;
                z-index: 2;
            }

            .stepper-item::after {
                position: absolute;
                content: "";
                border-bottom: 2px solid #cfda9d;
                width: 100%;
                top: 20px;
                left: 50%;
                z-index: 2;
            }

            .stepper-item .step-counter {
                position: relative;
                z-index: 5;
                display: flex;
                justify-content: center;
                align-items: center;
                width: 40px;
                height: 40px;
                border-radius: 50%;
                background: #cfda9d;
                margin-bottom: 6px;
            }

            .stepper-item.active {
                font-weight: bold;
            }

            .stepper-item.completed .step-counter, .stepper-item.active .step-counter {
                background-color: #A0B63C;
            }

            .stepper-item.completed::after {
                position: absolute;
                content: "";
                border-bottom: 2px solid #A0B63C;
                width: 100%;
                top: 20px;
                left: 50%;
                z-index: 3;
            }

            .stepper-item:first-child::before {
                content: none;
            }
            .stepper-item:last-child::after {
                content: none;
            }

            button[disabled]{
                opacity:0.5;
            }
        </style>
    </x-slot:head_scripts>

    <x-slot:body_scripts>
        <script src="{{asset('packages/select2/dist/js/select2.min.js')}}"></script>

        <script>
            let Form = {
                LAST_STEP: {{count($steps)}},
                CURRENT_STEP: 1,
                next_step: ()=>{
                    if(Form.CURRENT_STEP<Form.LAST_STEP){
                        Form.CURRENT_STEP++;
                        Form.show_step(Form.CURRENT_STEP);
                    }
                },
                prev_step: ()=>{
                    if(Form.CURRENT_STEP>1){
                        Form.CURRENT_STEP--;
                        Form.show_step(Form.CURRENT_STEP);
                    }
                },
                show_step: (step)=>{
                    $('[data-step]').hide();
                    $('[data-step="'+step+'"]').fadeIn();
                    $('[data-step-icon="'+step+'"]').addClass('active');
                    $("html, body").animate({ scrollTop: 0 }, 1000);
                    if(Form.CURRENT_STEP===Form.LAST_STEP)
                    {
                        $('#next_btn').addClass('d-none');
                        $('#submit_btn').removeClass('d-none');
                    }
                },
                save_draft : ()=>{
                    $('select[name="status"]').val('draft');
                    $('.save_draft_btn').html('<i class="fa fa-spinner fa-spin"></i> Saving...');
                    Form.submit();
                },
                submit : ()=>{
                    let $submitBtn = $('#submit_btn');
                    $submitBtn.addClass('disabled');
                    $submitBtn.html('<i class="fa fa-spinner fa-spin"></i> Uploading...');
                    $submitBtn.attr('disabled',true);
                    $submitBtn.closest('form').submit();
                }
            };

            $(document).ready(()=>{
                Form.show_step(Form.CURRENT_STEP);
            });
        </script>
    </x-slot:body_scripts>
</x-layout.layout>
