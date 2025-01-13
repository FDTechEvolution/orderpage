<x-app-layout title="{{ $title }}">
    <x-section>
        <x-crm.menu />
    </x-section>

    <x-section>
        <x-form action="{{ route('crm.customer') }}" method="get">
            <div class="row justify-content-lg-center">
                <div class="col-6 col-lg-4">
                    <label class="form-label">ช่วงวันที่</label>
                    <x-date-range name="date_range" :startDate="$startDate" :endDate="$endDate"></x-date-range>
                </div>
                <div class="col-6 col-lg-3">
                    <label class="form-label">ความถี่การซื้อ</label>
                    <select class="form-select" name="buy_type">
                        <option value="all" selected>ทั้งหมด</option>
                        <option value="new">ลูกค้าใหม่</option>
                        <option value="duplicate">ซื้อซ้ำ</option>
                    </select>
                </div>

                <div class="col-6 col-lg-4">
                    <label class="form-label">กลุ่มสินค้า</label>
                    <select class="form-select" name="product_category_id">
                        <option value="all">-- ทั้งหมด --</option>
                        @foreach ($productCategories as $item)
                        <option value="{{ $item->id }}">{{ $item->name }}</option>
                        @endforeach
                    </select>
                </div>


                <div class="col-12 mt-2 text-center">
                    <x-button.primary type="submit"><i class="fa-solid fa-magnifying-glass"></i> ค้นหา
                    </x-button.primary>
                </div>
            </div>
        </x-form>
    </x-section>

    @if ($customers != null)
    <x-section>
        <div class="row">
            <div class="col-12">
                <div class="table-responsive">
                    <x-table.data-table>
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>ชื่อลูกค้า</th>
                                <th>หมายเลขโทรศัพท์</th>
                                <th class="text-end">มูลค่าการสั้งซื้อทั้งหมด</th>
                                <th class="text-end">จำนวนการซื้อซ้ำ</th>
                                <th class="text-end"></th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($customers as $index => $item)
                            <tr>
                                <td>{{ $index+1 }}</td>
                                <td>{{ $item->fullname }}</td>
                                <td>{{ $item->mobile }}</td>
                                <td class="text-end">
                                    <x-label-price :amount="$item->totalamt" />
                                </td>
                                <td class="text-end">{{ $item->count_order }}</td>
                                <td class="text-end">
                                    <a href="{{ route('customer.show',['customer'=>$item->mobile]) }}" target="_blank"><i class="fa-solid fa-circle-info"></i> ประวัติ</a>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </x-table.data-table>
                </div>
            </div>
        </div>
    </x-section>
    @endif
</x-app-layout>
