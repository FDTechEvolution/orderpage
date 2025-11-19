@props(['disabled' => false,'name'=>'shiping_id','label'=>'บริษัทขนส่ง','required'=>true,'default'=>''])

<div class="form-floating mb-3">
    <select class="form-select" name="{{ $name }}" {{ $attributes->merge(['id'=>$name]) }}>
        <option value="">- All -</option>
        @foreach ($shippings as $index => $shipping)
        <option value="{{ $shipping->id }}" @selected($default==$shipping->id)>{{ $shipping->name }}</option>
        @endforeach

    </select>
    <label for="floatingSelect">{{ $label }} @if ($required) <strong class="text-danger">*</strong> @endif</label>
</div>
