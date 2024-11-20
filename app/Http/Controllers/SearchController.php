<?php

namespace App\Http\Controllers;

use App\Models\Order;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class SearchController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {

        return view('pages.search.index',[
            'title'=>'ค้นหาข้อมูล'
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $trackingno = $request->trackingno;
        $mobileno = $request->mobileno;
        $fullname = $request->fullname;

        if(empty($trackingno) && empty($mobileno) && empty($fullname)){
            return redirect()->route('search.index');
        }

        $orders = DB::table('orders')
                    ->select(['orders.id'])
                    ->join('customers', 'orders.customer_id', '=', 'customers.id')
                    ->where('orders.org_id',getOrgId());

        if(!empty($trackingno)){
            $orders = $orders->where('orders.trackingno',$trackingno);
        }

        if(!empty($mobileno)){
            $orders = $orders->where('customers.mobile',$mobileno);
        }

        if(!empty($fullname)){
            $orders = $orders->where('customers.fullname','like',$fullname.'%');
        }

        $_orders = $orders->orderBy('orders.orderdate','DESC')->get();

        $orderId = [];
        foreach($_orders as $item){
            array_push($orderId,$item->id);
        }
        $orders = Order::where('org_id',getOrgId())
        ->whereIn('id',$orderId)
        ->with(['customer','shipping'])->get();
        //dd($orders);
        return view('pages.search.index',[
            'title'=>'ค้นหาข้อมูล',
            'orders'=>$orders
        ]);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
