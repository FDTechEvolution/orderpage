<x-app-layout :title="$title">
    <x-card>
        <x-form action="{{ route('report.pullOrder') }}" target="_blank">
            <div class="row">
                <div class="col-12 col-lg-4">
                    <x-date-range name="date_range" />
                </div>
                <div class="col-12 col-lg-8">
                    <x-selection-product-group />
                </div>
                <div class="col-12 col-lg-4">
                    <x-selection-order-status />
                </div>
            </div>
            <hr>
            <div class="row">
                <div class="col-12 text-center">
                    <button class="btn btn-primary" type="submit">ตกลง</button>
                </div>
            </div>
        </x-form>
    </x-card>
</x-app-layout>
