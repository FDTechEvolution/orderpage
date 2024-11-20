@props([
'date',
])
@if (!empty($date))
<span>{{ thaidate('l j F Y H:i', $date) }}</span>
@endif