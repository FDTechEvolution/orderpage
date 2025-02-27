<?php

namespace App\Helpers;

class AppStatusHelper
{
    public static function getOrderStatus($status = null)
    {
        $allStatus = [
            'DR' => 'ฉบับร่าง',
            'CF' => 'ยืนยัน',
            'P1' => 'ปริ้น',
            'WS' => 'รอจัดส่ง',
            'ST' => 'ขนส่งรับสินค้า',
            'DV' => 'กำลังนำส่งให้ลูกค้า',
            'ACC' => 'ติดปัญหา',
            'RT' => 'ตีกลับ',
            'VO' => 'ยกเลิกออเดอร์',
            'VO_RETURN' => 'ปฏิเสธรับสินค้า/รับสินค้าคืน',
            'RECEIVED' => 'ได้รับสินค้าแล้ว',
        ];

        if (!empty($status)) {
            return isset($allStatus[$status]) ? $allStatus[$status] : '';
        }
        return $allStatus;
    }

    public static function getShippingStatus()
    {
        return [
            "S101" => "เตรียมการฝากส่ง",
            "S102" => "อยู่ระหว่างการนำจ่าย",
            "S103" => "นำจ่ายไม่สำเร็จ",
            "S104" => "นำจ่ายสำเร็จ",
            "S105" => "ตีกลับ",
        ];
    }
}
