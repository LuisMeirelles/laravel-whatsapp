<?php

namespace App\Services\Whatsapp\Gateway;

use App\Exceptions\WhatsappException;
use App\Services\Whatsapp\Gateway\DTO\Input\ReplyDTO;
use App\Services\Whatsapp\Gateway\DTO\Input\SendMessageDTO;
use App\Services\Whatsapp\Gateway\DTO\Output\Reply\ReplyResponseDTO;
use App\Services\Whatsapp\Gateway\DTO\Output\SendMessage\ContactDTO;
use App\Services\Whatsapp\Gateway\DTO\Output\SendMessage\MessageDTO;
use App\Services\Whatsapp\Gateway\DTO\Output\SendMessage\SendMessageResponseDTO;
use Illuminate\Http\Client\ConnectionException;
use Illuminate\Http\Client\PendingRequest;
use Illuminate\Http\Client\RequestException;
use Illuminate\Support\Collection;
use Illuminate\Support\Facades\Http;

readonly class WhatsappGateway
{
    const string ENDPOINT = 'messages';

    public function __construct(
        private string $baseUrl,
        private string $token,
        private string $phoneId,
        private string $version,
    ) {}

    /**
     * @throws \App\Exceptions\WhatsappException
     */
    public function sendMessage(SendMessageDTO $dto): SendMessageResponseDTO
    {
        $payload = [
            'messaging_product' => 'whatsapp',
            'recipient_type' => 'individual',
            'to' => $dto->phoneNumber,
            'type' => 'text',
            'text' => [
                'preview_url' => $dto->previewUrl,
                'body' => $dto->message,
            ],
        ];

        $response = $this->post($payload);

        $messagingProduct = $response->get('messaging_product');

        $contacts = collect($response->get('contacts'))
            ->map(fn($contact) => new ContactDTO(
                input: $contact['input'],
                waId: $contact['wa_id'],
            ));

        $messages = collect($response->get('messages'))
            ->map(fn($message) => new MessageDTO(
                id: $message['id'],
            ));

        return new SendMessageResponseDTO(
            messagingProduct: $messagingProduct,
            contacts: $contacts,
            messages: $messages,
        );
    }

    /**
     * @throws \App\Exceptions\WhatsappException
     */
    public function reply(ReplyDTO $dto): ReplyResponseDTO
    {
        $payload = [
            'messaging_product' => 'whatsapp',
            'recipient_type' => 'individual',
            'to' => $dto->phoneNumber,
            'context' => [
                'message_id' => $dto->messageId,
            ],
            'type' => 'text',
            'text' => [
                'preview_url' => $dto->previewUrl,
                'body' => $dto->message,
            ],
        ];

        $response = $this->post($payload);

        $messagingProduct = $response->get('messaging_product');

        $contacts = collect($response->get('contacts'))
            ->map(fn($contact) => new ContactDTO(
                input: $contact['input'],
                waId: $contact['wa_id'],
            ));

        $messages = collect($response->get('messages'))
            ->map(fn($message) => new MessageDTO(
                id: $message['id'],
            ));

        return new ReplyResponseDTO(
            messagingProduct: $messagingProduct,
            contacts: $contacts,
            messages: $messages,
        );
    }

    /**
     * @throws RequestException
     */
    private function getClient(): PendingRequest
    {
        return Http::withToken($this->token)
            ->baseUrl("$this->baseUrl/$this->version/$this->phoneId/" . self::ENDPOINT)
            ->throw();
    }

    /**
     * @param array $payload
     * @return \Illuminate\Support\Collection the raw response from the API
     * @throws \App\Exceptions\WhatsappException
     */
    private function post(array $payload): Collection
    {
        try {
            $response = $this->getClient()
                ->post('', $payload)
                ->collect();
        } catch (RequestException $e) {
            $response = $e->response;

            $statusCode = $response->status();
            $errorBody = $response->collect('error');

            $message = $errorBody->get('message', 'An error occurred while sending the message.');
            $apiCode = $errorBody->get('code');
            $type = $errorBody->get('type');

            throw WhatsappException::make(
                message: $message,
                statusCode: $statusCode,
                apiCode: $apiCode,
                type: $type,
                previous: $e,
            );
        } catch (ConnectionException $e) {
            throw WhatsappException::make(
                message: 'A server error occurred while sending the message.',
                details: $e->getMessage(),
                previous: $e,
            );
        }
        return $response;
    }
}
