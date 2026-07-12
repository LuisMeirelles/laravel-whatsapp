<?php

namespace App\Events\DTO\Shared;

use Illuminate\Support\Collection;

readonly class EntryDTO
{
    use MakesFromArray;

    public string     $id;

    /** @var Collection<int, ChangeDTO> */
    public Collection $changes;

    public function __construct(array $data)
    {
        $this->id = $data['id'];
        $this->changes = collect($data['changes'])->mapInto(ChangeDTO::class);
    }
}
