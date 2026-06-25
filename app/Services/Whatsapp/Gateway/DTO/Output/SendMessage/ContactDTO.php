<?php

namespace App\Services\Whatsapp\Gateway\DTO\Output\SendMessage;

readonly class ContactDTO
{
    public function __construct(
        public string $input,
        public string $waId,
    ) {}
}
