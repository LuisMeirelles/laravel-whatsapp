<?php

namespace App\Events\DTO\Shared;

trait MakesFromArray
{
    public static function make(array $data): static
    {
        return new static($data);
    }
}