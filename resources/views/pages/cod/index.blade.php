<x-app-layout title="{{ $title }}">
    <x-section>
        <form action="{{ route('cod.index') }}" method="GET">
            <div class="row">
                <div class="col-9 col-lg-4">
                    <x-date-range name="date_range" :startDate="$startDate" :endDate="$endDate"></x-date-range>
                </div>
                <div class="col-3 col-lg-1">
                    <x-button.primary type="submit">OK</x-button.primary>
                </div>

                <div class="col-12 col-lg-7 text-end">
                    <a href="{{ route('cod.upload') }}" class="btn bg-gradient-success"><i
                            class="fa-solid fa-file-excel"></i> อัพโหลดไฟล์
                        COD</a>
                    <small class="d-block">*** รายการยอดเงินที่ได้รับจากขนส่ง</small>
                </div>
            </div>
        </form>
        <hr>
        @php
        $totalAmt =0;
        @endphp
        <div class="row">
            <div class="col-12">
                <x-alert.secondary>จะดึงเฉพาะออเดอร์ที่ยังไม่ได้รับเงิน COD และส่งสินค้าออกไปแล้วเท่านั้น
                </x-alert.secondary>
            </div>
        </div>
        <div class="row">

            <div class="col-12">
                <div class="row col-border ">
                    <div class="col-6 my-2">
                        <div class="text-center">
                            <h1 class="fw-medium text-success mb-2">
                                {{ sizeof($orders) }}
                            </h1>
                            <h4 class="m-0">จำนวนออเดอร์</h4>
                            <span>ตั้งแต่วันที่ {{ $startDate }}-{{ $endDate }}</span>
                        </div>
                    </div>
                    <div class="col-6 my-2">
                        <div class="text-center">
                            <h1 class="fw-medium text-success mb-2">
                                <x-label-price :amount="$totalamt" />
                            </h1>
                            <h4 class="m-0">ยอดเงิน COD ที่ยังไม่ได้รับ</h4>
                            <span>ตั้งแต่วันที่ {{ $startDate }}-{{ $endDate }}</span>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-12 mb-2">
                <div class="row">
                    <div class="col-12 col-lg-6">
                        <table class="table">
                            <thead>
                                <tr>
                                    <th>ขนส่ง</th>
                                    <th class="text-end">จำนวนออเดอร์</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($orderShippings as $item)
                                <tr>
                                    <td>{{ $item->name }}</td>
                                    <td class="text-end">{{ $item->amount }}</td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
            <div class="col-12">
                <hr>
                <h4>รายการออเดอร์ยัง<span class="text-danger">ไม่ได้ตรวจรับเงิน COD</span></h4>
                <x-order.table :orders="$orders" />
            </div>

        </div>


    </x-section>
</x-app-layout>
