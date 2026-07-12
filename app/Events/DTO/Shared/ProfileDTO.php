<?php

namespace App\Events\DTO\Shared;

readonly class ProfileDTO
{
    public function __construct(
        public string $name,
    ) {}
}
