@props(['id','name','value'=>null,'hint'=>null,'type'=>'text','required'=>false, 'placeholder'=>null])

<input
    name="{{$name}}"
    class="form-control rounded rounded-top"
    type="{{$type}}"
    value="{{$value??''}}"
    @if($placeholder!=null) placeholder="{{$placeholder}}" @endif
    id="{{$id}}"
/>
