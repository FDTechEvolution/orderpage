<?php

namespace App\Http\Controllers;

use App\Helpers\UtilsHelper;
use App\Models\Order;
use Illuminate\Http\Request;

class ReportController extends Controller
{
    public function exportOrder()
    {
        return view('pages.report.export_order', [
            'title' => 'ส่งออกรายการออเดอร์'
        ]);
    }

    public function exportCustomer()
    {
        return view('pages.report.export_customer', [
            'title' => 'ส่งออกรายชื่อลูกค้า'
        ]);
    }

    public function pullOrder(Request $request)
    {
        $dateRange = $request->date_range;
        $productCategoryId = $request->product_category_id;
        $productId = $request->product_id;
        $status = $request->status;
        $shippingId = $request->shiping_id;

        $dateRange = UtilsHelper::dateRangToDates($dateRange);
        $startDate = $dateRange['startDateYMD'];
        $endDate = $dateRange['endDateYMD'];

        $orders = Order::select(['id', 'customer_id', 'orderdate', 'order_line_des', 'payment_method', 'totalamt',  'status'])
            ->with(['customer']) // ดึงเฉพาะ id, name ลดข้อมูลที่ไม่จำเป็น
            ->where('org_id', getOrgId());
        if (!empty($status)) {
            $orders = $orders->where('status', $status);
        }
        if (!empty($shippingId)) {
            $orders = $orders->where('shipping_id', $shippingId);
        }


        $orders = $orders->whereBetween('orderdate', [$startDate, $endDate])
            ->orderBy('orderdate', 'ASC')
            ->get();
        //dd($orders);
        return view('pages.report.pull_order', [
            'title' => 'ส่งออกรายการออเดอร์',
            'orders' => $orders,
            'reportName' => 'order-report'
        ]);
    }

    public function pullCustomer() {}
}
