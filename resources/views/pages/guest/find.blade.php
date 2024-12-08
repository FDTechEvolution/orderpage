<x-guest-layout>
    <div class="container">
        <div class="text-center mb-1">
            <h1 class="fw-bold">ค้นหาข้อมูลลูกค้า</h1>
            <p class="lead m-0">
                กรุณาระบุหมายเลขโทรศัพท์ของลูกค้า
            </p>
        </div>
        <x-form action="{{ route('guest.find') }}" method="GET">
            <div class="row">
                <div class="col-12 col-lg-4 offset-lg-4 text-center">
                    <input class="form-control mb-3" type="number" name="mobileno" id="mobileno" required
                        value="{{ $mobileno }}">
                    <button class="btn btn-success"><i class="fi fi-search"></i> ค้นหา</button>
                </div>
            </div>
            @if (!empty($orders))
            <hr>
            <div class="row">
                <div class="col-12 col-lg-4 offset-lg-4">

                    <table class="table">
                        <tbody>
                            @foreach ($orders as $customer)
                            @foreach ($customer->orders as $order)
                            <tr>
                                <td>
                                    <x-order.status status="{{ $order->status }}" /><br>
                                    <x-label-date :date="$order->record_date" /><br>
                                    {{ $order->payment_method }}<br>
                                    <strong class="text-danger">
                                        <x-label-price amount="{{ $order->totalamt }}" />
                                    </strong>
                                </td>
                                <td>
                                    <p><strong>{{ $customer->fullname }}</strong> <small>{{ sprintf('%s %s %s %s %s
                                            โทร
                                            %s',$customer->address_line1,$customer->subdistrict,$customer->district,$customer->province,$customer->zipcode,$customer->mobile)}}</small>
                                    </p>
                                    <strong>{{ $order->order_line_des }}</strong>
                                    <p>
                                        {{ $order->shipping->name }}:
                                        <x-label-trackingno trackingno="{{ $order->trackingno }}"
                                            shipping="{{ $order->shipping->code }}" />
                                    </p>
                                </td>
                            </tr>
                            @endforeach
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
            @endif


        </x-form>
    </div>
</x-guest-layout>