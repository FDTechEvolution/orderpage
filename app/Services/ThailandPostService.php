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

    // ดึง Token จาก Cache หรือ API
    public function getToken()
    {
        $nowHour = Carbon::now()->hour;
        $key = $this->apiKey;
        if ($nowHour >= 12) {
            $key = $this->apiKey2;
        }
        TelegramHelper::sendTelegram('used key: ' . $key);
        //return Cache::remember('thailandpost_token', 86400, function () {
        $response = Http::withHeaders([
            'Content-Type' => 'application/json',
            'Authorization' => "Token {$key}"
        ])->post($this->apiUrl . "authenticate/token");

        $data = $response->json();
        //TelegramHelper::sendTelegram($data['token']);
        return $data['token'] ?? null;
        //});
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
