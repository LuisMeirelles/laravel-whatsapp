<?php

namespace App\Services\Whatsapp\Gateway\DTO\Output\Reply;

readonly class ContactDTO
{
    public function __construct(
        public string $input,
        public string $waId,
    ) {}
}
