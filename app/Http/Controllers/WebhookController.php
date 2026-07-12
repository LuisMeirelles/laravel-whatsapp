<?php

namespace App\Http\Controllers;

use App\Events\DTO\Shared\MessagesDTO;
use App\Events\WhatsappMessageReceivedEvent;
use Illuminate\Http\Request;

class WebhookController extends Controller
{
    public function handle(Request $request)
    {
        WhatsappMessageReceivedEvent::dispatch(MessagesDTO::make($request->all()));
    }
}
