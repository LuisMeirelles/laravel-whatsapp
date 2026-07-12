<?php

namespace App\Services\Whatsapp;

use App\Events\DTO\Shared\WebhookPayloadDTO;
use App\Services\Whatsapp\Events\EventsManager;
use App\Services\Whatsapp\Senders\Messages\MessageSender;

readonly class WhatsappService
{
    public function __construct(
        private MessageSender $messageSender,
        private EventsManager $eventsManager,
    ) {}

    public function message(): MessageSender
    {
        return $this->messageSender;
    }

    /**
     * @param callable(WebhookPayloadDTO): void $callback
     */
    public function onMessage(callable $callback): void
    {
        $this->eventsManager->push($callback);
    }
}
