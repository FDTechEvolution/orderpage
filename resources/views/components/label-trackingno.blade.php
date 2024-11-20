@props([
'shippingUrl'=>[
'FLASH'=>'https://flashexpress.co.th/fle/tracking?se=',
'KERRY'=>'https://th.kerryexpress.com/th/track/v2/?track=',
'THPOST_POSTONE'=>'https://track.thailandpost.co.th/?trackNumber=',
'THPOST_PROSHIP'=>'https://track.thailandpost.co.th/?trackNumber=',
'NO'=>''],'trackingno'=>'','shipping'=>'NO']
)
<a href="{{ $shippingUrl[strtoupper($shipping)] }}{{ $trackingno }}" target="_blank">{{ $trackingno }}</a>