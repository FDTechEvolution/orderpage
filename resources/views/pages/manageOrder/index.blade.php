<x-app-layout title="{{ $title }}" description="{{ $description }}">
    <x-section>
        <div class="row">
            <div class="col-12">
                <!-- bad -->
                <a href="#" class="btn btn-primary">
                    ออเดอร์ใหม่
                    <i class="fi fi-arrow-end"></i>
                </a>

                <!-- good -->
                <a href="#" class="btn btn-soft btn-secondary">
                    <span>ยืนยันข้อมูลเรียบร้อย</span>
                    <i class="fi fi-arrow-end"></i>
                </a>

                <!-- nothing required -->
                <a href="#" class="btn btn-soft btn-secondary">
                    แพ็คสินค้า/เตรียมจัดส่ง
                    <i class="fi fi-arrow-end"></i>

                </a>
            </div>
        </div>
    </x-section>
</x-app-layout>