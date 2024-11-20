<?php

namespace App\Http\Controllers;

use App\Models\Customer;
use Illuminate\Http\Request;

class ModalCustomerController extends Controller
{
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
        $orderId = request()->order;

        $customer = Customer::find($id);
        return view('pages.modalCustomer.edit',[
            'title'=>'แก้ไข้อมูลลูกค้า',
            'customer'=>$customer,
            'orderId'=>$orderId
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $orderId = $request->order_id;
        $request->validate([
            'fullname' => 'required|string',
            'mobile' => 'required|string',
            'address_line1' => 'required|string',
            'subdistrict' => 'required|string',
            'district' => 'required|string',
            'province' => 'required|string',
            'zipcode' => 'required|numeric'
        ]);

        $customer = Customer::find($id);
        $oldCustomer = $customer;
        $customer->fullname = $request->fullname;
        $customer->mobile = $request->mobile;
        $customer->address_line1 = $request->address_line1;
        $customer->subdistrict = $request->subdistrict;
        $customer->district = $request->district;
        $customer->province = $request->province;
        $customer->zipcode = $request->zipcode;

        $customer->save();

        OrderLogController::createLog($orderId,'แก้ไขข้อมูลลูกค้า','');

        session()->flash('success', 'บันทึกข้อมูลเรียบร้อยแล้ว!');
        return redirect()->route('order.edit',['order'=>$orderId]);



    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
