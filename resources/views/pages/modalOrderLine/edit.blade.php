@extends('layouts.ajax_modal')
@section('content')

<x-form action="{{ route('modalOrderLine.update',['modalOrderLine'=>$orderLine]) }}" class="collapse show">
    @method('put')
    <div class="modal-body">

        <div class="row">
            <div class="col-12 ">
                <div class="form-floating mb-3">
                    <select class="form-select" id="product_category_id" name="product_category_id" required>
                        @foreach ($productCategories as $key => $item)
                        <option value="{{$item->id}}">{{ $item->name }}</option>
                        @endforeach
                    </select>
                    <label for="product_category_id">กลุ่มสินค้า<strong class="text-danger">*</strong></label>
                </div>
            </div>
            <div class="col-12 ">
                <div class="form-floating mb-3">
                    <select class="form-select" id="product_id" name="product_id" required>

                    </select>
                    <label for="product_id">สินค้า<strong class="text-danger">*</strong></label>
                </div>
            </div>
        </div>
        <hr>
        <div class="row">
            <div class="col-12 col-lg-6">
                <x-text-input name="qty" type="number" value="{{ $orderLine->qty }}" label="จำนวน" :required=true />
            </div>
            <div class="col-12 col-lg-6">
                <x-text-input name="amount" type="number" value="{{ $orderLine->amount }}" label="ราคารวม"
                    :required=true />
            </div>
        </div>

    </div>
    <div class="modal-footer">
        <x-button.save />
    </div>
</x-form>
@stop



<script>
    $(document).ready(function(){
        let categories ={!! ($productCategoryJson) !!};
        let product_category_id = '{{ $orderLine->product->product_category_id }}';
        let product_id = '{{ $orderLine->product->id }}';

        $('#product_category_id').on('change',function(){
            console.log(product_category_id);
            const categoryId = document.getElementById('product_category_id').value;
            const productSelect = document.getElementById('product_id');

            // ล้างสินค้าเดิมในรายการ
            productSelect.innerHTML = '<option value="">เลือกสินค้า</option>';

            // ค้นหาหมวดหมู่สินค้า
            const category = categories.find(c => c.id == categoryId);

            if (category) {
                // เพิ่มตัวเลือกสินค้า
                category.active_products.forEach(product => {
                    const option = document.createElement('option');
                    option.value = product.id;
                    option.textContent = product.name;
                    productSelect.appendChild(option);
                });
            }
        });
        $('#product_category_id').val(product_category_id).trigger("change");
        $('#product_id').val(product_id).trigger("change");


    });
</script>