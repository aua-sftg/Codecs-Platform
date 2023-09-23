@php
    $id = 'field-'.$field['name'];
    $name = $field['name'];

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
    <label class="fw-bold" for="{{$id}}">
        {{$field['label']}}
        @if($required) <span class="text-danger">*</span> @endif
    </label>

    <x-layout.tags.select
        :id="$id"
        :name="$name"
        :options="$options"
        :selected="$value??null"
        :multiple="true"
    >

    </x-layout.tags.select>

    @isset($field['hint']) <small class="text-muted">{{$field['hint']}}</small> @endisset
    @error($field['name']) <span class="error text-danger">{{ $message }}</span> @enderror


    <script>
        $(document).ready(function() {

            const $select2Element = $('#{{$id}}');

            // Initialize select2
            $select2Element.select2();
        });
    </script>

</div>
