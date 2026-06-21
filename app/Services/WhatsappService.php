<?php

namespace App\Services;

use Illuminate\Http\Client\PendingRequest;
use Illuminate\Support\Facades\Http;

readonly class WhatsappService
{
    private PendingRequest $client;

    public function __construct(
        private string $baseUrl,
        private string $token,
        private string $phoneId,
        private string $version,
    ) {
        $this->client = Http::withToken($this->token)
            ->baseUrl("$this->baseUrl/$this->version/$this->phoneId");
    }

    /**
     * @throws \Illuminate\Http\Client\ConnectionException
     */
    public function sendTextMessage($phoneNumber, $message): void
    {
        $payload = [
            'messaging_product' => 'whatsapp',
            'recipient_type' => 'individual',
            'to' => $phoneNumber,
            'type' => 'text',
            'text' => [
                'preview_url' => false,
                'body' => $message
            ]
        ];

        $this->client->post('messages', $payload);
    }
}
