<div class="upload-form-container">
    @php
        /** @var \Illuminate\Support\Collection $steps */
        $steps = \App\Logic\DatasetHelper::stepped_fields();

        $required_fields = \App\Logic\DatasetHelper::required_fields();
    @endphp

    <div class="stepper-wrapper">
        @foreach($steps->keys() as $step)
            <div

                @class([
                    'stepper-item'=>true,
                    'completed'=>$step<$current_step,
                    'active'=>$step==$current_step,
                ])
            >
                <div class="step-counter text-white fw-bold">{{$step}}</div>
            </div>
        @endforeach
    </div>

{{--    <form wire:submit.prevent="save">--}}
    @foreach($steps as $step=>$fields)
        <div data-step="{{$step}}" @class(['d-none'=>($current_step!=$step)])>
            <div class="d-flex align-items-center text-decoration-none justify-content-between">
                <h3>Step {{$step}} - {{$fields[0]['tab']}}</h3>
                <div class="d-flex gap-2">
                    <div class="invisible" wire:loading.class.remove="invisible">
                        <x-layout.loading-indicator></x-layout.loading-indicator>
                    </div>
                    <button wire:click="save_draft" class="bg-yellow text-white rounded-pill px-4">
                        <i class="fa fa-save"></i> Save draft
                    </button>
                </div>
            </div>
            @foreach($fields as $field)
                @php
                    $wire_model_name = $form_data_attribute_name.'.'.$field['name'];
                @endphp
                @switch($field['type'])
                    @case('text')
                    @case('url')
                        @include('livewire.dataset-inventory.partials.tags.input-text',['field'=>$field])
                        @break
                    @case('number')
                        @include('livewire.dataset-inventory.partials.tags.input-number',['field'=>$field])
                        @break
                    @case('date')
                        @include('livewire.dataset-inventory.partials.tags.input-date',['field'=>$field])
                        @break
                    @case('textarea')
                        @include('livewire.dataset-inventory.partials.tags.textarea',['field'=>$field])
                        @break
                    @case('select2_from_ajax_multiple')
                        @include('livewire.dataset-inventory.partials.tags.select2_from_ajax_multiple',['field'=>$field])
                        @break
                    @case('select2_multiple')
                        @include('livewire.dataset-inventory.partials.tags.select2_multiple',['field'=>$field])
                        @break
                    @case('select')
                    @case('select_from_array')
                        @include('livewire.dataset-inventory.partials.tags.select',['field'=>$field])
                        @break
                    @case('upload')
                        @include('livewire.dataset-inventory.partials.tags.upload',['field'=>$field])
                        @break
                    @default
                        @dump($field)
                        @break
                @endswitch
            @endforeach
        </div>
    @endforeach

    <div class="d-flex justify-content-center align-items-center gap-4">
        <x-layout.button
            @class([
                'bg-blue px-4 text-white'=>true
            ])
            :disabled="!$has_previous"
            wire:click="prev_step"
            wire.loading.attr="disabled"
            :label="__('Previous step')"
        ></x-layout.button>

        <x-layout.button
            @class([
                'bg-yellow px-4 text-white'=>true,'d-none'=>!$has_next
            ])
            wire:click="next_step"
            wire.loading.attr="disabled"
            :label="__('Next step')"
        ></x-layout.button>
        <x-layout.button
            @class([
                'bg-yellow px-4 text-white'=>true,'d-none'=>$has_next
            ])
            wire:click="save"
            wire.loading.attr="disabled"
            :label="__('Upload')"
        ></x-layout.button>

    </div>
    <div class="text-danger text-center mt-3">
        <div class="d-none" wire:loading.class.remove="d-none">
            <x-layout.loading-indicator></x-layout.loading-indicator>
        </div>
        @if($errors->any())
            There are errors in the form. please review the information provided at the steps!
        @endif
    </div>


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
</div>

