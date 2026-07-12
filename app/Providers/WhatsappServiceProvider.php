<?php

namespace App\Providers;

use App\Services\Whatsapp\Events\EventsManager;
use App\Services\Whatsapp\Gateway\WhatsappGateway;
use Illuminate\Support\ServiceProvider;

class WhatsappServiceProvider extends ServiceProvider
{
    public function register(): void
    {
        $this->app->singleton(
            WhatsappGateway::class,
            fn() => new WhatsappGateway(
                baseUrl: config('waba.base_url'),
                token: config('waba.token'),
                phoneId: config('waba.phone_number_id'),
                version: config('waba.version'),
            )
        );

        $this->app->singleton(
            EventsManager::class,
            fn() => new EventsManager()
        );
    }

    public function boot() {}
}
