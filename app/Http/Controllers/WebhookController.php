<?php

namespace App\Http\Controllers;

use App\Events\WhatsappMessageReceivedEvent;
use Illuminate\Http\Request;

class WebhookController extends Controller
{
    public function handle(Request $request)
    {
        WhatsappMessageReceivedEvent::dispatch($request->all());
    }
}
