@extends('layouts.export')

@section('content')
<div class="row">
    <div class="col-12">
        <table class="table table-sm" id="tb-data">

            <tbody id="orderTable">
                <tr>
                    <td>ชื่อผู้รับ</td>
                    <td>เบอร์โทร</td>
                    <td>ที่อยู่</td>
                    <td>ตำบล / แขวง</td>
                    <td>อำเภอ / เขต</td>
                    <td>จังหวัด</td>
                    <td>รหัสไปรษณีย์</td>
                    <td>เก็บเงินปลายทาง (COD)</td>
                    <td>หมายเหตุ</td>
                    <td>น้ำหนัก (kg)</td>
                    <td>กว้าง (cm)</td>
                    <td>ยาว (cm)</td>
                    <td>สูง (cm)</td>
                    <td>มูลค่าซื้อประกัน(ระบุจำนวนเงิน)</td>
                    <td>ชื่อสินค้า</td>
                    <td>น้ำหนักสินค้า</td>
                    <td>ขนาดสินค้า (กว้างxยาวxสูง)</td>
                    <td>สี</td>
                    <td>จำนวน</td>
                    <td>ราคา</td>
                    <td>หมายเหตุ</td>
                </tr>

                @foreach ($orders as $order)
                <tr>
                    <td>{{ $order->customer->fullname }}</td>
                    <td>{{ $order->customer->mobile }}</td>
                    <td>{{ $order->customer->address_line1 }}</td>
                    <td>{{ $order->customer->subdistrict }}</td>
                    <td>{{ $order->customer->district }}</td>
                    <td>{{ $order->customer->province }}</td>
                    <td>{{ $order->customer->zipcode }}</td>
                    <td>{{ $order->payment_method=='cod'?$order->totalamt:0 }}</td>
                    <td></td>
                    <td>0.5</td>
                    <td>17</td>
                    <td>10</td>
                    <td>11</td>
                    <td></td>
                    <td>{{ $order->order_line_des }}</td>
                    <td>0.5</td>
                    <td>17x10x11</td>
                    <td>ขาว</td>
                    <td>1</td>
                    <td>{{ $order->totalamt }}</td>
                    <td>{{ $order->order_line_des }}</td>
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
