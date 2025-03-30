<?php

namespace App\Services;

use Telegram\Bot\Api;

class TelegramService
{
    protected $telegram;
    protected $chatId;

    public function __construct()
    {
        $this->telegram = new Api('8020329660:AAGqmtEs6CsfXi4eEplVl88gDeKyUbOTT7I');
        //$this->telegram = '8020329660:AAGqmtEs6CsfXi4eEplVl88gDeKyUbOTT7I';
        $this->chatId = '-4613644541';
    }

    public function sendMessage($message, $telegram_chat_id)
    {
        return $this->telegram->sendMessage([
            'chat_id' => $telegram_chat_id,
            'text' => $message,
            'parse_mode' => 'Markdown'
        ]);
    }
}
