<?php

namespace App\Http\Controllers;

use App\Helpers\UtilsHelper;
use App\Models\Order;
use Illuminate\Http\Request;
use Carbon\Carbon;
use Maatwebsite\Excel\Facades\Excel;
use Illuminate\Support\Facades\DB;


class CODController extends Controller
{
    public function index()
    {
        $startDate = '';
        $endDate = '';
        $dateRange = request()->date_range;
        $dateRange = UtilsHelper::dateRangToDates($dateRange);
        $startDate = $dateRange['startDateDMY'];
        $endDate = $dateRange['endDateDMY'];

        /*
        if (empty($startDate)) {
            $startDate = Carbon::now()->startOfMonth()->format('d/m/Y');
        }
        if (empty($endDate)) {
            $endDate = Carbon::now()->endOfMonth()->format('d/m/Y');
        }


        $startDateSql = Carbon::createFromFormat('d/m/Y', $startDate)->format('Y-m-d');
        $endDateSql = Carbon::createFromFormat('d/m/Y', $endDate)->format('Y-m-d');
        */
        $startDateSql = $dateRange['startDateYMD'];
        $endDateSql = $dateRange['endDateYMD'];

        $orders = Order::where('org_id', getOrgId())
            //->where('status', 'ST')
            ->where('payment_method', 'COD')
            ->where('is_cod_received', 'N')
            ->where('orderdate', '>=', $startDateSql)
            ->where('orderdate', '<=', $endDateSql)
            ->with(['customer', 'shipping'])->orderBy('print_date', 'ASC')->get();

        $orderShippings = DB::table('orders')
            ->selectRaw('count(orders.id) as amount, shippings.name')
            ->join('shippings', 'orders.shipping_id', '=', 'shippings.id')
            ->where('orders.org_id', getOrgId())
            ->where('orderdate', '>=', $startDateSql)
            ->where('orderdate', '<=', $endDateSql)
            ->where('payment_method', 'COD')
            ->where('is_cod_received', 'N')
            //->where('status', 'ST')
            ->groupBy('shippings.name')->get();


        //sum total
        $_orders = json_decode(json_encode($orders), true);
        $totalamt = array_sum(array_column($_orders, 'totalamt'));

        return view('pages.cod.index', [
            'title' => 'ตรวจสอบยอดเงิน COD',
            'orders' => $orders,
            'startDate' => $startDate,
            'endDate' => $endDate,
            'orderShippings' => $orderShippings,
            'totalamt' => $totalamt
        ]);
    }

    public function upload()
    {

        return view('pages.cod.upload', [
            'title' => 'อัพโหลดรายงาน COD'
        ]);
    }

    public function storeUpload(Request $request)
    {
        $request->validate([
            'file' => 'required|file|mimes:xlsx,xls,csv'
        ]);

        // อ่านไฟล์ Excel และดึงข้อมูลเก็บในตัวแปร array
        //$path = $request->file('file')->getRealPath();
        $data = Excel::toArray([], $request->file('file'));
        //dd($data);
        if (empty($data) || sizeof($data) == 0) {
            session()->flash('error', 'ไม่สามารถอ่านไฟล์ได้');
            return redirect()->route('cod.index');
        }
        $firstSheet = $data[0];
        if (empty($firstSheet) || sizeof($firstSheet) == 0) {
            session()->flash('error', 'ไม่สามารถอ่านไฟล์ได้');
            return redirect()->route('cod.index');
        }

        $columns = $firstSheet[0];

        return view('pages.cod.upload', [
            'title' => 'อัพโหลดรายงาน COD',
            'columns' => $columns,
            'data' => $firstSheet
        ]);
    }
}
