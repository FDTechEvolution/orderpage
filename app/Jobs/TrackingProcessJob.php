<?php

namespace App\Jobs;

use App\Helpers\TelegramHelper;
use App\Models\Order;
use App\Models\Shipping;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Queue\Queueable;
use App\Services\ThailandPostService;

class TrackingProcessJob implements ShouldQueue
{
    use Queueable;

    /**
     * Create a new job instance.
     */
    protected $thailandPost;
    public function __construct() {}

    public $shippingStatus = [
        'THSIPOST' => [
            "101" => "S101",
            "102" => "S101",
            "103" => "S101",
            "104" => "S101",
            "201" => "S102",
            "202" => "S102",
            "203" => "S105",
            "204" => "S102",
            "205" => "S102",
            "206" => "S102",
            "208" => "S102",
            "209" => "S102",
            "210" => "S102",
            "211" => "S102",
            "212" => "S102",
            "213" => "S102",
            "214" => "S102",
            "215" => "S102",
            "216" => "S102",
            "217" => "S102",
            "218" => "S102",
            "219" => "S102",
            "220" => "S102",
            "301" => "S102",
            "302" => "S102",
            "303" => "S102",
            "304" => "S102",
            "401" => "S103",
            "402" => "S102",
            "501" => "S104",
            "901" => "S104"
        ],
        'FLASH' => []
    ];

    /**
     * Execute the job.
     */
    public function handle(): void
    {
        //THPOST
        $shippings = Shipping::whereIn('code', ['THPOST_POSTONE', 'THPOST_PROSHIP'])->select('id')->get();
        $successCount = 0;
        $orders = Order::whereIn('status', ['ST', 'DV'])
            ->where('shipping_status', '!=', 'NOTF')
            ->whereNotNull('trackingno')
            ->where('orderdate', '>=', '2025-01-01')
            ->whereIn('shipping_id', $shippings)->get();


        $trackings = [];
        foreach ($orders as $order) {
            array_push($trackings, trim($order->trackingno));
        }
        TelegramHelper::sendTelegram('start tracking ' . sizeof($trackings) . ' orders');
        $this->thailandPost = new ThailandPostService();
        $roundRequests = array_chunk($trackings, 20);
        foreach ($roundRequests as $roundRequest) {
            //$txt = json_encode($roundRequest, JSON_UNESCAPED_UNICODE);
            //TelegramHelper::sendTelegram($txt);
            $result = $this->thailandPost->trackParcel($roundRequest);

            if ((isset($result['status']) && $result['status'] == false) || !isset($result['response']['items'])) {
                TelegramHelper::sendTelegram('-----------stop tracking');
                $txt = json_encode($result, JSON_UNESCAPED_UNICODE);
                TelegramHelper::sendTelegram($txt);
                break;
            }

            $items = $result['response']['items'];
            foreach ($items as $trackingno => $Shippingitems) {
                if (!is_null($Shippingitems) && sizeof($Shippingitems) != 0) {
                    $successCount++;
                    $lastShippingStatus = end($Shippingitems);
                    $_shippingStatus = $this->shippingStatus['THSIPOST'][$lastShippingStatus['status']];

                    $updateData = [];
                    if ($_shippingStatus == 'S104') {
                        $updateData = [
                            'shipping_status' => $_shippingStatus,
                            'shipping_description' => $lastShippingStatus['status_description'],
                            'status' => 'RECEIVED'
                        ];
                    } elseif ($_shippingStatus == 'S105') {
                        $updateData = [
                            'shipping_status' => $_shippingStatus,
                            'shipping_description' => $lastShippingStatus['status_description'],
                            'status' => 'RT'
                        ];
                    } else {
                        $updateData = [
                            'shipping_status' => $_shippingStatus,
                            'shipping_description' => $lastShippingStatus['status_description'],
                            'status' => 'DV'
                        ];
                    }
                    Order::where('trackingno', $trackingno)->update($updateData);
                } else {
                    Order::where('trackingno', $trackingno)->update(['shipping_status' => 'NOTF']);
                }
            }
        }

        TelegramHelper::sendTelegram('success process ' . $successCount . ' orders.');
    }
}
