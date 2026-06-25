<?php

namespace App\Services\Whatsapp\Senders;

use App\Services\Whatsapp\Gateway\DTO\Input\SendMessageDTO;
use App\Services\Whatsapp\Gateway\WhatsappGateway;

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
    public function send(): string
    {
        $response = $this->gateway->sendMessage(new SendMessageDTO(
            phoneNumber: $this->to,
            message: $this->text,
            previewUrl: false,
        ));

        return $response->messages->first()->id;
    }
}
