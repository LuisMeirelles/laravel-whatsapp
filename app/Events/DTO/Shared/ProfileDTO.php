<?php

namespace App\Events\DTO\Shared;

readonly class ProfileDTO
{
    use MakesFromArray;

    public string $name;

    public function __construct(array $data)
    {
        $this->name = $data['name'];
    }
}
