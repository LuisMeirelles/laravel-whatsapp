<?php

namespace App\Listeners;

use App\Events\WhatsappMessageReceivedEvent;
use App\Services\Whatsapp\Events\EventsManager;

readonly class CallWhatsappEventsManagerListener
{
    public function __construct(private EventsManager $whatsappEventsManager) {}

    public function handle(WhatsappMessageReceivedEvent $event): void
    {
        $this->whatsappEventsManager->notify($event->data);
    }
}
