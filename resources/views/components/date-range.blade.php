@props(['disabled' => false,'name'=>'','label'=>'','required'=>false,'startDate'=>date('d/m/Y'),'endDate'=>date('d/m/Y')])


<div class="input-group-over position-realtive z-index-1 bg-white ">
    <!-- predefined ranges -->

    <input autocomplete="off" type="text" name="{{ $name }}" @required($required) class="form-control  rangepicker bg-transparent" data-ranges="true" data-date-format="DD/MM/YYYY" data-date-start="{{ $startDate }}" data-date-end="{{ $endDate }}" data-quick-locale='{
"lang_apply"	: "ตกลง",
"lang_cancel" : "ยกเลิก",
"lang_crange" : "เลือกวันด้วยตัวเอง",
"lang_months"	 : ["มค", "กพ", "มีค", "เมย", "พค", "มิย", "กค", "สค", "กย", "ตค", "พย", "ธค"],
"lang_weekdays" : ["อา", "จ", "อัง", "พ", "พฤ", "ศ", "ส"],

"lang_today"	: "วันนี้",
"lang_yday"	 : "เมื่อวาน",
"lang_7days"	: "7 วันล่าสุด",
"lang_30days" : "30 วันล่าสุด",
"lang_tmonth" : "เดือนนี้",
"lang_lmonth" : "เดือนที่แล้ว"
}'>
    <span class="fi fi-calendar fs-2 mx-4 z-index-n1"></span>
</div>
