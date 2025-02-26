<button {{ $attributes->merge(['type' => 'submit','id'=> bin2hex(random_bytes(10)),'class'=>'btn btn-primary fw-medium']) }}>
    <i class="fa-regular fa-floppy-disk"></i> ยืนยัน
</button>
