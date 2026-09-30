@php
    $modelInstance = new $field['model'];
    $keyName = $modelInstance->getKeyName();
    $options = $modelInstance->all()->sortBy($field['attribute'])->pluck($field['attribute'], $keyName);

    $name = $field['name'].'[]';
    $tag_id = 'field-'.time().'-'.$field['name'];

    $select_options = [];
    foreach ($value??[] as $key=>$label){
        // if the value is in json format then it's a value from old function
        // so the key is the json value in order for the save controller to handle it
        // and the label is within the json, so we need to decode it and extract it.
        if(\Illuminate\Support\Str::isJson($label)){
            $key = $label;
            $label = json_decode($label, true);
            $label = $label['label'];
        } elseif(is_int($key) && is_string($label)) {
            // it is record id from the database so i need to find the appropriate label
            $key = $label;
            $label = $options->get($key);
        }
        $select_options[$key] = $label;
    }

    $value = $select_options;
@endphp
<div class="">
    <div class="form-group" wire:ignore>
        <label class="fw-bold" for="{{$tag_id}}">
            {{$field['label']}}
            @if(in_array($field['name'], $required_fields))
                <span class="text-danger">*</span>
            @endif
        </label>
        <select name="{{$field['name']}}[]" multiple="multiple" class="form-control" id="{{$tag_id}}">
            @foreach($value??[] as $key=>$label)
                <option value="{{$key}}">{{$label}}</option>
            @endforeach
        </select>
        @isset($field['hint'])
            <small class="text-muted">{{$field['hint']}}</small>
        @endisset
        @error($wire_model_name??$field['name']) <span class="error text-danger">{{ $message }}</span> @enderror

    </div>

    <script>
        $(document).ready(()=>{
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
                        return{
                            results: $.map(data, function (item) {
                                return {
                                    text:item['name'],
                                    id: item['_id']
                                }
                            })
                        };

                    }
                }
            });
            $('#{{$tag_id}}').val(@json(array_keys($value??[]))).trigger('change');
        });
    </script>
</div>


