@extends('layouts.ajax_modal')
@section('content')

<x-form action="{{ route('modalOrder.update',['modalOrder'=>$order]) }}">
    @method('put')
    <div class="modal-body">
        <x-input.text name="description" label="รายละเอียด" value="{{ $order->description }}" />

        <x-selection.shipping name="shipping_id" label="ขนส่ง" default="{{ $order->shipping_id }}" />
        <x-input.text name="trackingno" label="หมายเลขพัสดุ" value="{{ $order->trackingno }}" />
        <div class="row">
            <div class="col-12 text-center">
                <x-button.save />
            </div>
        </div>
    </div>

</x-form>
@stop