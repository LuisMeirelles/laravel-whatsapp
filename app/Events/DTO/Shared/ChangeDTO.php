<?php

namespace App\Events\DTO\Shared;

use App\Events\DTO\Shared\Value\MessagesValueDTO;
use App\Events\DTO\Shared\Value\StatusesValueDTO;
use App\Events\DTO\Shared\Value\ValueDTO;

readonly class ChangeDTO
{
    use MakesFromArray;

    public string $field;
    public MessagesValueDTO|StatusesValueDTO $value;

    public function __construct(array $data)
    {
        $this->field = $data['field'];

        $this->value = ValueDTO::make($data['value']);
    }
}
