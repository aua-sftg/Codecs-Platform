@php
    $modelInstance = new $field['model'];
    $keyName = $modelInstance->getKeyName();
    $options = $modelInstance->all()->sortBy($field['attribute'])->pluck($field['attribute'], $keyName);

    $name = $field['name'].'[]';
    $tag_id = 'field-'.$field['name'];
@endphp
<div class="form-group" wire:ignore>
    <label class="fw-bold" for="field-{{$tag_id}}">
        {{$field['label']}}
        @if(in_array($field['name'], $required_fields))
            <span class="text-danger">*</span>
        @endif
    </label>
    <select name="{{$field['name']}}[]" multiple="multiple" wire:model="{{$wire_model_name??$field['name']}}" class="form-control" id="{{$tag_id}}">
        @foreach($options as $id=>$label)
            <option value="{{$id}}">{{$label}}</option>
        @endforeach
    </select>
    @isset($field['hint'])
        <small class="text-muted">{{$field['hint']}}</small>
    @endisset
    @error($wire_model_name??$field['name']) <span class="error text-danger">{{ $message }}</span> @enderror


    <script>
        $(document).ready(function() {
            $('#{{$tag_id}}').select2();
            $('#{{$tag_id}}').on('change',(e)=>{
                @this.updateField('{{$field['name']}}', $('#{{$tag_id}}').select2().val());
            });

        });
    </script>

</div>
