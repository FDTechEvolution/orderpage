<x-app-layout title="">
    <div class="row">
        <div class="col-12 col-lg-6">
            <x-card>
                <h5>ออเดอร์หลัง 17:00</h5>
                <x-form :action="route('dashboard.index')" method="GET">
                    <div class="row">
                        <div class="col-10">
                            <x-date-range name="date_range" :startDate="$startDate" :endDate="$endDate" />
                        </div>
                        <div class="col">
                            <button class="btn btn-primary" type="submit">OK</button>
                        </div>
                    </div>


                </x-form>

                <hr>
                <table class="table table-sm">
                    <tbody>
                        @foreach ($daily as $item)
                        <tr>
                            <td>{{ $item->dt }}</td>
                            <td>{{ $item->name }}</td>
                            <td class="text-end">
                                <x-label-price :amount="$item->totalamt" />
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>

            </x-card>
        </div>
    </div>

    @section('script')
    <script>
        $(document).ready(function() {

        });

    </script>
    @stop
</x-app-layout>
