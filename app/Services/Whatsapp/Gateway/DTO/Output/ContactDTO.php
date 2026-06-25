<?php

namespace App\Services\Whatsapp\Gateway\DTO\Output;

readonly class ContactDTO
{
    public function __construct(
        public string $input,
        public string $waId,
    ) {}
}
