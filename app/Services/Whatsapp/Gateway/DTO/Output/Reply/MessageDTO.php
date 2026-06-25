<?php

namespace App\Services\Whatsapp\Gateway\DTO\Output\Reply;

readonly class MessageDTO
{
    public function __construct(
        public string $id,
    ) {}
}
