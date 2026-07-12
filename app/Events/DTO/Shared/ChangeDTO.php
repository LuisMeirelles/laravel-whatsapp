<?php

namespace App\Events\DTO\Shared;

readonly class ChangeDTO
{
    public function __construct(
        public string   $field,
        public ValueDTO $value,
    ) {}
}
