<?php

namespace App\Services\Whatsapp\Events;

use App\Events\DTO\Shared\WebhookPayloadDTO;

class EventsManager
{
    public array $handlers = [];

    /**
     * @param callable(WebhookPayloadDTO): void $handler
     */
    public function push(callable $handler): void
    {
        $this->handlers[] = $handler;
    }

    public function notify(WebhookPayloadDTO $data): void
    {
        foreach ($this->handlers as $handler) {
            $handler($data);
        }
    }
}
