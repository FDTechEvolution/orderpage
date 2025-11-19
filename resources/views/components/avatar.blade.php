@props(['path'=>'',''])

<div>
    @if (empty($path))
    <div class="avatar avatar-md rounded-circle bg-primary text-white"><i>XX</i></div>
    @else
    <div class="avatar avatar-md rounded-circle" style="background-image:url({{ $path }})"></div>
    @endif

</div>
