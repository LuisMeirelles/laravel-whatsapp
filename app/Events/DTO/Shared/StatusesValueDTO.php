<?php

namespace App\Events\DTO\Shared;

use Illuminate\Support\Collection;

readonly class StatusesValueDTO extends ValueDTO
{
    use MakesFromArray;

    /** @var Collection<int, StatusDTO> */
    public Collection $statuses;

    public function __construct(array $data)
    {
        parent::__construct($data);

        $this->statuses = collect($data['statuses'])->mapInto(StatusDTO::class);
    }
}
