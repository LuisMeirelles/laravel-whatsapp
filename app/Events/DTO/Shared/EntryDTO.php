<?php

namespace App\Events\DTO\Shared;

use Illuminate\Support\Collection;

readonly class EntryDTO
{
    public function __construct(
        public string     $id,

        /** @var Collection<int, ChangeDTO> */
        public Collection $changes,
    ) {}
}
