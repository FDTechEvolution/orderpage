<?php

namespace App\Services;

use App\Models\TmpOrder;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;
use Illuminate\Support\Facades\Log;


class OrderService
{
    public function generateTmpOrderCode($orgId)
    {
        $year = Carbon::today()->format('y');
        $today = Carbon::today()->dayOfYear;
        $prefix = "{$year}{$today}-";

        $count = DB::table('tmp_orders')
            ->where('org_id', $orgId)
            ->whereDate('created_at', Carbon::today())
            ->count();

        //if ($latestOrder) {
        //$lastNumber = (int) substr($latestOrder, -4);
        $newNumber = str_pad($count + 1, 4, '0', STR_PAD_LEFT);
        //} else {
        // $newNumber = '0001';
        // }

        return $prefix . $newNumber;
    }

    public function storeTmpOrder($code, $username, $userId, $orgId, $lineUserId, $text)
    {


        $tmpOrder = TmpOrder::create([
            'code' => $code,
            'name' => $username,
            'body' => $text,
            'user_id' => $userId,
            'line_userid' => $lineUserId,
            'org_id' => $orgId,
            'status' => 'DR',
            'created' => Carbon::now(),
            'modified' => Carbon::now(),
        ]);
        // Log::info('LINE Webhook Data:', json_encode($tmpOrder));

        return $tmpOrder;
    }

    public function voidTmpOrder($code, $lineUserId)
    {
        $tmpOrder = TmpOrder::where('code', $code)->where('line_userid', $lineUserId)->first();
        if (empty($tmpOrder)) {
            return [
                'status' => false,
                'msg' => 'ไม่พบออเดอร์',
                'tmpOrder' => []
            ];
        } else {
            $tmpOrder->status = 'VO';
            $tmpOrder->save();

            return [
                'status' => true,
                'msg' => '',
                'tmpOrder' => $tmpOrder
            ];
        }
    }
}
