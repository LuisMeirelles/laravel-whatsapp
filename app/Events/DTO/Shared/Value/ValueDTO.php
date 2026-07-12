<?php

namespace App\Events\DTO\Shared\Value;

use App\Events\DTO\Shared\ContactDTO;
use App\Events\DTO\Shared\MetadataDTO;
use Illuminate\Support\Arr;
use Illuminate\Support\Collection;

readonly class ValueDTO
{
    public string $messagingProduct;
    public MetadataDTO $metadata;

    /** @var Collection<int, ContactDTO> */
    public Collection $contacts;

    public function __construct(array $data)
    {
        $this->messagingProduct = $data['messaging_product'];
        $this->metadata = MetadataDTO::make($data['metadata']);
        $this->contacts = collect($data['contacts'])->mapInto(ContactDTO::class);
    }

    public static function make(array $data): MessagesValueDTO|StatusesValueDTO|static {
        if (Arr::has($data, 'messages')) {
            return MessagesValueDTO::make($data);
        } else if (Arr::has($data, 'statuses')) {
            return StatusesValueDTO::make($data);
        }

        return new static($data);
    }
}
