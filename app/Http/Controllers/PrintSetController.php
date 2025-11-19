<?php

namespace App\Http\Controllers;

use App\Models\Order;
use App\Models\PrintingSet;
use Illuminate\Http\Request;

class PrintSetController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //

        $printSets = PrintingSet::with(['orders'])->where('status', 'CF')->where('org_id', getOrgId())->orderBy('created', 'DESC')->limit(20)->get();

        return view('pages.print_set.index', [
            'printSets' => $printSets
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
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $printSet = PrintingSet::with(['shipping', 'user'])->whereId($id)->first();

        $orders = Order::select(['id', 'customer_id', 'shipping_id', 'orderdate', 'print_date', 'order_line_des', 'payment_method', 'totalamt', 'trackingno', 'status', 'shipping_description', 'shipping_id'])
            ->with(['customer', 'shipping'])
            ->where('org_id', getOrgId())
            ->where('printing_set_id', $id)
            ->orderBy('orderdate', 'ASC')
            ->get();

        $type = request()->type;
        if ($type == 'p1') {
            return view('pages.print_set.export.p1', [
                'orders' => $orders,
                'printSet' => $printSet,
                'reportName' => 'print-export'
            ]);
        }

        return view('pages.print_set.show', [
            'orders' => $orders,
            'printSet' => $printSet
        ]);
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
