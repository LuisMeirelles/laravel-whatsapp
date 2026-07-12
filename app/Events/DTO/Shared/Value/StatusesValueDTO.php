<?php

namespace App\Events\DTO\Shared\Value;

use App\Events\DTO\Shared\MakesFromArray;
use App\Events\DTO\Shared\StatusDTO;
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
