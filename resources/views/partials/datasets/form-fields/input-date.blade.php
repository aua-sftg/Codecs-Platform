<div class="form-group">
    <label class="fw-bold" for="field-{{$field['name']}}">
        {{$field['label']}}
        @if(in_array($field['name'], $required_fields))
            <span class="text-danger">*</span>
        @endif
    </label>
    <input wire:model.lazy="{{$wire_model_name??$field['name']}}" class="form-control rounded rounded-top" type="date" name="{{$field['name']}}" placeholder="{{$field['hint']??$field['label']}}" />
    @isset($field['hint'])
        <small class="text-muted">{{$field['hint']}}</small>
    @endisset
    @error($wire_model_name??$field['name']) <span class="error text-danger">{{ $message }}</span> @enderror
</div>
