<?php

namespace App\Services\Whatsapp\Gateway\DTO\Output\SendMessage;

use Illuminate\Support\Collection;

readonly class SendMessageResponseDTO
{
    public function __construct(
        public string     $messagingProduct,

        /** @var Collection<int, ContactDTO> */
        public Collection $contacts,

        /** @var Collection<int, MessageDTO> */
        public Collection $messages,
    ) {}
}
