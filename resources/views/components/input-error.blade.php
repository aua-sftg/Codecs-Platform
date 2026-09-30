@props(['messages'])

@if ($messages)
    <ul {{ $attributes->merge(['class' => 'text-danger list-group list-group-flush']) }}>
        @foreach ((array) $messages as $message)
            <li class="list-group-item text-danger p-0 border-0">{{ $message }}</li>
        @endforeach
    </ul>
@endif
