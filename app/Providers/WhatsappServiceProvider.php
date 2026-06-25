<?php

namespace App\Providers;

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
    }

    public function boot() {}
}
