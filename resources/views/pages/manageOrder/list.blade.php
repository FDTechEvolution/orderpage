<x-app-layout title="{{ $title }}" description="{{ $description }}">
    <x-section>
        <div class="row">
            <div class="col-12">
                <!-- bad -->
                <a href="#" class="btn {{ $status=='NEW'?'btn-primary':'btn-soft btn-secondary' }}">
                    ออเดอร์ใหม่
                    <i class="fi fi-arrow-end"></i>
                </a>

                <!-- good -->
                <a href="{{ route('manageOrder.list',['status'=>'CF']) }}" class="btn {{ $status=='CF'?'btn-primary':'btn-soft btn-secondary' }}">
                    <span>ออเดอร์ยืนยันแล้ว</span>
                    <i class="fi fi-arrow-end"></i>
                </a>

                <!-- nothing required -->
                <a href="{{ route('manageOrder.list',['status'=>'P1']) }}" class="btn {{ $status=='P1'?'btn-primary':'btn-soft btn-secondary' }}">
                    แพ็คสินค้า/เตรียมจัดส่ง
                    <i class="fi fi-arrow-end"></i>

                </a>

                <a href="{{ route('manageOrder.list',['status'=>'DV']) }}" class="btn {{ $status=='DV'?'btn-primary':'btn-soft btn-secondary' }}">
                    กำลังนำส่ง
                    <i class="fi fi-arrow-end"></i>

                </a>
            </div>
        </div>
    </x-section>

    <x-card>

        <x-form action="{{ route('manageOrder.list',['status'=>'DV']) }}" method="get">
            <input type="hidden" name="status" id="" value="{{ $status }}">
            <div class="row">
                <div class="col-9 col-lg-4">
                    <x-date-range name="date_range" :startDate="$startDate" :endDate="$endDate"></x-date-range>
                </div>
                <div class="col-3 col-lg-1">
                    <x-button.primary type="submit">OK</x-button.primary>
                </div>
            </div>
            <hr>
        </x-form>

        <div class="row">
            <div class="col-12 text-end">
                <small>ข้อมูลตั้งแต่วันที่ {{ $startDate }} ถึง {{ $endDate }}</small>
            </div>
            <div class="col-12">
                <div class="table-responsive">
                    <x-order.table :orders="$orders" />
                </div>
            </div>
        </div>
    </x-card>
</x-app-layout>
