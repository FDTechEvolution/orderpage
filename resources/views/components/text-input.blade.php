@props(['disabled' => false,'name'=>'','label'=>'','required'=>false,'value'=>''])

<div class="form-floating mb-3">
    <input class="form-control" name="{{ $name }}" {{ $attributes->merge(['type' => 'text','id'=>$name]) }}
    @disabled($disabled)
    @required($required) value="{{ $value }}">
    <label for="{{ $name }}">{{ $label }} @if ($required) <strong class="text-danger">*</strong> @endif</label>
</div>