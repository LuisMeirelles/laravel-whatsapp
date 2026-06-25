<?php

namespace App\Services\Whatsapp\Senders\Messages\Models\Traits;

use App\Services\Whatsapp\Gateway\WhatsappGateway;

trait HasGateway
{
    protected WhatsappGateway $gateway {
        get => $this->gateway ?? $this->gateway = app(WhatsappGateway::class);
    }
}
