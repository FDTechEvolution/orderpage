<?php

namespace App\Http\Controllers;

use App\Helpers\AppStatusHelper;
use App\Models\Order;
use Illuminate\Http\Request;

class OrderController extends Controller
{


    public static function getOrder($id)
    {
        $order = Order::where('id', $id)->with(['customer', 'shipping', 'user', 'orderLines', 'orderLogs'])->first();

        return $order;
    }

    public static function getListOrders($includeStatus = [], $excludeStatus = []) {}



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

        return view('pages.order.show', [
            'title' => 'รายละเอียดออเดอร์',
            'order' => $order,
            'orderHistory' => $orderHistory
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $order = $this->getOrder($id);

        $orderHistory = CustomerController::getOrderHistoyies($order->customer->mobile);

        $orderStatus = AppStatusHelper::getOrderStatus();
        return view('pages.order.edit', [
            'title' => 'แก้ไขออเดอร์',
            'order' => $order,
            'orderHistory' => $orderHistory,
            'orderStatus' => $orderStatus
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
        $status = AppStatusHelper::getOrderStatus();
        $title = sprintf('เปลี่ยนสถานะจาก %s เป็น %s', $status[$oldStatus], $status[$newStatus]);
        $description = $request->description;

        $order->status = $newStatus;
        $order->save();

        OrderLogController::createLog($id, $title, $description);

        session()->flash('success', $title . ' เรียบร้อยแล้ว!');
        return redirect()->route('order.edit', ['order' => $id]);
    }

    public function getChangeStatus($orderId, $status)
    {
        $order = Order::find($orderId);
        $oldStatus = $order->status;
        $newStatus = $status;
        $status = AppStatusHelper::getOrderStatus();
        $title = sprintf('เปลี่ยนสถานะจาก %s เป็น %s', $status[$oldStatus], $status[$newStatus]);
        $description = '-';

        $order->status = $newStatus;
        $order->save();

        OrderLogController::createLog($orderId, $title, $description);

        session()->flash('success', $title . ' เรียบร้อยแล้ว!');
        return redirect()->to(url()->previous());
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
