@props([
'orders'=>[],
])
<div>
    <x-table.data-table>
        <thead>
            <tr>
                <th>วันที่สร้าง</th>
                <th>วันที่ปริ้น</th>
                <th>ลูกค้า</th>
                <th>ออเดอร์</th>

                <th>เลขพัสดุ</th>
                <th>จำนวนเงิน</th>
                <th width="100"></th>
            </tr>
        </thead>
        <tbody>
            @foreach ($orders as $order)
            <tr>
                <td>
                    <x-label-date :date="$order->orderdate" />
                </td>
                <td>
                    <x-label-datetime :datetime="$order->print_date" />
                </td>
                <td>
                    <strong>{{ $order->customer->fullname }}</strong>
                    <small>{{ sprintf('%s ตำบล%s อำเภอ%s จังหวัด%s
                        %s โทร
                        %s',$order->customer->address_line1,$order->customer->subdistrict,$order->customer->district,$order->customer->province,$order->customer->zipcode,$order->customer->mobile)
                        }}</small>
                </td>
                <td><small>{{ $order->order_line_des }}</small></td>

                <td>
                    {{ $order->shipping->name }}:
                    <x-label-trackingno :trackingno="$order->trackingno" :shipping="$order->shipping->code" />
                </td>
                <td class="text-end">
                    <x-label-price :amount="$order->totalamt" /><br />
                    <x-order.status status="{{ $order->status }}" />
                </td>
                <td class="text-end">
                    <x-order.dropdown-menu :orderId="$order->id" />
                </td>
            </tr>
            @endforeach
        </tbody>
    </x-table.data-table>
</div>