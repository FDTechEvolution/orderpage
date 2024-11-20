<x-app-layout title="{{ $title }}">
    <div class="row">
        <div class="col-12 col-lg-6 offset-lg-3">
            <x-section>
                <form action="{{ route('cod.storeUpload') }}" method="POST" novalidate
                    class="bs-validate p-4 p-md-5 card rounded-xl" data-error-scroll-up="true"
                    enctype="multipart/form-data">
                    @csrf
                    <div class="row">
                        <div class="col-12">
                            <div class="mb-3">
                                <label for="formFile" class="form-label">ไฟล์ Excel</label>
                                <input class="form-control" type="file" id="file" name="file"
                                    accept=".csv, application/vnd.openxmlformats-officedocument.spreadsheetml.sheet, application/vnd.ms-excel"
                                    required>
                            </div>
                        </div>
                        <div class="col-12">
                            <x-button.primary type="submit"><i class="fa-solid fa-upload"></i> อัพโหลดไฟล์
                            </x-button.primary>
                        </div>
                    </div>
                </form>

            </x-section>
        </div>
    </div>

    @isset($columns)
    <x-section>
        <div class="row">
            <div class="col-12">
                <x-alert.secondary>{{ sprintf('พบข้อมูลที่อ่านได้จำนวน %d แถว (รวม header)',sizeof($data)) }}
                </x-alert.secondary>
            </div>
            <div class="col-12 col-lg-4">
                <x-selection label="เลือกคอลัมน์เลขพัสดุ" :options="$columns" name="column_tracking" :all=false />
            </div>

            <div class="col-12 col-lg-4">
                <x-selection label="เลือกคอลัมน์ยอดเงินที่ได้รับ" :options="$columns" name="column_amount" :all=false />
            </div>
            <div class="col-12 col-lg-2">
                <x-button.primary id="bt_confirm"> ยืนยันข้อมูล
                </x-button.primary>
            </div>
        </div>
        <hr>
        <div class="row">
            <div class="col-12">
                <table class="table table-sm" id="tb_file_result">
                    <tbody>
                        @foreach ($data as $index=> $row)
                        <tr id="{{ $index }}">
                            @foreach ($row as $i=> $column)
                            <td>
                                {{ $column }}
                                <input type="hidden" name="c_{{ $index }}_{{ $i }}" id="c_{{ $index }}_{{ $i }}"
                                    value="{{ $column }}">
                            </td>
                            @endforeach
                            <td id="c_{{ $index }}"></td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </x-section>

    @section('script')
    <script>
        const api = '{{ env('APP_URL') }}';
        const org_id = '{{ getOrgId() }}';
        $(document).ready(function(){
            $('#bt_confirm').on('click',function(){
                pageLoader();

                let column_tracking = $('#column_tracking').val();
                let column_amount = $('#column_amount').val();

                let len = $('#tb_file_result > tbody > tr').length;
                $('#tb_file_result > tbody > tr').each(function(index, tr) {
                    let rowId = tr.id;
                    let trackingno = $('#c_'+rowId+'_'+column_tracking).val();
                    let amount = $('#c_'+rowId+'_'+column_amount).val();

                    $.get(api+'/api/v1/cod/check/'+trackingno+'/'+amount+'/'+org_id, { })
                    .done(function(response) {
                        // ทำงานเมื่อ request สำเร็จ
                        //console.log(response);
                        if(response.success){
                            $('#c_'+rowId).append('<small><i class="fa-solid fa-check text-success"></i> '+response.message+'</small>');
                        }else{
                            $('#c_'+rowId).append('<small><i class="fa-solid fa-circle-exclamation text-danger"></i> '+response.message+'</small>');
                        }

                    })
                    .fail(function(error) {
                        // ทำงานเมื่อ request ล้มเหลว
                        console.error('Request failed:', error);
                        $('#c_'+rowId).append('<small><i class="fa-solid fa-circle-exclamation text-danger"></i>'+error+'</small>');
                    });

                    if (index === (len - 1)){
                        hidePageLoader();
                    }
                    setTimeout(function(){
                        //$('#someid').addClass("done");
                    }, 2000);
                });


            });
        });
    </script>
    @stop
    @endisset
</x-app-layout>