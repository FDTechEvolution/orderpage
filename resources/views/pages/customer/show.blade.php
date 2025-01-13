<x-app-layout title="{{ $title }}">
    <x-section>
        <div class="row">
            <div class="col-12">
                <h3 class="text-primary">คุณ{{ $customer->fullname }} โทร {{ $customer->mobile }}</h3>
            </div>
        </div>

        <hr>
        <div class="row">
            <div class="col-12">
                <h4>ประวัติการสั่งซื้อย้อนหลัง</h4>
            </div>
            <div class="col-12">
                <table class="table table-hover">
                    <thead>
                        <tr>
                            <th>วันที่</th>
                            <th>สินค้า</th>
                            <th>ที่อยู่จัดส่ง</th>
                            <th>การชำระเงิน</th>
                            <th class="text-end">จำนวนเงิน</th>
                            <th>สถานะ</th>
                            <th>รายละเอียด</th>

                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($orderHistories as $item)

                        <tr>
                            <td>
                                <x-label-date :date="$item->orderdate" />
                            </td>
                            <td><small>{{ $item->order_line_des }}</small></td>
                            <td>
                                {{ sprintf('%s %s %s %s %s',$item->address_line1,$item->subdistrict,$item->district,$item->province,$item->zipcode) }}
                            </td>
                            <td>{{ $item->payment_method }}</td>
                            <td class="text-end">
                                <x-label-price :amount="$item->totalamt" /><br />
                            </td>
                            <td class="">

                                <x-order.status status="{{ $item->status }}" />
                            </td>
                            <td><small>
                                    {{ $item->description }}</small></td>
                        </tr>

                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </x-section>
</x-app-layout>
