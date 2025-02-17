<?php

namespace App\Services;

use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Cache;

class ThailandPostService
{
    protected $apiUrl = "https://trackapi.thailandpost.co.th/post/api/v1/";
    protected $apiKey = "D%VFE6LjN&RFALUTPrKhX+K7JKFqFkI4A^TQD^HrQmKOIpCnX;J#KEBaOFAnIHP?S:T4P%CWOcRtCtF#NdMuH1BaS5KrLpY5WKQh"; // นำ API Key มาใส่ตรงนี้

    // ดึง Token จาก Cache หรือ API
    public function getToken()
    {
        return Cache::remember('thailandpost_token', 86400, function () {
            $response = Http::withHeaders([
                'Content-Type' => 'application/json',
                'Authorization' => "Token {$this->apiKey}"
            ])->post($this->apiUrl . "authenticate/token");

            $data = $response->json();

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
        //dd($response);
        return $response->json();
    }
}
