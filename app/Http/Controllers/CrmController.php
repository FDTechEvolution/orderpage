<?php

namespace App\Http\Controllers;

use App\Models\ProductCategory;
use Illuminate\Http\Request;
use Carbon\Carbon;
use Illuminate\Support\Facades\DB;

class CrmController extends Controller
{
    public function index()
    {
        $startDate = date('d/m/Y');
        $endDate = date('d/m/Y');
        $dateRange = request()->date_range;

        if (!empty($dateRange)) {
            $splDate = explode('-', str_replace(' ', '', $dateRange));
            //dd($splDate);
            $startDate = $splDate[0];
            $endDate = $splDate[1];
        }

        $startDateSql = Carbon::createFromFormat('d/m/Y', $startDate)->format('Y-m-d');
        $endDateSql = Carbon::createFromFormat('d/m/Y', $endDate)->format('Y-m-d');

        $topCustomers = $this->topCustomers($startDateSql, $endDateSql);
        $topProducts = $this->topProducts($startDateSql, $endDateSql);

        return view('pages.crm.index', [
            'title' => 'ภาพรวม CRM',
            'startDate' => $startDate,
            'endDate' => $endDate,
            'topCustomers' => $topCustomers,
            'topProducts' => $topProducts,
            'startDateSql' => $startDateSql,
            'endDateSql' => $endDateSql

        ]);
    }

    public function customer()
    {
        $customers = null;

        $startDate = date('d/m/Y');
        $endDate = date('d/m/Y');
        $dateRange = request()->date_range;

        if (!empty($dateRange)) {
            $splDate = explode('-', str_replace(' ', '', $dateRange));
            //dd($splDate);
            $startDate = $splDate[0];
            $endDate = $splDate[1];
        }

        $buyType = request()->buy_type;
        $orderby = request()->orderby;

        $productCategoryId = request()->product_category_id;
        $startDateSql = Carbon::createFromFormat('d/m/Y', $startDate)->format('Y-m-d');
        $endDateSql = Carbon::createFromFormat('d/m/Y', $endDate)->format('Y-m-d');


        if (!empty($buyType) && !empty($orderby)) {
            $orgId = getOrgId();
            $query = DB::table('orders as o')
                ->join('customers as c', 'o.customer_id', '=', 'c.id')
                ->whereNotIn('o.status', ['VO', 'VO_RETURN'])
                ->where('o.org_id', $orgId)
                ->whereBetween('o.orderdate', [$startDateSql, $endDateSql])
                ->groupBy('c.fullname', 'c.mobile')
                ->select(
                    'c.fullname',
                    'c.mobile',
                    DB::raw('SUM(o.totalamt) as totalamt'),
                    DB::raw('COUNT(o.id) as count_order')
                );

            // เพิ่มเงื่อนไขให้ Query ตามประเภทลูกค้า
            if ($buyType == 'new') {
                $query->having('count_order', '=', 1);
            } elseif ($buyType == 'duplicate') {
                $query->having('count_order', '>', 1);
            }

            // เพิ่มเงื่อนไขการเรียงลำดับ
            if ($orderby == 'value') {
                $query->orderByDesc('totalamt');
            } else {
                $query->orderByDesc('count_order');
            }

            // ดึงข้อมูลออกมา
            $customers = $query->get();

            //dd($customers);
        }

        $startDateSql = Carbon::createFromFormat('d/m/Y', $startDate)->format('Y-m-d');
        $endDateSql = Carbon::createFromFormat('d/m/Y', $endDate)->format('Y-m-d');
        $productCategories = ProductCategory::where('isactive', 'Y')->where('org_id', getOrgId())->orderBy('name', 'ASC')->get();
        return view('pages.crm.customer', [
            'title' => 'ข้อมูลโดยลูกค้า',
            'startDate' => $startDate,
            'endDate' => $endDate,
            'startDateSql' => $startDateSql,
            'endDateSql' => $endDateSql,
            'productCategories' => $productCategories,
            'customers' => $customers,
            'buyType' => $buyType,
            'orderby' => $orderby
        ]);
    }

    public function product()
    {
        $startDate = date('d/m/Y');
        $endDate = date('d/m/Y');
        $dateRange = request()->date_range;

        if (!empty($dateRange)) {
            $splDate = explode('-', str_replace(' ', '', $dateRange));
            //dd($splDate);
            $startDate = $splDate[0];
            $endDate = $splDate[1];
        }

        $startDateSql = Carbon::createFromFormat('d/m/Y', $startDate)->format('Y-m-d');
        $endDateSql = Carbon::createFromFormat('d/m/Y', $endDate)->format('Y-m-d');
        return view('pages.crm.product', [
            'title' => 'ข้อมูลโดยสินค้า',
            'startDate' => $startDate,
            'endDate' => $endDate,
            'startDateSql' => $startDateSql,
            'endDateSql' => $endDateSql
        ]);
    }



    private function topCustomers($startDate, $endDate)
    {
        $orgId = getOrgId();

        $results = DB::table('orders as o')
            ->join('customers as c', 'o.customer_id', '=', 'c.id')
            ->whereNotIn('o.status', ['VO', 'VO_RETURN'])
            ->where('o.org_id', $orgId)
            ->whereBetween('o.orderdate', [$startDate, $endDate])
            ->groupBy('c.fullname', 'c.mobile')
            ->orderByDesc('totalamt')
            ->limit(10)
            ->select('c.fullname', 'c.mobile', DB::raw('SUM(o.totalamt) as totalamt'))
            ->get();



        return $results;
    }


    private function topProducts($startDate, $endDate)
    {
        $orgId = getOrgId();

        $results = DB::table('order_lines as line')
            ->join('products as p', 'line.product_id', '=', 'p.id')
            ->join('orders as o', 'line.order_id', '=', 'o.id')
            ->whereNotIn('o.status', ['VO', 'VO_RETURN'])
            ->where('o.org_id', $orgId)
            ->whereBetween('o.orderdate', [$startDate, $endDate])
            ->groupBy('p.name')
            ->orderByDesc('totalamt')
            ->limit(10)
            ->select('p.name', DB::raw('SUM(line.amount) as totalamt'))
            ->get();

        //dd($results);
        return $results;
    }
}
