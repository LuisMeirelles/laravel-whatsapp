<?php

namespace App\Events;

use App\Events\DTO\Shared\MessagesDTO;
use Illuminate\Foundation\Events\Dispatchable;

class WhatsappMessageReceivedEvent
{
    use Dispatchable;

    public function __construct(public readonly MessagesDTO $message) {}
}
