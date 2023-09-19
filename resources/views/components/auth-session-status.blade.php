@props(['status'])

@if ($status)
    <div {{ $attributes->merge(['class' => 'text-green']) }}>
        {{ $status }}
    </div>
@endif
