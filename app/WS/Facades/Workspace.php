<?php

namespace App\WS\Facades;

use Illuminate\Support\Facades\Facade;

class Workspace extends Facade
{
    protected static function getFacadeAccessor(): string
    {
        return 'Workspace'; // ← este nombre debe coincidir con el registrado en el provider
    }
}
