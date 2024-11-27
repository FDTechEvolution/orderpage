<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ManageOrderController extends Controller
{

    public function index(){
        return view('pages.manageOrder.index',[
            'title'=>'ออเดอร์ใหม่',
            'description'=>'รายการออเดอร์ที่พนักงานส่งเข้ามา รอการยืนยันข้อมูลในขึ้นตอนถัดไป'
        ]);
    }
}
