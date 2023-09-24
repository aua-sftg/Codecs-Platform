@props(['name','hint'=>null,'id'=>'field-'.rand(),'placeholder'=>null])

<textarea
    class="form-control rounded rounded-top"
    name="{{$name}}"
    id="{{$id}}"
    @if($placeholder!=null) placeholder="{{$placeholder}}" @endif
>{{$slot}}</textarea>
