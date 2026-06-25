<?php

namespace App\Services\Whatsapp\Senders\Messages;

use App\Services\Whatsapp\Gateway\DTO\Input\SendMessageDTO;
use App\Services\Whatsapp\Gateway\WhatsappGateway;
use App\Services\Whatsapp\Senders\Messages\Models\Message;

readonly class MessageSender
{
    public ?string $text;
    public ?string $to;

    public function __construct(private WhatsappGateway $gateway) {}

    public function copy(?string $text = null, ?string $to = null): self
    {
        $gateway = new self($this->gateway);

        $gateway->text = $text ?? $this->text ?? null;
        $gateway->to = $to ?? $this->to ?? null;

        return $gateway;
    }

    public function text(string $text): self
    {
        return $this->copy(text: $text);
    }

    public function to(string $to): self
    {
        return $this->copy(to: $to);
    }

    /**
     * @throws \App\Exceptions\WhatsappException
     */
    public function send(): Message
    {
        $response = $this->gateway->sendMessage(new SendMessageDTO(
            phoneNumber: $this->to,
            message: $this->text,
            previewUrl: false,
        ));

        return new Message(
            id: $response->messages->first()->id,
            to: $this->to,
            text: $this->text,
        );
    }
}
