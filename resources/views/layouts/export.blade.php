<!DOCTYPE html>
<html lang="th">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ $reportName }}</title>
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>

    <div class="container mt-5">
        <div class="row">
            <div class="col-12 text-end mb-2">
                <button type="button" class="btn btn-lg btn-primary" id="btn-csv-export">Export to Excel</button>
            </div>
        </div>
        <hr>
        @yield('content')
    </div>


    <!-- Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.7.1.min.js" integrity="sha256-/JqT3SQfawRcv/BIHPThkBvs0OEvtFFmqPF/lYI/Cxo=" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/xlsx/0.18.5/xlsx.full.min.js"></script>

    <script>
        const filename = '{{ $reportName }}.xlsx';

        function exportTableToExcel() {
            let table = document.getElementById("tb-data");

            // แปลง Table เป็น Workbook
            let workbook = XLSX.utils.table_to_book(table, {
                sheet: "Sheet1"
            });

            // กำหนดให้คอลัมน์ที่มีเบอร์โทรเป็น text
            let sheet = workbook.Sheets["Sheet1"];
            let range = XLSX.utils.decode_range(sheet["!ref"]);

            for (let col = range.s.c; col <= range.e.c; col++) {
                let cell = XLSX.utils.encode_col(col) + "1"; // หัวตาราง
                if (sheet[cell] && sheet[cell].v.includes("เบอร์โทร")) { // เช็คว่าหัวคอลัมน์เป็น "เบอร์โทร"
                    //console.log(sheet[cell]);
                    for (let row = range.s.r + 1; row <= range.e.r; row++) {
                        let cellAddress = XLSX.utils.encode_cell({
                            r: row
                            , c: col
                        });
                        if (sheet[cellAddress] && sheet[cellAddress].v) {
                            sheet[cellAddress].z = "@"; // กำหนด format เป็น text
                            sheet[cellAddress].t = "s"; // บังคับให้เป็น string
                        }
                    }
                }
            }

            // บันทึกเป็นไฟล์ .xlsx
            XLSX.writeFile(workbook, filename);
        }


        document.getElementById("btn-csv-export").addEventListener("click", exportTableToExcel);

    </script>

    @yield('script')
</body>
</html>
