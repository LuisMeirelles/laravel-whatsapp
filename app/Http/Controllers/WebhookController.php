<?php

namespace App\Http\Controllers;

use App\Events\DTO\Shared\ChangeDTO;
use App\Events\DTO\Shared\ContactDTO;
use App\Events\DTO\Shared\EntryDTO;
use App\Events\DTO\Shared\MessageDTO;
use App\Events\DTO\Shared\MessagesDTO;
use App\Events\DTO\Shared\MetadataDTO;
use App\Events\DTO\Shared\ProfileDTO;
use App\Events\DTO\Shared\ValueDTO;
use App\Events\DTO\TextDTO;
use App\Events\WhatsappMessageReceivedEvent;
use Illuminate\Http\Request;

class WebhookController extends Controller
{
    public function handle(Request $request)
    {
        WhatsappMessageReceivedEvent::dispatch(new MessagesDTO(
            object: $request->input('object'),
            entry: $request->collect('entry')->map(fn($entry) => new EntryDTO(
                id: $entry['id'],
                changes: collect($entry['changes'])->map(fn($change) => new ChangeDTO(
                    field: $change['field'],
                    value: new ValueDTO(
                        messagingProduct: $change['value']['messaging_product'] ?? null,
                        metadata: new MetadataDTO(
                            displayPhoneNumber: $change['value']['metadata']['display_phone_number'] ?? null,
                            phoneNumberId: $change['value']['metadata']['phone_number_id'] ?? null,
                        ),
                        contacts: collect($change['value']['contacts'] ?? [])->map(fn($contact) => new ContactDTO(
                            profile: new ProfileDTO(
                                name: $change['value']['contacts'][0]['profile']['name'] ?? null,
                            ),
                            waId: $change['value']['contacts'][0]['wa_id'] ?? null,
                            userId: $change['value']['contacts'][0]['user_id'] ?? null,
                        )),
                        messages: collect($change['value']['messages'] ?? [])->map(fn($message) => new MessageDTO(
                            id: $message['id'] ?? null,
                            timestamp: $message['timestamp'] ?? null,
                            from: $message['from'] ?? null,
                            fromUserId: $message['from_user_id'] ?? null,
                            type: $message['type'] ?? null,
                            text: new TextDTO(
                                body: $message['text']['body'] ?? null,
                            ),
                        )),
                    )
                ))
            ))
        ));
    }
}
