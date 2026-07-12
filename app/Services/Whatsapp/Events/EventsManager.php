<?php

namespace App\Services\Whatsapp\Events;

class EventsManager
{
    public array $handlers = [];

    public function push(callable $handler): void
    {
        $this->handlers[] = $handler;
    }

    public function notify(array $data): void
    {
        foreach ($this->handlers as $handler) {
            $handler($data);
        }
    }
}
