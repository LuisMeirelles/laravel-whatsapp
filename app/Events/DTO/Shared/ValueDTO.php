<?php

namespace App\Events\DTO\Shared;

use Illuminate\Support\Collection;

readonly class ValueDTO
{
    public function __construct(
        public string      $messagingProduct,
        public MetadataDTO $metadata,

        /** @var Collection<int, ContactDTO> */
        public Collection  $contacts,

        /** @var Collection<int, MessageDTO> */
        public Collection  $messages,
    ) {}
}
