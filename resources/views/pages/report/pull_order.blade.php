@extends('layouts.export')

@section('content')
<div class="row">
    <div class="col-12">
        <table class="table table-sm" id="tb-data">
            <thead>
                <tr>
                    <th>#</th>
                    <th>วันที่</th>
                    <th>ลูกค้า</th>
                    <th>ที่อยู่ลูกค้า</th>
                    <th>เบอร์โทร</th>
                    <th>รายการสั่งซื้อ</th>
                    <th>การชำระเงิน</th>
                    <th>สถานะ</th>
                    <th>จำนวนเงิน</th>
                </tr>
            </thead>
            <tbody id="orderTable">
                @foreach ($orders as $order)
                <tr>
                    <td>{{ $loop->iteration }}</td>
                    <td>
                        <x-label-date :date="$order->orderdate" />
                    </td>
                    <td>{{ $order->customer->fullname }}</td>
                    <td>{{ sprintf('%s %s %s %s %s',$order->customer->address_line1,$order->customer->subdistrict,$order->customer->district,$order->customer->province,$order->customer->zipcode) }}</td>
                    <td>{{ $order->customer->mobile }}</td>
                    <td>{{ $order->order_line_des }}</td>
                    <td>{{ $order->payment_method }}</td>
                    <td>{{ $order->status }}</td>
                    <td class="subtotal text-end">{{ number_format($order->totalamt,2) }}</td>
                </tr>
                @endforeach
            </tbody>
            <tfoot>
                <tr>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td class="text-end">รวม</td>
                    <td id="totalSum">0</td>
                </tr>
            </tfoot>
        </table>
    </div>
</div>
@stop

@section('script')
<script>
    function calculateTotal() {
        let total = 0;
        document.querySelectorAll("#orderTable tr").forEach(row => {
            let subtotal = parseFloat(row.querySelector(".subtotal").textContent) || 0;
            //console.log(subtotal);
            total += subtotal;
        });
        document.getElementById("totalSum").textContent = total.toFixed(2);
    }

    calculateTotal(); // คำนวณทันทีเมื่อโหลดหน้า

</script>
@stop
