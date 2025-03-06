<div class="form-floating mb-3">
    <select class="form-select" name="product_category_id" id="product_category_id">
        @if ($all)
        <option value="" selected>-- ทั้งหมด --</option>
        @endif
        @foreach ($productCategoryOptions as $key => $text)
        <option value="{{ $key }}">{{ $text }}</option>
        @endforeach

    </select>
    <label for="product_category_id">กลุ่มสินค้า</label>
</div>
