<button {{ $attributes->merge(['type' => 'submit', 'class' => ' px-4 py-2 btn btn-primary border-0']) }}>
    {{ $slot }}
</button>
