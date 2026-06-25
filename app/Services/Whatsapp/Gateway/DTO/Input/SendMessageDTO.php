<?php

namespace App\Services\Whatsapp\Gateway\DTO\Input;

readonly class SendMessageDTO
{
    public function __construct(
        public string $phoneNumber,
        public string $message,
        public bool   $previewUrl = false,
    ) {}
}
