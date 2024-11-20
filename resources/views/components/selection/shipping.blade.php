@props(['disabled' => false,'name'=>'','label'=>'','required'=>true,'default'=>''])

<div class="form-floating mb-3">
    <select class="form-select" name="{{ $name }}" {{ $attributes->merge(['id'=>$name]) }}>

        @foreach ($shippings as $index => $shipping)
        <option value="{{ $shipping->id }}" @selected($default==$shipping->id)>{{ $shipping->name }}</option>
        @endforeach

    </select>
    <label for="floatingSelect">{{ $label }} @if ($required) <strong class="text-danger">*</strong> @endif</label>
</div>