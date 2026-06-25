<?php

namespace App\Services\Whatsapp\Senders\Messages\Models;

use App\Services\Whatsapp\Senders\Messages\Models\Traits\HasGateway;

class Message
{
    use HasGateway;

    public function __construct(
        readonly public string $id,
        readonly public string $to,
        readonly public string $text,
    ) {}

    /**
     * @throws \App\Exceptions\WhatsappException
     */
    public function reply(string $text): Reply
    {
        return Reply::to($this->to, $text, $this->id);
    }
}
