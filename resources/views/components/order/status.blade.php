@props(['status'=>''])

@if ($status == 'DR')
<span class="badge bg-secondary-soft rounded-pill d-inline-flex align-items-center">
    <span class="bull bull-lg bg-secondary me-2 animate-pulse-secondary"></span>
    <span>{{ $statuses[$status] }}</span>
</span>
@elseif($status == 'CF')
<span class="badge bg-success-soft rounded-pill d-inline-flex align-items-center">
    <span class="bull bull-lg bg-success me-2 animate-pulse-success"></span>
    <span>{{ $statuses[$status] }}</span>
</span>
@elseif($status == 'P1')
<span class="badge bg-success-soft rounded-pill d-inline-flex align-items-center">
    <span class="bull bull-lg bg-success me-2 animate-pulse-success"></span>
    <span>{{ $statuses[$status] }}</span>
</span>
@elseif($status == 'WS')
<span class="badge bg-success-soft rounded-pill d-inline-flex align-items-center">
    <span class="bull bull-lg bg-success me-2 animate-pulse-success"></span>
    <span>{{ $statuses[$status] }}</span>
</span>
@elseif($status == 'ST')
<span class="badge bg-success-soft rounded-pill d-inline-flex align-items-center">
    <span class="bull bull-lg bg-success me-2"></span>
    <span>{{ $statuses[$status] }}</span>
</span>
@elseif($status == 'DV')
<span class="badge bg-success-soft rounded-pill d-inline-flex align-items-center">
    <span class="bull bull-lg bg-success me-2"></span>
    <span>{{ $statuses[$status] }}</span>
</span>

@elseif(in_array($status,['VO','ACC','RT','VO_RETURN']))
<span class="badge bg-danger-soft rounded-pill d-inline-flex align-items-center">
    <span class="bull bull-lg bg-danger me-2 animate-pulse-danger"></span>
    <span>{{ $statuses[$status] }}</span>
</span>
@elseif($status == 'RECEIVED')
<span class="badge bg-success-soft rounded-pill d-inline-flex align-items-center">
    <span class="bull bull-lg bg-success me-2 animate-pulse-success"></span>
    <span>{{ $statuses[$status] }}</span>
</span>
@endif
