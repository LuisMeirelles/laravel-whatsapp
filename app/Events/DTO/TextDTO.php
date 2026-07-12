<?php

namespace App\Events\DTO;

readonly class TextDTO
{
    public function __construct(
        public string $body,
    ) {}
}
