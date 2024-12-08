<?php

namespace App\Http\Controllers;

use App\Models\Customer;
use App\Models\Order;
use Illuminate\Http\Request;

class GuestController extends Controller
{
    public function find(){
        $mobileno = trim(request()->mobileno);
        $orders = [];

        if(!empty($mobileno)){
            //dd($mobileno);
            $orders = Customer::where('mobile',$mobileno)->with(['orders','orders.shipping'])->orderBy('created','DESC')->get();
            //dd($orders);
        }

        return view('pages.guest.find',[
            'orders'=>$orders,
            'mobileno'=>$mobileno
        ]);
    }
}
