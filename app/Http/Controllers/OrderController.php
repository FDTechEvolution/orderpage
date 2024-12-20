<?php

namespace App\Http\Controllers;

use App\Models\Order;
use Illuminate\Http\Request;

class OrderController extends Controller
{

    public static function getOrderStatuses(){
        return [
            'DR'=>'ฉบับร่าง',
            'CF'=>'ยืนยัน',
            'P1'=>'ปริ้น',
            'WS'=>'รอจัดส่ง',
            'ST'=>'ส่งแล้ว',
            'DV'=>'กำลังจัดส่ง',
            'RT'=>'ตีกลับ',
            'VO'=>'ยกเลิกออเดอร์',
            'VO_RETURN' => 'ปฏิเสธรับสินค้า/รับสินค้าคืน',
            'RECEIVED' => 'ได้รับสินค้าแล้ว',
        ];
    }

    public static function getOrder($id){
        $order = Order::where('id',$id)->with(['customer','shipping','user','orderLines','orderLogs'])->first();

        return $order;
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
        $order = $this->getOrder($id);
        $orderHistory = CustomerController::getOrderHistoyies($order->customer->mobile);

        return view('pages.order.show',[
            'title'=>'รายละเอียดออเดอร์',
            'order'=>$order,
            'orderHistory'=>$orderHistory
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $order = $this->getOrder($id);

        $orderHistory = CustomerController::getOrderHistoyies($order->customer->mobile);

        $orderStatus = $this->getOrderStatuses();
        return view('pages.order.edit',[
            'title'=>'แก้ไขออเดอร์',
            'order'=>$order,
            'orderHistory'=>$orderHistory,
            'orderStatus'=>$orderStatus
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    public function changeStatus(Request $request, string $id)
    {
        $request->validate([
            'status' => 'required|string',
            'description' => 'required|string',
        ]);

        $order = Order::find($id);
        $oldStatus = $order->status;
        $newStatus = $request->status;
        $status = $this->getOrderStatuses();
        $title = sprintf('เปลี่ยนสถานะจาก %s เป็น %s',$status[$oldStatus],$status[$newStatus]);
        $description = $request->description;

        $order->status = $newStatus;
        $order->save();

        OrderLogController::createLog($id,$title,$description);

        session()->flash('success', $title.' เรียบร้อยแล้ว!');
        return redirect()->route('order.edit',['order'=>$id]);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
