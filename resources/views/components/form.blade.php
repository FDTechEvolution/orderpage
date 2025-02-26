@props(['action' => '','id'=>'frm_'.bin2hex(random_bytes(10)),'enctype'=>''])

<form action="{{ $action }}" novalidate data-error-scroll-up="true" enctype="multipart/form-data" {{ $attributes->
    merge(['method' => 'POST','id'=>$id,'class'=>'bs-validate p-2 p-md-3 rounded-xl']) }} data-error-toast-text="<i class='fi fi-circle-spin fi-spin float-start'></i> Please, complete all required fields!" data-error-toast-delay="3000" data-error-toast-position="top-center">
    @csrf

    {{ $slot }}
</form>
