<?php

namespace App\Services\Whatsapp\Senders\Messages\Models;

use App\Services\Whatsapp\Gateway\DTO\Input\ReplyDTO;
use App\Services\Whatsapp\Gateway\WhatsappGateway;

class Reply extends Message
{
    public function __construct(
        string $id,
        string $to,
        string $text,
        public string $replyToId,
    ) {
        parent::__construct(
            id: $id,
            to: $to,
            text: $text,
        );
    }

    /**
     * @throws \App\Exceptions\WhatsappException
     */
    public static function to(string $phoneNumber, string $text, string $replyToId): self
    {
        $gateway = app(WhatsappGateway::class);

        $response = $gateway->reply(new ReplyDTO(
            phoneNumber: $phoneNumber,
            message: $text,
            messageId: $replyToId,
        ));

        return new Reply(
            id: $response->messages->first()->id,
            to: $phoneNumber,
            text: $text,
            replyToId: $replyToId,
        );
    }
}
