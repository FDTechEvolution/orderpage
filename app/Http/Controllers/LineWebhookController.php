<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Http;
use App\Services\OrderService;
use Illuminate\Support\Facades\Cache;

class LineWebhookController extends Controller
{
    protected $orderService;

    public function __construct(OrderService $orderService)
    {
        $this->orderService = $orderService;
    }

    public function handle(Request $request)
    {
        // รับ JSON Payload
        $data = $request->all();
        Log::info('LINE Webhook Data:', $data);

        foreach ($data['events'] as $event) {
            $replyToken = $event['replyToken'] ?? null;
            $userMessage = $event['message']['text'] ?? null;
            $lineUserId = $event['source']['userId'] ?? null;

            if ($replyToken && $userMessage) {
                //$user = $this->Users->find()->where(['Users.line_userid'=>$lineUserId])->first();
                $user = Cache::remember('user_' . $lineUserId, 10080, function () use ($lineUserId) {
                    return User::select('org_id')->where('line_userid', $lineUserId)->first();
                });
                if (is_null($user) || empty($user->org_id)) {
                    $this->replyMessage($replyToken, "ไม่พบผู้ใช้งาน ID: {$lineUserId}");
                }
                $orderCode = $this->orderService->generateTmpOrderCode($user->org_id);
                $this->replyMessage($replyToken, "คุณส่งข้อความ: {$orderCode}");
            }
        }

        return response()->json(['status' => 'ok']);
    }

    private function replyMessage($replyToken, $message)
    {
        $url = "https://api.line.me/v2/bot/message/reply";

        Http::withHeaders([
            'Authorization' => "Bearer " . env('LINE_ACCESS_TOKEN'),
            'Content-Type' => 'application/json',
        ])->post($url, [
            "replyToken" => $replyToken,
            "messages" => [
                ["type" => "text", "text" => $message]
            ]
        ]);
    }
}
