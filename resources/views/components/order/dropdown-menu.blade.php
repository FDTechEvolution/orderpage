@props([
'orderId','status'=>'CF'
])

<div class="dropstart">
    <a href="#" class="btn btn-sm btn-light rounded-circle js-stoppropag" data-bs-toggle="dropdown" aria-expanded="false" aria-haspopup="true">
        <span class="group-icon">
            <i class="fi fi-dots-vertical-full"></i>
            <i class="fi fi-close"></i>
        </span>
    </a>
    <div class="dropdown-menu dropdown-menu-clean dropdown-click-ignore max-w-220" style="">

        <div class="scrollable-vertical max-vh-50">
            <a href="#" class="dropdown-item text-truncate js-ajax-modal" data-ajax-modal-size="modal-xl" data-ajax-modal-backdrop="static" data-href="{{ route('order.show',['order'=>$orderId]) }}">
                <i class="fa-solid fa-tv"></i> ดูข้อมูล
            </a>

            <a class="dropdown-item text-truncate" href="{{ route('order.edit',['order'=>$orderId]) }}" target="_blank">
                <i class="fi fi-pencil"></i>
                แก้ไข
            </a>
            <li class="dropdown-divider my-2"></li>
            @if ($status !='CF')
            <a class="dropdown-item text-truncate text-success" href="{{ route('order.getChangeStatus',['order'=>$orderId,'status'=>'RECEIVED']) }}">
                <svg width="18px" height="18px" xmlns="http://www.w3.org/2000/svg" fill="currentColor" class="bi bi-check2-circle" viewBox="0 0 16 16">
                    <path d="M2.5 8a5.5 5.5 0 0 1 8.25-4.764.5.5 0 0 0 .5-.866A6.5 6.5 0 1 0 14.5 8a.5.5 0 0 0-1 0 5.5 5.5 0 1 1-11 0z"></path>
                    <path d="M15.354 3.354a.5.5 0 0 0-.708-.708L8 9.293 5.354 6.646a.5.5 0 1 0-.708.708l3 3a.5.5 0 0 0 .708 0l7-7z"></path>
                </svg>
                เปลี่ยนเป็นรับสินค้าแล้ว
            </a>
            @endif
        </div>
    </div>
</div>
