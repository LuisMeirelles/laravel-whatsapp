<?php

namespace App\Events\DTO\Shared;

use Illuminate\Support\Collection;

readonly class MessagesValueDTO extends ValueDTO
{
    use MakesFromArray;

    /** @var Collection<int, MessageDTO> */
    public Collection $messages;

    public function __construct(array $data)
    {
        parent::__construct($data);

        $this->messages = collect($data['messages'])->mapInto(MessageDTO::class);
    }
}
