@props(['href' => ''])

<a href="#!" data-ajax-modal-size="modal-lg" data-ajax-modal-centered="true" data-ajax-modal-backdrop="static"
    data-href="{{ $href }}" {{ $attributes->merge(['class' => 'js-ajax-modal']) }}>
    {{ $slot }}
</a>