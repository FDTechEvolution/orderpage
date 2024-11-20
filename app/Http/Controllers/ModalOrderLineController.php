<?php

namespace App\Http\Controllers;

use App\Models\OrderLine;
use App\Models\ProductCategory;
use Illuminate\Http\Request;

class ModalOrderLineController extends Controller
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
        $orderLine = OrderLine::where('id',$id)->with('product')->first();

        $productCategories = ProductCategory::with('activeProducts')->where('isactive','Y')->where('org_id',getOrgId())->orderBy('name','ASC')->get();

        //dd($productCategories['cf9dbf95-f74d-456e-8bbf-b804a3963d12']);
        return view('pages.modalOrderLine.edit',[
            'title'=>'',
            'orderLine'=>$orderLine,
            'productCategories'=>$productCategories,
            'productCategoryJson'=>json_encode($productCategories,JSON_UNESCAPED_UNICODE)
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $request->validate([
            'product_id' => 'required|string',
            'qty' => 'required|numeric',
            'amount' => 'required|string',
        ]);

        $orderLine = OrderLine::find($id);
        if(!empty($orderLine)){
            $orderLine->product_id = $request->product_id;
            $orderLine->qty = $request->qty;
            $orderLine->amount = $request->amount;
            $orderLine->save();

            OrderLogController::createLog($orderLine->order_id,'แก้ไขข้อมูลสินค้า','');

            session()->flash('success', 'บันทึกข้อมูลเรียบร้อยแล้ว!');
            return redirect()->route('order.edit',['order'=>$orderLine->order_id]);
        }


        return redirect()->route('order.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {

    }
}
