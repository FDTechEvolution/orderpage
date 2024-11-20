@props([
'isactive'=>'N',
])

@if ($isactive=='Y')
<span class="badge bg-success">ตรวจรับเงิน COD แล้ว</span>
@else
<span class="badge bg-danger">ยังไม่ได้ตรวจรับเงิน COD</span>
@endif