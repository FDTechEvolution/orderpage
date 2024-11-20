@props(['disabled' => false,'name'=>'','label'=>'','required'=>false,'options'=>[],'all'=>true,'default'=>''])

<div class="form-floating mb-3">
    <select class="form-select" name="{{ $name }}" aria-label="" {{ $attributes->merge(['id'=>$name]) }}>
        @if ($all)
        <option value="" selected>-- ทั้งหมด --</option>
        @endif
        @foreach ($options as $key => $text)
        <option value="{{ $key }}">{{ $text }}</option>
        @endforeach

    </select>
    <label for="floatingSelect">{{ $label }}</label>
</div>