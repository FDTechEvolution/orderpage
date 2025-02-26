@props([
'orders'=>[],
])
<div>
    <x-table.data-table>
        <thead>
            <tr>
                <th>วันที่</th>
                <th>วันที่ปริ้น</th>
                <th>ลูกค้า</th>
                <th>ออเดอร์</th>

                <th>จำนวนเงิน</th>
                <th>เลขพัสดุ</th>
                <th>สถานะ</th>

                <th width="100"></th>
            </tr>
        </thead>
        <tbody>
            @foreach ($orders as $order)
            <tr data-action="click-row">
                <td>
                    <span class="d-flex">
                        <x-label-date :date="$order->orderdate" /></span>
                    <small class="text-muted smaller"> {{ $order->orderdate->diffForHumans() }}</small>
                </td>
                <td>
                    <small>
                        <x-label-datetime :datetime="$order->print_date" /></small>
                </td>
                <td>
                    <strong>{{ $order->customer->fullname }}</strong>
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
                <td>

                    {{ $order->shipping->name }}:
                    <x-label-trackingno :trackingno="$order->trackingno" :shipping="$order->shipping->code" />
                    @if (!empty($order->shipping_description))
                    <small class="d-flex text-danger">{{ $order->shipping_description }}</small>
                    @endif
                </td>
                <td alt="{{ $order->status }}">
                    <x-order.status status="{{ $order->status }}" />
                </td>

                <td class="text-end">
                    <x-order.dropdown-menu :orderId="$order->id" status="{{ $order->status }}" />
                </td>
            </tr>
            @endforeach
        </tbody>
    </x-table.data-table>
</div>
@section('script')
<script>
    document.addEventListener("DOMContentLoaded", function() {
        let rows = document.querySelectorAll("[data-action='click-row']");
        //console.log(rows);
        rows.forEach(row => {
            row.addEventListener("click", function() {
                //console.log('click');
                // ลบ class 'selected' ออกจากทุกแถวก่อน
                rows.forEach(r => r.classList.remove("table-secondary"));
                // เพิ่ม class 'selected' ให้แถวที่ถูกคลิก
                this.classList.add("table-secondary");
            });
        });
    });

</script>
@stop
