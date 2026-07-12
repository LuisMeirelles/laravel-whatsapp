<?php

namespace App\Events\DTO\Shared;

use Illuminate\Support\Collection;

readonly class WebhookPayloadDTO
{
    use MakesFromArray;

    public string $object;

    /** @var Collection<int, EntryDTO> */
    public Collection $entry;

    public function __construct(array $data)
    {
        $this->object = $data['object'];
        $this->entry = collect($data['entry'])->mapInto(EntryDTO::class);
    }
}
