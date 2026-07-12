<?php

namespace App\Events\DTO;

use App\Events\DTO\Shared\MakesFromArray;

readonly class TextDTO
{
    use MakesFromArray;

    public string $body;

    public function __construct(array $data)
    {
        $this->body = $data['body'];
    }
}
