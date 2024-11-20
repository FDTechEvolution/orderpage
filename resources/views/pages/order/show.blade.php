@extends('layouts.ajax_modal')
@section('content')
<div class="modal-body">
    <x-section class="p-4 mb-2">
        <div class="row">
            <div class="col">
                <h4 class="mb-0">#{{ $order->ordercode }}</h4>
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
                        <x-order.status status="{{ $order->status }}" />
                        @if ($order->payment_method=='cod')
                        <x-label-cd-receive :isactive="$order->is_cod_received" />
                        @endif


                    </li>
                </ul>

            </div>

            <div class="col-md-6 text-md-end">

            </div>
        </div>
    </x-section>

    <div class="row g-2">
        <div class="col">

            <!-- Order items -->
            <div class="card border-0 h-100">
                <div class="card-header p-4 border-bottom-0 fw-bold">จำนวนสินค้า ({{ sizeof($order->orderLines) }})
                </div>
                <div class="card-body p-4 h-100">

                    <div class="table-responsive-md mb-3">
                        <table class="table table-align-middle mb-0" role="grid">
                            <thead>
                                <tr>
                                    <th class="small text-muted" style="width:104px">
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
                                    <td></td>
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

                                    </td>
                                </tr>
                                @endforeach

                            </tbody>
                        </table>
                    </div>

                    <div class="row g-4">
                        <div class="order-2 order-md-1 col small">
                            <strong>Notes:</strong> {{ $order->description }}
                        </div>

                    </div>

                    <div class="row g-4 justify-content-end my-5">
                        <div class="col">
                            <ul class="list-unstyled m-0 p-0">
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
                                        <td>{{ $log->description }}</td>
                                        <td>{{ $log->user->name }}</td>
                                    </tr>
                                    @endforeach
                                </tbody>
                            </table>
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

                    </div>
                    <div class="d-flex align-items-center">
                        <!-- customer details -->
                        <div class="w-100 ps-4">
                            <ul class="list-unstyled m-0 p-0">
                                <li class="list-item">
                                    <!-- customer name, orders -->
                                    <a class="text-decoration-none fs-5 fw-bold" href="#!">{{ $order->customer->fullname
                                        }}</a>

                                </li>
                                <li class="list-item">
                                    <!-- customer phone -->
                                    <a class="link-normal small d-inline-grid gap-auto-2" href="tel:2483440447">
                                        <svg class="text-muted" width="18px" height="18px"
                                            xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                            stroke="currentColor">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                d="M12 18h.01M8 21h8a2 2 0 002-2V5a2 2 0 00-2-2H8a2 2 0 00-2 2v14a2 2 0 002 2z">
                                            </path>
                                        </svg>
                                        <span>{{ $order->customer->mobile }}</span>
                                    </a>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>

                <div class="card-body p-4 h-100">

                    <!-- Shipping Address -->
                    <div class="mb-5">

                        <div class="fw-bold d-flex align-items-center mb-3">
                            <svg class="flex-none text-muted me-2" width="18px" height="18px"
                                xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none" stroke="currentColor"
                                stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                                <path d="M21 10c0 7-9 13-9 13s-9-6-9-13a9 9 0 0 1 18 0z"></path>
                                <circle cx="12" cy="10" r="3"></circle>
                            </svg>
                            <span class="w-100">ที่อยู่จัดส่ง</span>

                        </div>

                        <div class="small">
                            <div class="d-flex">
                                <span>{{ sprintf('%s %s ตำบล%s อำเภอ%s จังหวัด%s
                                    %s โทร
                                    %s',$order->customer->fullname,$order->customer->address_line1,$order->customer->subdistrict,$order->customer->district,$order->customer->province,$order->customer->zipcode,$order->customer->mobile)
                                    }}</span>
                            </div>

                        </div>
                    </div>

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
</div>

<div class="modal-footer"></div>
@stop