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
            $sql = "select *
from
(
select c.fullname,c.mobile,sum(o.totalamt) as totalamt,count(o.id) as count_order
from orders o join customers c on o.customer_id = c.id
where o.status not in('VO','VO_RETURN') and o.org_id = :org_id and o.orderdate >= :startdate and o.orderdate <= :enddate
group by c.fullname,c.mobile order by totalamt DESC
) as a
where :conditions order by :orderby";

            if ($buyType == 'new') {
                $sql = str_replace(':conditions', 'a.count_order = 1', $sql);
            } elseif ($buyType == 'duplicate') {
                $sql = str_replace(':conditions', 'a.count_order > 1', $sql);
            } else {
                $sql = str_replace(':conditions', '1=1', $sql);
            }

            if ($orderby == 'value') {
                //sum(o.totalamt) DESC
                $sql = str_replace(':orderby', 'a.totalamt DESC', $sql);
            } else {
                $sql = str_replace(':orderby', 'a.count_order DESC', $sql);
            }

            $customers = DB::select($sql, ['org_id' => $orgId, 'startdate' => $startDateSql, 'enddate' => $endDateSql]);
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
            'buyType'=>$buyType,
            'orderby'=>$orderby
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

        $sql = "select c.fullname,c.mobile,sum(o.totalamt) as totalamt from orders o join customers c on o.customer_id = c.id where o.status not in('VO','VO_RETURN') and o.org_id = :org_id and o.orderdate >= :startdate and o.orderdate <= :enddate group by c.fullname,c.mobile order by totalamt DESC limit 10";

        $results = DB::select($sql, ['org_id' => $orgId, 'startdate' => $startDate, 'enddate' => $endDate]);
        //dd($results);
        return $results;
    }


    private function topProducts($startDate, $endDate)
    {
        $orgId = getOrgId();

        $sql = "select p.name,sum(line.amount) as totalamt
            from
                order_lines line
                join products p on line.product_id = p.id
                join orders o on line.order_id = o.id
            where o.status not in('VO','VO_RETURN') and o.org_id = :org_id and o.orderdate >= :startdate and o.orderdate <= :enddate
            group by p.name
            order by totalamt DESC
            limit 10 ";

        $results = DB::select($sql, ['org_id' => $orgId, 'startdate' => $startDate, 'enddate' => $endDate]);
        //dd($results);
        return $results;
    }
}
