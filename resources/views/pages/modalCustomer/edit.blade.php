@extends('layouts.ajax_modal')
@section('content')

<x-form action="{{ route('modalCustomer.update',['modalCustomer'=>$customer]) }}">
    @method('put')
    <div class="modal-body">

        <input type="hidden" name="order_id" id="order_id" value="{{ $orderId }}">
        <div class="row">
            <div class="col-12 col-lg-6">
                <x-text-input name="fullname" label="ชื่อลูกค้า" value="{{ $customer->fullname }}" :required=true />

            </div>
            <div class="col-12 col-lg-6">
                <x-text-input name="mobile" label="หมายเลขโทรศัพท์" value="{{ $customer->mobile }}" :required=true />
            </div>
            <div class="col-12">
                <x-text-input name="address_line1" label="ที่อยู่" value="{{ $customer->address_line1 }}"
                    :required=true />
            </div>
        </div>
        <div class="row">
            <div class="col-12 col-lg-6">
                <label for="district" class="form-label mb-0">ตำบล <strong class="text-danger">*</strong></label>
                <input class="form-control mb-2" type="text" name="subdistrict" id="district"
                    value="{{ $customer->subdistrict }}">
            </div>
            <div class="col-12 col-lg-6">
                <label for="district" class="form-label mb-0">อำเภอ <strong class="text-danger">*</strong></label>
                <input class="form-control mb-2" type="text" name="district" id="amphoe"
                    value="{{ $customer->district }}">

            </div>
            <div class="col-12 col-lg-6">
                <label for="district" class="form-label mb-0">จังหวัด <strong class="text-danger">*</strong></label>
                <input class="form-control mb-2" type="text" name="province" id="province"
                    value="{{ $customer->province }}">
            </div>
            <div class="col-12 col-lg-6">
                <label for="district" class="form-label mb-0">รหัสไปรษณีย์ <strong
                        class="text-danger">*</strong></label>
                <input class="form-control mb-2" type="number" name="zipcode" id="zipcode"
                    value="{{ $customer->zipcode }}">
            </div>
        </div>

    </div>
    <div class="modal-footer">
        <x-button.save />
    </div>
</x-form>
@stop


@section('script')

<script type="text/javascript" src="{{ asset('assets/jquery.Thailand.js/dependencies/JQL.min.js') }}"></script>
<script type="text/javascript" src="{{ asset('assets/jquery.Thailand.js/dependencies/typeahead.bundle.js') }}"></script>

<link rel="stylesheet" href="{{ asset('assets/jquery.Thailand.js/dist/jquery.Thailand.min.css') }}">
<script type="text/javascript" src="{{ asset('assets/jquery.Thailand.js/dist/jquery.Thailand.min.js') }}"></script>

<script>
    $(document).ready(function(){

        $.Thailand({
            autocomplete_size:40,
            $district: $('#district'), // input ของตำบล
            $amphoe: $('#amphoe'), // input ของอำเภอ
            $province: $('#province'), // input ของจังหวัด
            $zipcode: $('#zipcode'), // input ของรหัสไปรษณีย์
        });

    });
</script>
@stop