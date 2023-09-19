@props(['value'])

<label {{ $attributes->merge(['class' => 'form-label text-color-dark text-3']) }}>
    {{ $value ?? $slot }}
    @if ($attributes->has('required'))
        <span class="text-color-danger">*</span>
    @endif
</label>
