<x-app-layout title="{{ $title }}">
    <x-section>
        <x-crm.menu />
    </x-section>
    <x-section>
        <x-form action="{{ route('crm.index') }}" method="get">
            <div class="row justify-content-lg-center">
                <div class="col-6 col-lg-3">
                    <label>ช่วงวันที่</label>
                    <x-date-range name="date_range" :startDate="$startDate" :endDate="$endDate"></x-date-range>
                </div>

                <div class="col-12 mt-2 text-center">
                    <x-button.primary type="submit"><i class="fa-solid fa-magnifying-glass"></i> ค้นหา
                    </x-button.primary>
                </div>
            </div>
        </x-form>
    </x-section>

    <div class="row">
        <div class="col-12 col-lg-6">
            <x-section>
                <div class="row">
                    <div class="col-12">
                        <h4><span class="text-orange-800"><i class="fa-solid fa-trophy"></i></span> อันดับลูกค้า Top Customers</h4>

                        <table class="table table-hover">
                            <tbody>
                                @foreach ($topCustomers as $index => $item )
                                <tr>
                                    <td>{{ $index+1 }}</td>
                                    <td>{{ $item->fullname }}</td>
                                    <td>{{ $item->mobile }}</td>
                                    <td class="text-entdd">
                                        <x-label-price :amount="$item->totalamt" />
                                    </td>
                                    <td class="text-end">
                                        <a href="{{ route('customer.show',['customer'=>$item->mobile]) }}" target="_blank"><i class="fa-solid fa-circle-info"></i> ประวัติ</a>
                                    </td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                        <small>ข้อมูลตั้งแต่
                            <x-label-thai_date :date="$startDateSql" /> ถึง
                            <x-label-thai_date :date="$endDateSql" /></small>
                    </div>
                </div>
            </x-section>
        </div>

        <div class="col-12 col-lg-6">
            <x-section>
                <div class="row">
                    <div class="col-12">
                        <h4><span class="text-orange-800"><i class="fa-solid fa-trophy"></i></span> อันดับสินค้า Top Products</h4>
                        <table class="table table-hover">
                            <tbody>
                                @foreach ($topProducts as $index => $item )
                                <tr>
                                    <td>{{ $index+1 }}</td>
                                    <td>{{ $item->name }}</td>
                                    <td class="text-end">
                                        <x-label-price :amount="$item->totalamt" />
                                    </td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                        <small>ข้อมูลตั้งแต่
                            <x-label-thai_date :date="$startDateSql" /> ถึง
                            <x-label-thai_date :date="$endDateSql" /></small>
                    </div>
                </div>
            </x-section>
        </div>
    </div>
</x-app-layout>
