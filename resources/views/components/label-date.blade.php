@props([
'date',
])
@if (!empty($date))
<small>{{ date('d/m/Y', strtotime($date)) }}</small>
@else
-
@endif