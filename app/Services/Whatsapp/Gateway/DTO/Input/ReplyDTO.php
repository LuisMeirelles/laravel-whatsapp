<?php

namespace App\Services\Whatsapp\Gateway\DTO\Input;

readonly class ReplyDTO
{
    public function __construct(
        public string $phoneNumber,
        public string $message,
        public string $messageId,
        public bool   $previewUrl = false,
    ) {}
}
