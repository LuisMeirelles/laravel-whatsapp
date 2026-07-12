<?php

namespace App\Events\DTO\Shared;

readonly class MetadataDTO
{
    use MakesFromArray;

    public string $displayPhoneNumber;
    public string $phoneNumberId;

    public function __construct(array $data)
    {
        $this->displayPhoneNumber = $data['display_phone_number'];
        $this->phoneNumberId = $data['phone_number_id'];
    }
}
