<?php

namespace App\Services;

use App\Helpers\TelegramHelper;
use Carbon\Carbon;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Cache;

class ThailandPostService
{
    protected $apiUrl = "https://trackapi.thailandpost.co.th/post/api/v1/";
    protected $apiKey = 'D%VFE6LjN&RFALUTPrKhX+K7JKFqFkI4A^TQD^HrQmKOIpCnX;J#KEBaOFAnIHP?S:T4P%CWOcRtCtF#NdMuH1BaS5KrLpY5WKQh'; // นำ API Key มาใส่ตรงนี้

    protected $apiKey2 = 'QcY=NTV*LqY5HiA$M7VDUBReX$O9J&YyY7KZOEFEO!AxQpPYR9UtG*VHEWJ#CvOOOTAYZkK&E%D~WeRAXsUoU!EgJhS9BKI-O:P&';
    protected $apiKey3 = 'ClMyHkP=R=C4OEV7IHPeQ?MsIpFSFLK2LfF:MrA0Z4V-WYM=HAOtRYUOH?JJI9XrX:SVT7Q7D7J:QzP5JvSLVOP0KnQ=CaLrY+L-';

    public $usedKey = '';

    // ดึง Token จาก Cache หรือ API
    public function getToken()
    {
        $nowHour = Carbon::now()->hour;
        $cacheName = 'thailandpost_token_2';
        $this->usedKey = $this->apiKey;
        if ($nowHour >= 12) {
            $cacheName = 'thailandpost_token_3';
            $this->usedKey = $this->apiKey3;

            //$cacheName = 'thailandpost_token_4';
            //$this->usedKey = $this->apiKey2;
        }
        TelegramHelper::sendTelegram('used key: ' . $this->usedKey);
        return Cache::remember($cacheName, 86400, function () {
            $response = Http::withHeaders([
                'Content-Type' => 'application/json',
                'Authorization' => "Token {$this->usedKey}"
            ])->post($this->apiUrl . "authenticate/token");

            $data = $response->json();
            TelegramHelper::sendTelegram($data['token']);
            return $data['token'] ?? null;
        });
    }

    // ตรวจสอบสถานะพัสดุ
    public function trackParcel($trackingNumber)
    {
        $token = $this->getToken();

        $response = Http::withHeaders([
            'Content-Type' => 'application/json',
            'Authorization' => "Token $token"
        ])->post($this->apiUrl . "track", [
            'status' => 'all',
            'language' => 'TH',
            'barcode' => $trackingNumber
        ]);
        $response = $response->json();
        //$txt = json_encode($response, JSON_UNESCAPED_UNICODE);
        //TelegramHelper::sendTelegram('A======= ' . $txt);



        return $response;
    }
}
