<?php

namespace App\Http\Controllers;

use App\Helpers\TelegramHelper;
use App\Jobs\TrackingProcessJob;
use Illuminate\Http\Request;
use App\Services\ThailandPostService;
use App\Models\Order;
use App\Models\Shipping;


class TrackingController extends Controller
{

    public function index()
    {

        //TrackingProcessJob::dispatch();

        //TelegramHelper::sendTelegram('hi');
        return view('pages.tracking.index', [
            'title' => ''
        ]);
    }
}
