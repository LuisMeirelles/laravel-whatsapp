<?php

namespace App\Events\DTO\Shared;

use App\Events\DTO\TextDTO;

readonly class MessageDTO
{
    use MakesFromArray;

    public string  $id;
    public string  $timestamp;
    public string  $from;
    public string  $fromUserId;
    public string  $type;
    public TextDTO $text;

    public function __construct(array $data)
    {
        $this->id = $data['id'];
        $this->timestamp = $data['timestamp'];
        $this->from = $data['from'];
        $this->fromUserId = $data['from_user_id'];
        $this->type = $data['type'];
        $this->text = TextDTO::make($data['text']);
    }
}
