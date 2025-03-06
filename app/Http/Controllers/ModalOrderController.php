<?php

namespace App\Http\Controllers;

use App\Models\Order;
use Illuminate\Http\Request;

class ModalOrderController extends Controller
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
        $order = Order::find($id);

        return view('pages.modalOrder.edit', [
            'title' => '',
            'order' => $order
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $request->validate([
            'shipping_id' => 'required|string',
        ]);

        $order = Order::find($id);

        $order->description = $request->description;
        $order->shipping_id = $request->shipping_id;

        if (!empty($request->trackingno)) {
            $trackingno = trim(str_replace(["\t", "\n", "\r"], '', $request->trackingno));
            $order->trackingno = $trackingno;
        }

        $order->save();

        session()->flash('success', 'บันทึกข้อมูลเรียบร้อยแล้ว!');
        return redirect()->route('order.edit', ['order' => $order->id]);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
