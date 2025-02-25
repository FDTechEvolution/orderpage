<?php

namespace App\Http\Controllers;

use App\Helpers\AppStatusHelper;
use App\Models\Order;
use Illuminate\Http\Request;
use Carbon\Carbon;

class ManageOrderController extends Controller
{

    public function index()
    {
        $status = request()->status;
        $dateRange = request()->date_range;
        $startDate = '';
        $endDate = '';
        if (empty($status)) {
            $status = 'CF';
        }

        if (!empty($dateRange)) {
            $splits = explode('-', $dateRange);
            $startDate = trim($splits[0]);
            $endDate = trim($splits[1]);
        }

        if (empty($startDate)) {
            $startDate = Carbon::now()->startOfMonth()->format('d/m/Y');
        }
        if (empty($endDate)) {
            $endDate = Carbon::now()->endOfMonth()->format('d/m/Y');
        }

        return view('pages.manageOrder.index', [
            'title' => 'ออเดอร์ใหม่',
            'description' => 'รายการออเดอร์ที่พนักงานส่งเข้ามา รอการยืนยันข้อมูลในขึ้นตอนถัดไป'
        ]);
    }

    public function new() {}

    public function list()
    {
        $status = request()->status;
        $filterStatus = [];
        $dateRange = request()->date_range;
        $startDate = '';
        $endDate = '';
        if (empty($status)) {
            $status = 'CF';
        }

        if ($status == 'DV') {
            $filterStatus = ['DV', 'ST', 'RT', 'ACC'];
        } elseif ($status == 'P1') {
            $filterStatus = ['P1', 'WS'];
        } else {
            $filterStatus = ['CF'];
        }

        if (!empty($dateRange)) {
            $splits = explode('-', $dateRange);
            if (count($splits) === 2) {
                $startDate = trim($splits[0]);
                $endDate = trim($splits[1]);
            }
        }

        if (empty($startDate)) {
            $startDate = Carbon::now()->subDay(7)->format('d/m/Y');
        }
        if (empty($endDate)) {
            $endDate = Carbon::now()->format('d/m/Y');
        }

        $startDateSql = Carbon::createFromFormat('d/m/Y', $startDate)->format('Y-m-d');
        $endDateSql = Carbon::createFromFormat('d/m/Y', $endDate)->format('Y-m-d');

        /*
        $orders = Order::with(['customer'])
            ->where('org_id', getOrgId())
            ->whereIn('status', $filterStatus)
            ->where('orderdate', '>=', $startDateSql)
            ->where('orderdate', '<=', $endDateSql)
            ->orderBy('orderdate', 'ASC')->get();
        */

        $orders = Order::select(['id', 'customer_id', 'shipping_id', 'orderdate', 'print_date', 'order_line_des', 'payment_method', 'totalamt', 'trackingno', 'status', 'shipping_description', 'shipping_id'])
            ->with(['customer', 'shipping']) // ดึงเฉพาะ id, name ลดข้อมูลที่ไม่จำเป็น
            ->where('org_id', getOrgId())
            ->whereIn('status', $filterStatus)
            ->whereBetween('orderdate', [$startDateSql, $endDateSql])
            ->orderBy('orderdate', 'ASC')
            ->get();

        //$orderStatus = AppStatusHelper::getOrderStatus();
        return view('pages.manageOrder.list', [
            'title' => AppStatusHelper::getOrderStatus($status),
            'description' => 'รายการออเดอร์ที่พนักงานส่งเข้ามา รอการยืนยันข้อมูลในขึ้นตอนถัดไป',
            'orders' => $orders,
            'status' => $status,
            'startDate' => $startDate,
            'endDate' => $endDate,
        ]);
    }
}
