<?php

namespace App\Events\DTO\Shared;

readonly class ContactDTO
{
    use MakesFromArray;

    public ?ProfileDTO $profile;
    public string $waId;
    public string $userId;

    public function __construct(array $data)
    {
        $this->waId = $data['wa_id'];
        $this->userId = $data['user_id'];

        $this->profile = optional($data['profile'] ?? null, fn($profile) => ProfileDTO::make($profile));
    }
}
