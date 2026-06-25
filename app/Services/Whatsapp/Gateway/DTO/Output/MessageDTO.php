<?php

namespace App\Services\Whatsapp\Gateway\DTO\Output;

readonly class MessageDTO
{
    public function __construct(
        public string $id,
    ) {}
}
