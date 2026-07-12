<?php

namespace App\Providers;

use App\Events\DTO\Shared\MessagesDTO;
use App\Events\DTO\Shared\MessagesValueDTO;
use App\Events\DTO\Shared\StatusesValueDTO;
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
        app(WhatsappService::class)->onMessage(function (MessagesDTO $data) {
            $value = $data->entry->first()->changes->first()->value;

            if ($value instanceof MessagesValueDTO) {
                logger()->info('Whatsapp message received: ' . $value->messages->first()->text->body);
            } else if ($value instanceof StatusesValueDTO) {
                $statuses = $value->statuses;
                logger()->info('Whatsapp status received: ' . $statuses->first()->status, $statuses->toArray());
            }
        });
    }
}
