@php
    $modelInstance = new $field['model'];
    $keyName = $modelInstance->getKeyName();
    $options = $modelInstance->all()->sortBy($field['attribute'])->pluck($field['attribute'], $keyName);

    $name = $field['name'].'[]';
    $tag_id = 'field-'.$field['name'];
@endphp
<div class="">
    <div class="form-group" wire:ignore>
        <label class="fw-bold" for="field-{{$field['name']}}">
            {{$field['label']}}
            @if(in_array($field['name'], $required_fields))
                <span class="text-danger">*</span>
            @endif
        </label>
        <select name="{{$field['name']}}[]" multiple="multiple" wire:model="{{$wire_model_name??$field['name']}}" class="form-control" id="{{$tag_id}}">
        </select>
        @isset($field['hint'])
            <small class="text-muted">{{$field['hint']}}</small>
        @endisset
        @error($wire_model_name??$field['name']) <span class="error text-danger">{{ $message }}</span> @enderror

    </div>

    <script>

        document.addEventListener('livewire:load', function () {
            {{$field['name']}}_initializeSelect2();
        });

        document.addEventListener('livewire:update', function () {
            {{$field['name']}}_initializeSelect2();
        });

        function {{$field['name']}}_initializeSelect2() {
            $('#{{$tag_id}}').select2({
                placeholder: '{{$field['placeholder']??''}}',
                minimumInputLength:2,
                cache:true,
                dropdownParent: $(document.body),
                ajax: {
                    url: '{{ $field['data_source'] }}',
                    delay: 500,
                    dataType: 'json',
                    method:'POST',

                    processResults: (data)=>{
                        console.log(data)

                        return{
                            results: $.map(data, function (item) {
                                return {
                                    text:item['name'],
                                    id: item['_id']
                                }
                            })
                        };

                    }
                    // Additional AJAX parameters go here; see the end of this chapter for the full code of this example
                }
            });
            $('#{{$tag_id}}').on('change',(e)=>{
                @this.updateField('{{$field['name']}}', $('#{{$tag_id}}').select2().val());
                $('#{{$tag_id}}').select2().cl
            });
        }
    </script>
</div>


