<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\CodRecord;
use App\Models\Order;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class CODController extends Controller
{


    public function check($trackingno = '', $amount = 0, $orgId)
    {
        $trackingno = trim($trackingno);
        if (empty($trackingno)) {
            return response()->json(['message' => 'ไม่พบออเดอร์ในระบบ', 'success' => false]);
        }

        //$order = Order::where(DB::raw("TRIM(trackingno)"), $trackingno)->first();
        $order = Order::whereRaw("TRIM(REPLACE(trackingno, CHAR(9), '')) = ?", [trim($trackingno)])->first();

        $amount = floatval($amount);
        if (empty($order)) {
            CodRecord::updateOrCreate(
                ['trackingno' => $trackingno],
                [
                    'org_id' => $orgId,
                    'trackingno' => $trackingno,
                    'amount' => $amount
                ]
            );
            return response()->json(['message' => 'ไม่พบออเดอร์ในระบบ', 'success' => false]);
        }

        $order->is_cod_received = 'Y';
        $order->status = 'RECEIVED';
        $order->cod_receivedamt = $amount;
        $order->save();

        $msg = sprintf('%s ยอดเงิน %s', $order->order_line_des, number_format($order->totalamt, 2));
        return response()->json(['message' => $msg, 'success' => true]);
    }
}
