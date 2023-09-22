@props(['label','link','disabled'=>false])

<button
    {{ $attributes->merge(['class' => 'rounded-pill  text-decoration-none ']) }}
    {{$attributes->except(['class'])}}
    @disabled($disabled)
>
    {{$label}}
</button>
