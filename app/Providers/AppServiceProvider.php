<?php

namespace App\Providers;

use App\Events\DTO\Shared\WebhookPayloadDTO;
use App\Events\DTO\Shared\Value\MessagesValueDTO;
use App\Events\DTO\Shared\Value\StatusesValueDTO;
use App\Services\Whatsapp\WhatsappService;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        app(WhatsappService::class)->onMessage(function (WebhookPayloadDTO $data) {
            $value = $data->entry->first()->changes->first()->value;

            if ($value instanceof MessagesValueDTO) {
                logger()->info('Whatsapp message received: ' . $value->messages->first()->text->body);
            } else if ($value instanceof StatusesValueDTO) {
                logger()->info('Whatsapp status received: ' . $value->statuses->first()->status);
            }
        });
    }
}
