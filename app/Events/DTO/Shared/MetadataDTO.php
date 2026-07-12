<?php

namespace App\Events\DTO\Shared;

/**
 * {
          "display_phone_number": "16505551111",
          "phone_number_id": "123456123"
        }
 */
readonly class MetadataDTO {
    public function __construct(
        public string $displayPhoneNumber,
        public string $phoneNumberId,
    ) {}
}
