@php
    if(isset($field['model'])){
        $modelInstance = new $field['model'];
        $keyName = $modelInstance->getKeyName();
        $options = $modelInstance->all()->sortBy($field['attribute'])->pluck($field['attribute'], $keyName);
    }elseif (isset($field['options'])){
        $options = $field['options'];
    }

@endphp
<div class="form-group">
    <label class="fw-bold" for="field-{{$field['name']}}">
        {{$field['label']}}
        @if(in_array($field['name'], $required_fields))
            <span class="text-danger">*</span>
        @endif
    </label>
    <select name="{{$field['name']}}" wire:model="{{$wire_model_name??$field['name']}}" class="form-control" id="field-{{$field['name']}}">
        <option value="">Please select one</option>
        @foreach($options as $id=>$label)
            <option value="{{$id}}">{{$label}}</option>
        @endforeach
    </select>
    @isset($field['hint'])
        <small class="text-muted">{{$field['hint']}}</small>
    @endisset
    @error($wire_model_name??$field['name']) <span class="error text-danger">{{ $message }}</span> @enderror
</div>
