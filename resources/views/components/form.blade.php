@props(['action' => '','id'=>'frm','enctype'=>''])

<form action="{{ $action }}" novalidate data-error-scroll-up="true" enctype="multipart/form-data" {{ $attributes->
    merge(['method' => 'POST','id'=>$id,'class'=>'bs-validate p-2 p-md-3 rounded-xl']) }}>
    @csrf

    {{ $slot }}
</form>
