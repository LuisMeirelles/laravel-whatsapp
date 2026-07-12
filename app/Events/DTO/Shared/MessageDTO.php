<?php

namespace App\Events\DTO\Shared;

use App\Events\DTO\TextDTO;

readonly class MessageDTO
{
    public function __construct(
        public string  $id,
        public string  $timestamp,
        public string  $from,
        public string  $fromUserId,
        public string  $type,
        public TextDTO $text,
    ) {}
}
