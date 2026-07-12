<?php

namespace App\Services\Whatsapp\Events;

use App\Events\DTO\Shared\MessagesDTO;

class EventsManager
{
    public array $handlers = [];

    /**
     * @param callable(MessagesDTO): void $handler
     */
    public function push(callable $handler): void
    {
        $this->handlers[] = $handler;
    }

    public function notify(MessagesDTO $data): void
    {
        foreach ($this->handlers as $handler) {
            $handler($data);
        }
    }
}
