<div class="table-responsive">
    <table class="table-datatable table table-bordered table-hover table-striped"
        data-lng-empty="No data available in table" data-lng-page-info="Showing _START_ to _END_ of _TOTAL_ entries"
        data-lng-filtered="(filtered from _MAX_ total entries)" data-lng-loading="Loading..."
        data-lng-processing="Processing..." data-lng-search="Search..." data-lng-norecords="No matching records found"
        data-lng-sort-ascending=": activate to sort column ascending"
        data-lng-sort-descending=": activate to sort column descending" data-main-search="true"
        data-column-search="false" data-row-reorder="false" data-col-reorder="false" data-responsive="false"
        data-header-fixed="false" data-select-onclick="false" data-enable-paging="true" data-enable-col-sorting="false"
        data-autofill="false" data-group="false" data-items-per-page="10" data-enable-column-visibility="false"
        data-lng-column-visibility="Column Visibility" data-enable-export="true"
        data-lng-export="<i class='fi fi-squared-dots fs-5 lh-1'></i>" data-lng-csv="CSV" data-lng-pdf="PDF"
        data-lng-xls="XLS" data-lng-copy="Copy" data-lng-print="Print" data-lng-all="All"
        data-export-pdf-disable-mobile="true" data-export='["csv", "pdf", "xls"]' data-options='["copy", "print"]'
        data-custom-config='{}'>
        {{ $slot }}
    </table>
</div>