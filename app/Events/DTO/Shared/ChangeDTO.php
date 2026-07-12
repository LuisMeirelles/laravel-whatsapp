<?php

namespace App\Events\DTO\Shared;

use Illuminate\Support\Arr;

readonly class ChangeDTO
{
    use MakesFromArray;

    public string $field;
    public MessagesValueDTO|StatusesValueDTO $value;

    public function __construct(array $data)
    {
        $this->field = $data['field'];

        $value = $data['value'];

        if (Arr::has($data, 'value.messages')) {
            $this->value = MessagesValueDTO::make($value);
        } else if (Arr::has($data, 'value.statuses')) {
            $this->value = StatusesValueDTO::make($value);
        }
    }
}
