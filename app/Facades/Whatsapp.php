<?php

namespace App\Facades;

use App\Services\WhatsappService;
use Illuminate\Support\Facades\Facade;

/**
 * @see \App\Services\WhatsappService
 */
class Whatsapp extends Facade
{
    protected static function getFacadeAccessor(): string
    {
        return WhatsappService::class;
    }
}
