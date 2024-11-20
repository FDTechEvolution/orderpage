@props([
'orderId',
])

<div class="dropstart">
    <a href="#" class="btn btn-sm btn-light rounded-circle js-stoppropag" data-bs-toggle="dropdown"
        aria-expanded="false" aria-haspopup="true">
        <span class="group-icon">
            <i class="fi fi-dots-vertical-full"></i>
            <i class="fi fi-close"></i>
        </span>
    </a>
    <div class="dropdown-menu dropdown-menu-clean dropdown-click-ignore max-w-220" style="">

        <div class="scrollable-vertical max-vh-50">
            <a href="#" class="dropdown-item text-truncate js-ajax-modal" data-ajax-modal-size="modal-xl"
                data-ajax-modal-backdrop="static" data-href="{{ route('order.show',['order'=>$orderId]) }}">
                <i class="fa-solid fa-tv"></i> ดูข้อมูล
            </a>

            <a class="dropdown-item text-truncate" href="{{ route('order.edit',['order'=>$orderId]) }}" target="_blank">
                <i class="fi fi-pencil"></i>
                แก้ไข
            </a>

        </div>
    </div>
</div>