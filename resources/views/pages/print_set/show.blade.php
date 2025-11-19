<x-app-layout title="รายการปริ้น/ส่งออกออเดอร์">
    <x-section>
        <div class="row">
            <div class="col">
                <x-avatar :path="$printSet->user->profile_url" />
            </div>
            <div class="col">
                <strong>บริษัทขนส่ง</strong>
                <h5>{{ $printSet->shipping->name }}</h5>
            </div>
            <div class="col">
                <strong>จำนวนออเดอร์</strong>
                <h5>{{ count($orders) }}</h5>
            </div>
            <div class="col">
                <strong>วันที่ทำรายการ</strong>
                <h5>
                    <x-label-thai-short-datetime :date="$printSet->created" />
                </h5>
            </div>
        </div>
        <hr>
        <div class="row">
            <div class="col text-end">
                <a href="{{ route('printSet.show',['printSet'=>$printSet,'type'=>'p1']) }}" class="btn btn-primary btn-lg" target="_blank">Export to Excel</a>
            </div>
        </div>
        <hr>
        <div class="row">
            <div class="col-12">
                <div class="table-responsive">
                    <table class="table table-sm">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>วันที่</th>
                                <th>ลูกค้า</th>
                                <th>ออเดอร์</th>
                                <th>จำนวนเงิน</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($orders as $order)
                            <tr data-action="click-row">
                                <td>{{ $loop->iteration }}</td>
                                <td>
                                    <span class="d-flex">
                                        <x-label-date :date="$order->orderdate" /></span>

                                </td>

                                <td>
                                    <strong>{{ $order->customer->fullname }}</strong><br>
                                    <small>{{ sprintf('%s ตำบล%s อำเภอ%s จังหวัด%s
                        %s โทร
                        %s',$order->customer->address_line1,$order->customer->subdistrict,$order->customer->district,$order->customer->province,$order->customer->zipcode,$order->customer->mobile)
                        }}</small>
                                </td>
                                <td><small>{{ $order->order_line_des }}</small></td>

                                <td class="text-end">
                                    <x-order.label-payment-method payment_method="{{ $order->payment_method }}" />
                                    <x-label-price :amount="$order->totalamt" /><br />

                                </td>


                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>

            </div>
        </div>
    </x-section>
</x-app-layout>
