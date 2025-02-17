<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Carbon\Carbon;
use Illuminate\Support\Facades\DB;

class DashboardController extends Controller
{
    public function index()
    {
        //get evening orders
        if (getOrgId() == '13c658f1-7e56-423e-8347-a0cdf9bc12f9') {
            $startDate = '';
            $endDate = '';
            $dateRange = request()->date_range;
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

            $startDateSql = Carbon::createFromFormat('d/m/Y', $startDate)->format('Y-m-d');
            $endDateSql = Carbon::createFromFormat('d/m/Y', $endDate)->format('Y-m-d');

            $daily = DB::table('orders as o')
                ->join('tmp_orders as tmp', 'o.tmp_order_id', '=', 'tmp.id')
                ->join('users as u', 'o.user_id', '=', 'u.id')
                ->selectRaw("DATE_FORMAT(tmp.created,'%Y-%m-%d') as dt,u.name, SUM(o.totalamt) as totalamt")
                ->where('o.org_id', '13c658f1-7e56-423e-8347-a0cdf9bc12f9')
                ->where("o.orderdate", '>=', $startDateSql)
                ->where("o.orderdate", '<=', $endDateSql)
                ->whereRaw("DATE_FORMAT(tmp.created,'%H') >= ?", ['18'])
                ->groupBy(DB::raw("DATE_FORMAT(tmp.created,'%Y-%m-%d')"))
                ->groupBy('u.name')
                ->orderBy('dt', 'asc')
                ->get();
            //dd($daily);
            return view('pages.dashboard.index_digis', [
                'title' => '',
                'startDate' => $startDate,
                'endDate' => $endDate,
                'daily' => $daily
            ]);
        }

        return view('pages.dashboard.index', [
            'title' => '',
        ]);
    }
}
