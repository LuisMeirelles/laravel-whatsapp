<?php

namespace App\Facades;

use App\Services\Whatsapp\WhatsappService;
use Illuminate\Support\Facades\Facade;

/**
 * @see \app\Services\Whatsapp\WhatsappService
 */
class Whatsapp extends Facade
{
    protected static function getFacadeAccessor(): string
    {
        return WhatsappService::class;
    }
}
