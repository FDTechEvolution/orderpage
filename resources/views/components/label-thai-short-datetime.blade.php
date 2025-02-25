@props([
'date',
])
@if (!empty($date))
<span>{{ thaidate('l j/m/Y H:i', $date) }}</span>
@endif
