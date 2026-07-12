<?php

namespace App\Events;

use App\Events\DTO\Shared\WebhookPayloadDTO;
use Illuminate\Foundation\Events\Dispatchable;

class WhatsappMessageReceivedEvent
{
    use Dispatchable;

    public function __construct(public readonly WebhookPayloadDTO $message) {}
}
