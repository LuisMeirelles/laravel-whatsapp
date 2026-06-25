<?php

namespace App\Services\Whatsapp\Gateway\DTO\Output\Reply;

use Illuminate\Support\Collection;

readonly class ReplyResponseDTO
{
    public function __construct(
        public string     $messagingProduct,

        /** @var Collection<int, ContactDTO> */
        public Collection $contacts,

        /** @var Collection<int, MessageDTO> */
        public Collection $messages,
    ) {}
}
