<?php

namespace App\Providers;

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
        app(WhatsappService::class)->onMessage(function (array $data) {
            logger()->debug('Whatsapp message received', $data);
        });
    }
}
