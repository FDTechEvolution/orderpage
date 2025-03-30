<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Http;
use App\Services\OrderService;
use Illuminate\Support\Facades\Cache;
use App\Services\TelegramService;
use Illuminate\Support\Str;

class LineWebhookController extends Controller
{
    protected $orderService;
    protected $telegramService;

    public function __construct(OrderService $orderService, TelegramService $telegramService)
    {
        $this->orderService = $orderService;
        $this->telegramService = $telegramService;

        //LINE_ACCESS_TOKEN=IoYtXbL7L9f5wZ4LzBUAyJ89BKmLBrCeSgtf7I9JbXx6kS3mZk5baAh/xnYKJyWpz3q2PPEYlMtYtY1DHQ+lamfm954CLMWWWnsZ/VZ0Zn4bbyYGpvqMnxn0hg4FVC4iB5JsqA4J1jYlXTgX3I+ZhAdB04t89/1O/w1cDnyilFU=

        //LINE_CHANNEL_SECRET=d0f16856813b90ed8bbe367f795022a9
    }

    public function handle(Request $request)
    {
        // รับ JSON Payload
        $data = $request->all();
        //Log::info('LINE Webhook Data:', $data);

        foreach ($data['events'] as $event) {
            $replyToken = $event['replyToken'] ?? null;
            $userMessage = $event['message']['text'] ?? null;
            $lineUserId = $event['source']['userId'] ?? null;

            $userMessage = Str::of($userMessage)->replaceMatches('/[\x{1F300}-\x{1FAD6}\x{1F004}\x{1F0CF}\x{1F18E}\x{1F191}-\x{1F19A}\x{1F600}-\x{1F64F}\x{2702}-\x{27B0}\x{1F680}-\x{1F6FF}]/u', '');

            // $text = $text->replaceMatches('/[^ก-ฮa-zA-Z0-9\s]/u', '');
            //$text = $text->replaceMatches('/[\r\n\t]/', ' ');
            //$userMessage = $userMessage->trim();
            $userMessage = trim($userMessage); // ตัดช่องว่างหรืออักขระที่ไม่ต้องการ
            $userMessage = strip_tags($userMessage); // ลบแท็ก HTML (ถ้ามี)


            if ($replyToken && $userMessage) {
                //$user = $this->Users->find()->where(['Users.line_userid'=>$lineUserId])->first();
                $cacheKey = 'user_' . $lineUserId;
                $user = Cache::remember($cacheKey, 10080, function () use ($lineUserId) {
                    return User::select('org_id', 'id', 'name')  // ดึงข้อมูลจาก User
                        ->with(['org' => function ($query) {
                            $query->select('id', 'telegram_chat_id'); // ดึงแค่ 'id' และ 'org_name' จาก 'org'
                        }])
                        ->where('line_userid', $lineUserId)
                        ->first();
                });

                if (is_null($user) || empty($user->org_id)) {
                    Cache::forget($cacheKey);
                    $this->replyMessage($replyToken, "ไม่พบผู้ใช้งาน ID: {$lineUserId}");
                }
                $telegram_chat_id = $user->org->telegram_chat_id;
                $orderCode = $this->orderService->generateTmpOrderCode($user->org_id);

                $tmpOrder = $this->orderService->storeTmpOrder($orderCode, $user->name, $user->id, $user->org_id, $lineUserId, $userMessage);
                if ($tmpOrder) {
                    $this->replyMessage($replyToken, "บันทึกออเดอร์แล้ว: {$orderCode}");
                    $this->sendNewOrderNotification($userMessage, $orderCode, $telegram_chat_id);
                }
            }
        }

        return response()->json(['status' => 'ok']);
    }

    private function sendNewOrderNotification($userMessage, $orderCode, $telegram_chat_id)
    {
        if (empty($telegram_chat_id)) {
            return false;
        }
        $txt = sprintf('%s : %s', $orderCode, $userMessage);
        $response = $this->telegramService->sendMessage($txt, $telegram_chat_id);

        return true;
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
