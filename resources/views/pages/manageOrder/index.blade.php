<x-app-layout title="{{ $title }}" description="{{ $description }}">
    <x-section>
        <div class="row">
            <div class="col-12">
                <!-- bad -->
                <a href="{{ route('manageOrder.index') }}" class="btn btn-primary">
                    ออเดอร์ใหม่
                    <i class="fi fi-arrow-end"></i>
                </a>

                <!-- good -->
                <a href="{{ route('manageOrder.list',['status'=>'CF']) }}" class="btn btn-secondary">
                    <span>ออเดอร์ยืนยันแล้ว</span>
                    <i class="fi fi-arrow-end"></i>
                </a>

                <!-- nothing required -->
                <a href="{{ route('manageOrder.list',['status'=>'P1']) }}" class="btn btn-secondary">
                    แพ็คสินค้า/เตรียมจัดส่ง
                    <i class="fi fi-arrow-end"></i>

                </a>

                <a href="{{ route('manageOrder.list',['status'=>'DV']) }}" class="btn btn-secondary">
                    กำลังนำส่ง
                    <i class="fi fi-arrow-end"></i>

                </a>
            </div>
        </div>
    </x-section>
    <x-card>
        <div class="row">
            <div class="col-12">
                <div class="table-responsive">
                    <x-table.data-table class="table-hover">
                        <thead>
                            <tr>
                                <th>No.</th>
                                <th>ออเดอร์</th>
                                <th>พนักงาน</th>
                                <th>เวลา</th>
                                <th width="100"></th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($tmpOrders as $tmpOrder)
                            <tr>
                                <td><small class="text-nowrap">{{ $tmpOrder->code }}</small></td>
                                <td>{{ $tmpOrder->body }}</td>
                                <td>{{ $tmpOrder->name }}</td>
                                <td>
                                    <small>
                                        <x-label-thai-short-datetime :date="$tmpOrder->created" /></small>
                                </td>
                                <td></td>
                            </tr>
                            @endforeach
                        </tbody>
                    </x-table.data-table>
                </div>
            </div>
        </div>
    </x-card>
</x-app-layout>
