@props(['payment_method'=>'cod'])

@if (strtolower($payment_method) =='cod')
<span class="badge bg-warning text-dark">COD</span>
@else
<span class="badge bg-success">โอนเงิน</span>
@endif
