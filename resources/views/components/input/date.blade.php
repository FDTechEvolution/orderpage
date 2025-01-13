@props(['disabled' => false,'label'=>'','name'=>'','required'=>true,'value'=>''])

<div class="form-floating mb-3">
    <input autocomplete="off" type="text" name="{{ $name }}" class="form-control
    datepicker" data-show-weeks="true" data-today-highlight="true" data-today-btn="true" data-clear-btn="false" data-autoclose="true" data-date-start="today" data-format="DD/MM/YYYY" data-quick-locale='{
    "days": ["Sunday", "Monday", "Tuesday", "Wednesday", "Thursday", "Friday", "Saturday"],
    "daysShort": ["Sun", "Mon", "Tue", "Wed", "Thu", "Fri", "Sat"],
    "daysMin": ["Su", "Mo", "Tu", "We", "Th", "Fr", "Sa"],
    "months": ["มกราคม", "February", "March", "April", "May", "June", "July", "August", "September", "October",
    "November", ""],
    "monthsShort": ["Jan", "Feb", "Mar", "Apr", "May", "Jun", "Jul", "Aug", "Sep", "Oct", "Nov", "Dec"],
    "lang_today": "วันนี้",
    "clear": "Clear",
    "titleFormat": "MM yyyy" }' @required($required) />
    <label for="{{ $name }}">{{ $label }} @if ($required) <strong class="text-danger">*</strong> @endif</label>

</div>
