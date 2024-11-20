<x-app-layout title="{{ $title }}">
    <x-section class="p-4 mb-2">
        <div class="row">
            <div class="col">
                <h3>
                    <x-order.status status="{{ $order->status }}" />
                </h3>


                <ul class="list-unstyled m-0 p-0">
                    <li class="list-item">
                        <span class="text-muted small">
                            สร้างเมื่อ:
                            <x-label-thai_datetime :date="$order->record_date" />
                        </span>
                        <span class="text-muted small">
                            | ปริ้นเมื่อ:
                            <x-label-thai_datetime :date="$order->print_date" />
                        </span>
                    </li>
                    <li class="list-item">
                        #{{ $order->ordercode }}
                        @if ($order->payment_method=='cod')
                        <x-label-cd-receive :isactive="$order->is_cod_received" />
                        @endif


                    </li>
                </ul>

            </div>

            <div class="col-md-6 text-md-end">
                <a class="btn btn-sm btn-warning rounded-pill" href="#" data-bs-toggle="modal"
                    data-bs-target="#modal-change-status">
                    <span class="small"><i class="fa-solid fa-repeat"></i> เปลี่ยนสถานะออเดอร์</span>
                </a>
            </div>
        </div>
    </x-section>

    <div class="row g-2">
        <div class="col">

            <!-- Order items -->
            <div class="card border-0 h-100">

                <div class="card-body p-4 h-100">

                    <div class="table-responsive-md mb-3">
                        <table class="table table-align-middle mb-0" role="grid">
                            <thead>
                                <tr>
                                    <th class="small text-muted" style="width:70px">
                                        <!-- image -->
                                    </th>
                                    <th class="small text-muted">สินค้า</th>
                                    <th class="small text-muted text-end" style="width:150px">จำนวน</th>
                                    <th class="small text-muted text-end">ราคาต่อหน่วย</th>
                                    <th class="small text-muted text-end">ราคารวม</th>
                                    <th class="small text-muted" style="width:64px">
                                        <!-- options -->
                                    </th>
                                </tr>
                            </thead>
                            <tbody id="checkall-list">
                                @foreach ($order->orderLines as $item)
                                <tr>
                                    <td class="align-middle">
                                        <i class="fa-solid fa-bag-shopping fs-2 text-secondary"></i>
                                    </td>
                                    <td>
                                        <strong class="d-block fw-medium">{{ $item->product->name }}</strong>
                                        <span class="d-block text-muted small"></span>
                                    </td>
                                    <td class="text-end">{{ $item->qty }}</td>
                                    <td class="text-end"></td>
                                    <td class="text-end">
                                        <x-label-price :amount="$item->amount" />
                                    </td>
                                    <td class="dropstart text-end">
                                        <!-- options -->
                                        <a class="btn btn-sm btn-light btn-ghost btn-icon text-muted rounded-circle"
                                            href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                                            <span class="group-icon">
                                                <svg width="18px" height="18px" viewBox="0 0 16 16"
                                                    xmlns="http://www.w3.org/2000/svg" fill="currentColor">
                                                    <path fill-rule="evenodd"
                                                        d="M9.5 13a1.5 1.5 0 1 1-3 0 1.5 1.5 0 0 1 3 0zm0-5a1.5 1.5 0 1 1-3 0 1.5 1.5 0 0 1 3 0zm0-5a1.5 1.5 0 1 1-3 0 1.5 1.5 0 0 1 3 0z">
                                                    </path>
                                                </svg>
                                                <svg xmlns="http://www.w3.org/2000/svg" width="18px" height="18px"
                                                    viewBox="0 0 24 24" fill="none" stroke="currentColor"
                                                    stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                                                    <line x1="18" y1="6" x2="6" y2="18"></line>
                                                    <line x1="6" y1="6" x2="18" y2="18"></line>
                                                </svg>
                                            </span>
                                        </a>
                                        <ul class="dropdown-menu dropdown-menu-clean">
                                            <li>
                                                <x-link-ajax class="dropdown-item"
                                                    href="{{ route('modalOrderLine.edit',['modalOrderLine'=>$item->id]) }}">
                                                    <svg class="text-muted" width="18px" height="18px"
                                                        xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24"
                                                        fill="none" stroke="currentColor" stroke-width="2"
                                                        stroke-linecap="round" stroke-linejoin="round">
                                                        <path d="M12 20h9"></path>
                                                        <path
                                                            d="M16.5 3.5a2.121 2.121 0 0 1 3 3L7 19l-4 1 1-4L16.5 3.5z">
                                                        </path>
                                                    </svg>
                                                    <span>Edit</span>
                                                </x-link-ajax>

                                            </li>
                                            <li>
                                                <a class="dropdown-item" href="#">
                                                    <svg class="text-danger" width="18px" height="18px"
                                                        xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24"
                                                        fill="none" stroke="currentColor" stroke-width="2"
                                                        stroke-linecap="round" stroke-linejoin="round">
                                                        <polyline points="3 6 5 6 21 6"></polyline>
                                                        <path
                                                            d="M19 6v14a2 2 0 0 1-2 2H7a2 2 0 0 1-2-2V6m3 0V4a2 2 0 0 1 2-2h4a2 2 0 0 1 2 2v2">
                                                        </path>
                                                        <line x1="10" y1="11" x2="10" y2="17"></line>
                                                        <line x1="14" y1="11" x2="14" y2="17"></line>
                                                    </svg>
                                                    <span class="w-100">Remove</span>
                                                </a>
                                            </li>
                                        </ul>
                                    </td>
                                </tr>
                                @endforeach

                            </tbody>
                        </table>
                    </div>

                    <div class="row g-4">

                        <div class="order-1 order-md-2 col-md-3 text-end">

                            <button type="button" class="btn btn-sm btn-light" data-bs-toggle="modal"
                                data-bs-target="#item-add">
                                <svg width="18px" height="18px" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24"
                                    fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                                    stroke-linejoin="round">
                                    <line x1="12" y1="5" x2="12" y2="19"></line>
                                    <line x1="5" y1="12" x2="19" y2="12"></line>
                                </svg>
                                <span>สินค้า</span>
                            </button>
                            <!-- Modal : item add -->
                            <div class="modal fade" id="item-add" tabindex="-1" aria-labelledby="item-add-label"
                                aria-hidden="true">
                                <form method="post" action="#"
                                    class="form-validate modal-dialog modal-md modal-dialog-centered text-start">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 class="modal-title" id="item-add-label">Product add</h5>
                                            <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                aria-label="Close"></button>
                                        </div>
                                        <div class="modal-body">

                                            <!-- product : search -->
                                            <div class="form-floating">
                                                <input type="text" class="form-control" id="p-search" name="p-search"
                                                    placeholder="Product Search">
                                                <label for="p-search">Search product...</label>

                                                <div class="form-check mt-2">
                                                    <input class="form-check-input form-check-input-primary"
                                                        type="checkbox" value="1" id="item-as-gift">
                                                    <label class="form-check-label" for="item-as-gift">
                                                        Add item as gift
                                                    </label>
                                                </div>
                                                <div class="mt-2" id="search-container">
                                                    <div class="py-2">
                                                        <!-- appended item -->
                                                        <a href="#!" class="link-normal">
                                                            <svg height="18px" xmlns="http://www.w3.org/2000/svg"
                                                                viewBox="0 0 24 24" fill="none" stroke="currentColor"
                                                                stroke-width="2" stroke-linecap="round"
                                                                stroke-linejoin="round">
                                                                <line x1="18" y1="6" x2="6" y2="18"></line>
                                                                <line x1="6" y1="6" x2="18" y2="18"></line>
                                                            </svg>
                                                        </a>
                                                        <a href="#!" class="text-decoration-none ms-2">Product title -
                                                            appended here</a>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="modal-footer">
                                            <button type="submit" class="btn btn-primary">
                                                <svg width="18px" height="18px" xmlns="http://www.w3.org/2000/svg"
                                                    viewBox="0 0 24 24" fill="none" stroke="currentColor"
                                                    stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                                                    <polyline points="20 6 9 17 4 12"></polyline>
                                                </svg>
                                                <span>Add</span>
                                            </button>
                                        </div>
                                    </div>
                                </form>
                            </div>

                        </div>
                    </div>

                    <div class="row g-4 justify-content-end my-2">
                        <div class="col">

                        </div>
                        <div class="col-md-8 col-lg-7 text-end">
                            <dl class="row mb-0">
                                <dt class="col-6">ราคารวม:</dt>
                                <dd class="col-6">
                                    <x-label-price :amount="$order->totalamt" />
                                </dd>

                                <dt class="col-6">ลดราคา:</dt>
                                <dd class="col-6">0.00</dd>

                                <dt class="col-6">ค่าส่ง:</dt>
                                <dd class="col-6">0.00</dd>

                                <dt class="col-6">ภาษี:</dt>
                                <dd class="col-6">0.00</dd>

                                <dt class="col-6 fw-bold text-primary">รวมทั้งสิ้น:</dt>
                                <dd class="col-6 fw-bold text-primary fs-4">
                                    <x-label-price :amount="$order->totalamt" />
                                </dd>
                            </dl>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-12">
                            <h4 class="h5"><i class="fa-solid fa-clock-rotate-left"></i> ประวัติการแก้ไข</h4>
                        </div>
                        <div class="col-12">
                            <div class="table-responsive">
                                <table class="table table-sm">
                                    <thead>
                                        <tr>
                                            <th>วันที่ทำรายการ</th>
                                            <th>รายการ</th>
                                            <th>รายละเอียด</th>
                                            <th>ผู้ทำรายการ</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($order->orderLogs as $log)
                                        <tr>
                                            <td>{{ $log->created_at }}</td>
                                            <td>{{ $log->title }}</td>
                                            <td><small>{{ $log->description }}</small></td>
                                            <td>{{ $log->user->name }}</td>
                                        </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="card-footer p-4">

                </div>
            </div>
            <!-- /Order items -->

        </div>

        <div class="col-xl-4">
            <div class="card border-0 h-100">

                <!-- Customer -->
                <div class="card-header p-4 mb-3">
                    <div class="fw-bold d-flex align-items-center mb-3">
                        <span class="w-100">ลูกค้า</span>
                        <x-link-ajax
                            href="{{ route('modalCustomer.edit',['modalCustomer'=>$order->customer_id,'order'=>$order->id]) }}"
                            class="flex-none link-muted small d-inline-grid gap-auto-2">
                            <span class="fw-normal">แก้ไข</span>
                            <svg width="16px" height="16px" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24"
                                fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                                stroke-linejoin="round">
                                <path d="M11 4H4a2 2 0 0 0-2 2v14a2 2 0 0 0 2 2h14a2 2 0 0 0 2-2v-7"></path>
                                <path d="M18.5 2.5a2.121 2.121 0 0 1 3 3L12 15l-4 1 1-4 9.5-9.5z"></path>
                            </svg>
                        </x-link-ajax>

                    </div>
                    <div class="d-flex align-items-center">
                        <!-- customer details -->
                        <div class="w-100 ps-4">
                            <ul class="list-unstyled m-0 p-0">
                                <li class="list-item">
                                    <!-- customer name, orders -->
                                    <span class="text-decoration-none fs-5 fw-bold">{{ $order->customer->fullname
                                        }}</span>

                                </li>
                                <li class="list-item">
                                    <span>{{ sprintf('%s ตำบล%s อำเภอ%s จังหวัด%s
                                        %s โทร
                                        %s',$order->customer->address_line1,$order->customer->subdistrict,$order->customer->district,$order->customer->province,$order->customer->zipcode,$order->customer->mobile)
                                        }}</span>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>

                <div class="card-body p-4 h-100">
                    <div class="fw-bold d-flex align-items-center mb-3">
                        <span class="w-100"></span>
                        <x-link-ajax href="{{ route('modalOrder.edit',['modalOrder'=>$order->id]) }}"
                            class="flex-none link-muted small d-inline-grid gap-auto-2">
                            <span class="fw-normal">แก้ไข</span>
                            <svg width="16px" height="16px" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24"
                                fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                                stroke-linejoin="round">
                                <path d="M11 4H4a2 2 0 0 0-2 2v14a2 2 0 0 0 2 2h14a2 2 0 0 0 2-2v-7"></path>
                                <path d="M18.5 2.5a2.121 2.121 0 0 1 3 3L12 15l-4 1 1-4 9.5-9.5z"></path>
                            </svg>
                        </x-link-ajax>

                    </div>
                    <ul class="list-unstyled m-0 p-0">
                        <li class="list-item">
                            <strong>Notes:</strong> {{ $order->description }}
                        </li>
                        <li class="list-item">
                            รูปแบบการชำระเงิน: <span class="badge bg-primary">{{ $order->payment_method
                                }}</span>
                        </li>
                        <li class="list-item">
                            ขนส่ง: <span class="badge bg-primary">{{ $order->shipping->name }}</span>
                            <span class="d-block text-muted small">หมายเลขพัสดุ:
                                <x-label-trackingno :trackingno="$order->trackingno"
                                    :shipping="$order->shipping->code" />
                            </span>
                            <span class="d-block text-muted small">น้ำหนักสินค้า: 2Kg</span>
                        </li>

                    </ul>
                </div>

                <div class="card-footer p-4">

                </div>
            </div>
        </div>
    </div>

    <x-section class="mt-3">
        <div class="row">
            <div class="col-12">
                <h4>ประวัติการสั่งซื้อย้อนหลัง</h4>
            </div>
            <div class="col-12">
                <table class="table table-sm">
                    <thead>
                        <tr>
                            <th>วันที่</th>
                            <th>สินค้า</th>
                            <th>การชำระเงิน</th>
                            <th class="text-end">จำนวนเงิน</th>
                            <th>สถานะ</th>
                            <th>รายละเอียด</th>

                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($orderHistory as $item)
                        @if($item->id != $order->id)
                        <tr>
                            <td>
                                <x-label-date :date="$item->orderdate" />
                            </td>
                            <td><small>{{ $item->order_line_des }}</small></td>
                            <td>{{ $item->payment_method }}</td>
                            <td class="text-end">
                                <x-label-price :amount="$item->totalamt" /><br />
                            </td>
                            <td class="">

                                <x-order.status status="{{ $item->status }}" />
                            </td>
                            <td>{{ $item->description }}</td>
                        </tr>
                        @endif
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </x-section>

    @section('modal')
    <div class="modal fade" id="modal-change-status" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabelSm"
        aria-hidden="true" data-bs-backdrop="static" data-bs-keyboard="false">
        <div class="modal-dialog" role="document">
            <div class="modal-content">

                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabelSm">เปลี่ยนสถานะออเดอร์</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <x-form action="{{ route('order.changeStatus',['order'=>$order->id]) }}">
                    <input type="hidden" name="order_id" id="order_id" value="{{ $order->id }}">
                    <div class="modal-body">

                        <div class="form-floating mb-3">
                            <select class="form-select" id="status" name="status" required>
                                @foreach ($orderStatus as $key => $_status)
                                <option value="{{ $key }}" @selected($key==$order->status)>{{ $_status }}</option>
                                @endforeach
                            </select>
                            <label for="status">เลือกสถานะ <strong class="text-danger">*</strong></label>
                        </div>

                        <div class="form-floating mb-3">
                            <textarea class="form-control" placeholder="Leave a comment here" id="description"
                                style="height: 100px" name="description" required></textarea>
                            <label for="description">เหตุผล/หมายเหตุ <strong class="text-danger">*</strong></label>
                        </div>

                    </div>

                    <div class="modal-footer">
                        <x-button.save />
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">
                            <i class="fi fi-close"></i>
                            ปิด
                        </button>
                    </div>
                </x-form>

            </div>
        </div>
    </div>
    @stop
</x-app-layout>