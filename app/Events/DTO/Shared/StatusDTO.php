<?php

namespace App\Events\DTO\Shared;

readonly class StatusDTO
{
    use MakesFromArray;

    public string $id;
    public string $status;
    public string $timestamp;
    public string $recipientId;
    public string $recipientUserId;
    public PricingDTO $pricing;

    public function __construct(array $data)
    {

        $this->id = $data['id'];
        $this->status = $data['status'];
        $this->timestamp = $data['timestamp'];
        $this->recipientId = $data['recipient_id'];
        $this->recipientUserId = $data['recipient_user_id'];
        $this->pricing = PricingDTO::make($data['pricing']);
    }
}
