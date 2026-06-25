<?php

namespace App\Services\Whatsapp\Senders\Messages\Models;

readonly class Message
{
    public function __construct(
        public string $id,
        public string $to,
        public string $text,
    ) {}
}
