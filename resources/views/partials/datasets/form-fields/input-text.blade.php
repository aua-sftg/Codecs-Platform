@php
    $id = 'field-'.$field['name'];
    $label = $field['label'];
    $name = $field['name'];
    $required=$required??false;
@endphp

<div class="form-group">
    <label class="fw-bold" for="{{$id}}">
        {{$label}}
        @if($required) <span class="text-danger">*</span> @endif
    </label>

    <x-layout.tags.input
        :id="$id"
        :name="$field['name']"
        :type="$field['type']"
        placeholder="lorem ipsum"
        :value="$value??null"
    ></x-layout.tags.input>

    @isset($field['hint']) <small class="text-muted">{{$field['hint']}}</small> @endisset
    @error($name) <span class="error text-danger">{{ $message }}</span> @enderror

</div>
