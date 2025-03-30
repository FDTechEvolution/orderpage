<?php

namespace App\Services;

use App\Models\TmpOrder;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;

class OrderService
{
    public function generateTmpOrderCode($orgId)
    {
        $year = Carbon::today()->format('y');
        $today = Carbon::today()->dayOfYear;
        $prefix = "{$year}{$today}";

        $latestOrder = DB::table('tmp_orders')
            ->where('org_id', $orgId)
            ->whereDate('created_at', Carbon::today())
            ->orderBy('id', 'desc')
            ->value('code');

        if ($latestOrder) {
            $lastNumber = (int) substr($latestOrder, -4);
            $newNumber = str_pad($lastNumber + 1, 4, '0', STR_PAD_LEFT);
        } else {
            $newNumber = '0001';
        }

        return $prefix . $newNumber;
    }

    public function storeTmpOrder($code, $username, $userId, $orgId, $lineUserId, $text)
    {
        $tmpOrder = TmpOrder::create([
            'code' => $code,
            'name' => $username,
            'body' => $text,
            'user_id' => $userId,
            'line_user_id' => $lineUserId,
            'org_id' => $orgId,
            'status' => 'DR'
        ]);

        return $tmpOrder;
    }
}
