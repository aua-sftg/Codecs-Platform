@php
    if(isset($field['model'])){
        $modelInstance = new $field['model'];
        $keyName = $modelInstance->getKeyName();
        $options = $modelInstance->all()->sortBy($field['attribute'])->pluck($field['attribute'], $keyName);
    }elseif (isset($field['options'])){
        $options = $field['options'];
    }

    $required = $required ?? false;
@endphp
<div class="form-group">
    <label class="fw-bold" for="field-{{$field['name']}}">
        {{$field['label']}}
        @if($required) <span class="text-danger">*</span> @endif
    </label>

    <x-layout.tags.select
        :id="'field-'.$field['name']"
        :name="$field['name']"
        :options="$options"
        :selected="[$value??null]"
        :multiple="$field['multiple']??false"
    ></x-layout.tags.select>

    @isset($field['hint']) <small class="text-muted">{{$field['hint']}}</small> @endisset
    @error($field['name']) <span class="error text-danger">{{ $message }}</span> @enderror
</div>
