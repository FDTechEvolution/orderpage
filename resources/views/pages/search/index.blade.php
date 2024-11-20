<x-app-layout title="{{ $title }}">
    <x-section>
        <x-form action="{{ route('search.store') }}">
            <div class="row justify-content-lg-center">
                <div class="col-6 col-lg-3">
                    <x-text-input name="trackingno" label="หมายเลขพัสดุ" />
                </div>
                <div class="col-6 col-lg-4">
                    <x-text-input name="fullname" label="ชื่อลูกค้า" />
                </div>
                <div class="col-6 col-lg-3">
                    <x-text-input name="mobileno" label="หมายเลขโทรศัพท์" />
                </div>
                <div class="col-12 text-center">
                    <x-button.primary type="submit"><i class="fa-solid fa-magnifying-glass"></i> ค้นหา
                    </x-button.primary>
                </div>
            </div>
        </x-form>
    </x-section>
    @isset($orders)
    <x-section>
        <div class="row">
            <div class="col-12">
                <x-order.table :orders="$orders" />
            </div>
        </div>
    </x-section>
    @endisset

</x-app-layout>