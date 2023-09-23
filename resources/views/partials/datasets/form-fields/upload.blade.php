<div class="form-group" wire:ignore>
    <label class="fw-bold" for="field-{{$field['name']}}">
        {{$field['label']}}
        @if(in_array($field['name'], $required_fields))
            <span class="text-danger">*</span>
        @endif
    </label>

    @if(isset($data['file']) && $data['file']!='')
        <div class="my-1">
            <a href="{{Storage::url('datasets/'.$data['file'])}}" target="_blank" class="text-black-50">
                Uploaded file is : {{$data['file']}}
            </a>
        </div>
    @endif


    @if(isset($dataset) && $dataset->file)
        <div class="my-1">
            <a href="{{Storage::url('datasets/'.$dataset->file)}}" class="btn btn-primary" target="_blank"> Uploaded File: {{$dataset->file}} </a>
        </div>
    @endif

    <input
        id="field-{{$field['name']}}"
        class="form-control rounded rounded-top"
        type="file"
        name="{{$field['name']}}"
        placeholder="{{$field['hint']??$field['label']}}" />

    @isset($field['hint']) <small class="text-muted">{{$field['hint']}}</small> @endisset
    @error($field['name']) <span class="error text-danger">{{ $message }}</span> @enderror

</div>
