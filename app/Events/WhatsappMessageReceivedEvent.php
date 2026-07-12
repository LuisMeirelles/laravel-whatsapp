<?php

namespace App\Events;

use Illuminate\Foundation\Events\Dispatchable;

class WhatsappMessageReceivedEvent
{
    use Dispatchable;

    public function __construct(public readonly array $data) {}
}
