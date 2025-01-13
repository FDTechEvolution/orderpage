<div class="row">
    <div class="col-12">
        <a href="{{ route('crm.index') }}" class="btn @if($currentRouteName == 'crm.index') btn-primary @else btn-outline-secondary @endif "><i class="fa-solid fa-gauge"></i> ภาพรวม</a>
        <a href="{{ route('crm.customer') }}" class="btn @if($currentRouteName == 'crm.customer') btn-primary @else btn-outline-secondary @endif"><i class="fa-regular fa-circle-user"></i> ลูกค้า</a>
        <a href="{{ route('crm.product') }}" class="btn @if($currentRouteName =='crm.product') btn-primary @else btn-outline-secondary @endif" style="display: none;"><i class="fa-solid fa-box"></i> สินค้า</a>
    </div>
</div>
