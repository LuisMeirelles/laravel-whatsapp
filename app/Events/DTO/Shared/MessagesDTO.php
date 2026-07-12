<?php

namespace App\Events\DTO\Shared;

use Illuminate\Support\Collection;

readonly class MessagesDTO
{
    public function __construct(
        public string     $object,

        /** @var Collection<int, EntryDTO> */
        public Collection $entry,
    ) {}
}
