<?php

namespace App\Providers;

use App\Events\DTO\Shared\MessagesDTO;
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
            logger()->info('Whatsapp message received: ' . $data->entry->first()->changes->first()->value->messages->first()->text->body);
        });
    }
}
