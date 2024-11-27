<?php
use Illuminate\Support\Facades\Http;

class TelegramHelper
 {
    public static function sendTelegram($msg = '')
    {

        //https://api.telegram.org/bot{BOT_API_TOKEN}/sendMessage?chat_id={CHANNEL_ID}&text={TEXT}
        $endpoint = 'https://api.telegram.org/bot7172431156:AAFTmOHIQxdC49Ys9B2U742VIRPEi52WWk8/sendMessage';

        $response = Http::get($endpoint, [
            'chat_id' => '-1002085521033',
            'text' => $msg,
        ]);
    }

 }
