<button {{ $attributes->merge(['type' => 'button','id'=>'','class'=>'js-ajax-modal','data-href'=>'']) }}
    data-ajax-modal-size="modal-md" data-ajax-modal-centered="true" data-ajax-modal-backdrop="static">
    {{ $slot }}
</button>