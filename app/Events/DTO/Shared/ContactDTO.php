<?php

namespace App\Events\DTO\Shared;

readonly class ContactDTO
{
    public function __construct(
        public ProfileDTO $profile,
        public string     $waId,
        public string     $userId,
    ) {}
}
