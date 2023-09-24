@php
    $id = '$field-'.$field['name'];
    $name = $field['name'];
@endphp

<div class="form-group">
    <label class="fw-bold" for="field-{{$field['name']}}">
        {{$field['label']}}
        @if(in_array($field['name'], $required_fields))
            <span class="text-danger">*</span>
        @endif
    </label>
    <x-layout.tags.textarea
        :id="$id"
        :name="$field['name']"
    >{{$value}}</x-layout.tags.textarea>
    @isset($field['hint']) <small class="text-muted">{{$field['hint']}}</small> @endisset
    @error($field['name']) <span class="error text-danger">{{ $message }}</span> @enderror
</div>
