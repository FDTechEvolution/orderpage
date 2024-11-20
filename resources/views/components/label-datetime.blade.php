@props([
'datetime',
])
@if (!empty($datetime))
<small>{{ date('d/m/Y H:i', strtotime($datetime)) }}</small>
@endif