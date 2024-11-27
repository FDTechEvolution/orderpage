<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;

class LarkController extends Controller
{
    public function index(Request $request){
        $data = $request->all();
        Log::debug($data);
        $encryptKey ='1ZCy6mnX48H8UClX6P4IqcG7PjFGtCjn';

        // ถอดรหัสข้อความ
        $encryptedMessage = $request->encrypt;
        $decodedMessage = $this->decryptLarkMessage($encryptedMessage, $encryptKey);

        // ตัวอย่างการตอบกลับข้อความ 'challenge'
        if (isset($decodedMessage['challenge'])) {
            return response()->json(['challenge' => $decodedMessage['challenge']]);
        }

        return response()->json(['status' => $decodedMessage]);
    }

    public function callBack(Request $request){
        $data = $request->all();
        $encryptKey ='1ZCy6mnX48H8UClX6P4IqcG7PjFGtCjn';
        Log::debug($data);
        // ถอดรหัสข้อความ
        $encryptedMessage = $request->encrypt;
        $decodedMessage = $this->decryptLarkMessage($encryptedMessage, $encryptKey);

        // ตัวอย่างการตอบกลับข้อความ 'challenge'
        if (isset($decodedMessage['challenge'])) {
            return response()->json(['challenge' => $decodedMessage['challenge']]);
        }

        return response()->json(['status' => $decodedMessage]);
    }


    public static function decryptLarkMessage(string $encrypt_data, string $encrypt_key)
    {

        $base64_decode_message = base64_decode($encrypt_data);
        $iv = substr($base64_decode_message, 0, 16);
        $encrypted_event = substr($base64_decode_message, 16);
        $decrypted = openssl_decrypt($encrypted_event, 'AES-256-CBC', hash('sha256', $encrypt_key, true), OPENSSL_RAW_DATA, $iv);
        $decrypted = json_decode($decrypted, true);
        Log::debug($decrypted);
        return $decrypted;
    }


}
