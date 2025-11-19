<x-app-layout title="รายการปริ้น/ส่งออกออเดอร์">
    <x-section>
        <div class="row">
            <div class="col-12">
                <div class="table-responsive">
                    <x-table.data-table class="table-hover">
                        <thead>
                            <tr>
                                <th>วันที่</th>
                                <th class="text-center">จำนวนออเดอร์</th>
                                <th class="text-center">บริษัทขนส่ง</th>
                                <th class="text-center">ผู้ทำรายการ</th>
                                <th class="text-center"></th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($printSets as $item)
                            <tr>
                                <td>
                                    <small>
                                        <x-label-thai-short-datetime :date="$item->created" /></small>
                                </td>
                                <td class="text-center">{{ count($item->orders) }}</td>
                                <td class="text-center">

                                </td>
                                <td class="text-center">
                                    <x-avatar-small :path="$item->user->profile_url" />
                                </td>
                                <td class="text-center">
                                    <a href="{{ route('printSet.show',['printSet'=>$item]) }}" class="">
                                        <svg width="18px" height="18px" xmlns="http://www.w3.org/2000/svg" fill="currentColor" class="bi bi-eye" viewBox="0 0 16 16">
                                            <path d="M16 8s-3-5.5-8-5.5S0 8 0 8s3 5.5 8 5.5S16 8 16 8zM1.173 8a13.133 13.133 0 0 1 1.66-2.043C4.12 4.668 5.88 3.5 8 3.5c2.12 0 3.879 1.168 5.168 2.457A13.133 13.133 0 0 1 14.828 8c-.058.087-.122.183-.195.288-.335.48-.83 1.12-1.465 1.755C11.879 11.332 10.119 12.5 8 12.5c-2.12 0-3.879-1.168-5.168-2.457A13.134 13.134 0 0 1 1.172 8z"></path>
                                            <path d="M8 5.5a2.5 2.5 0 1 0 0 5 2.5 2.5 0 0 0 0-5zM4.5 8a3.5 3.5 0 1 1 7 0 3.5 3.5 0 0 1-7 0z"></path>
                                        </svg>
                                        ดูรายการ
                                    </a>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </x-table.data-table>
                </div>

            </div>
        </div>

    </x-section>

</x-app-layout>
