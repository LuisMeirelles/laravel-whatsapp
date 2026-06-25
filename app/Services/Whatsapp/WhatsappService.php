<?php

namespace App\Services\Whatsapp;

use App\Services\Whatsapp\Senders\MessageSender;
use App\Services\Whatsapp\Gateway\DTO\Input\SendMessageDTO;
use App\Services\Whatsapp\Gateway\WhatsappGateway;

readonly class WhatsappService
{
    public function __construct(private WhatsappGateway $gateway) {}

    /**
     * @throws \App\Exceptions\WhatsappException
     *
     * @return string Message ID
     */
    public function sendTextMessage(string $phoneNumber, string $message): string
    {
        $response = $this->gateway->sendMessage(new SendMessageDTO(
            phoneNumber: $phoneNumber,
            message: $message,
            previewUrl: false,
        ));

        return $response->messages->first()->id ?? '';
    }

    public function message(): MessageSender
    {
        return app(MessageSender::class);
    }
}
