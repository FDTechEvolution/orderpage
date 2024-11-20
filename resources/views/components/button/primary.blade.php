<button {{ $attributes->merge(['type' => 'button','id'=>'','class'=>'btn btn-primary fw-medium']) }}>
    {{ $slot }}
</button>