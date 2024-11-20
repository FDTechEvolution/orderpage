<?php

namespace App\Http\Controllers;

use App\Models\Customer;
use Illuminate\Http\Request;

class CustomerController extends Controller
{
    public static function getOrderHistoyies($mobileno){
        $customers = Customer::where('mobile',$mobileno)->with('orders')->orderBy('created','DESC')->get();
        $orders = [];
        foreach($customers as $customer){
            if(!empty($customer->orders) && sizeof($customer->orders)>0){
                array_push($orders,$customer->orders[0]);
            }

        }
        $orders = json_decode(json_encode($orders));
        return $orders;
    }
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
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
