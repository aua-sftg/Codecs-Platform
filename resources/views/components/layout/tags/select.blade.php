@props(['name','options'=>[],'multiple'=>false,'id'=>'select-'.rand(),'selected'=>[]])

<select
    name="{{$name.($multiple?'[]':'')}}"
    class="form-control"
    @if($multiple) multiple="multiple" @endif
    id="{{$id}}"
>
    <option value="">-- Select --</option>
    @foreach($options as $id=>$label)
        <option @if(in_array($id,$selected)) selected="selected" @endif value="{{$id}}">{{$label}}</option>
    @endforeach
</select>
