<?php

namespace App\Services\Whatsapp;

use App\Services\Whatsapp\Senders\Messages\MessageSender;

readonly class WhatsappService
{
    public function __construct(private MessageSender $messageSender) {}

    public function message(): MessageSender
    {
        return $this->messageSender;
    }
}
