<div class="row">
    <div class="col-12 col-lg-6">
        <x-selection-product-category />
    </div>
    <div class="col-12 col-lg-6">
        <x-selection label="สินค้า" name="product_id" :options="[]" />
    </div>
</div>


@section('script')
<script>
    $(document).ready(function() {
        $('#product_category_id').change(function() {
            let categoryId = $(this).val();
            $('#product_id').html('<option value="">กำลังโหลด...</option>');

            $.ajax({
                url: "{{ route('apiProduct.byCategory') }}"
                , type: "GET"
                , data: {
                    product_category_id: categoryId
                }
                , success: function(data) {
                    let options = '<option value="">-- ทั้งหมด --</option>';
                    $.each(data, function(key, value) {
                        options += `<option value="${key}">${value}</option>`;
                    });
                    $('#product_id').html(options);
                }
            });
        });
    });

</script>
@stop
