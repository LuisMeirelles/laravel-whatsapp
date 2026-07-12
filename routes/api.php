<?php

use App\Http\Controllers\WebhookController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/// TODO: Add a route to handle the webhook verification and message reception from WhatsApp. The GET route is used for verification, while the POST route handles incoming messages.
Route::get('/webhook', fn(Request $request) => $request->query('hub_challenge'));
Route::post('/webhook', [WebhookController::class, 'handle']);
