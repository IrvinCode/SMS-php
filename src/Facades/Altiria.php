<?php

namespace IrvinCode\SMS\Facades;

use Illuminate\Support\Facades\Facade;
use IrvinCode\SMS\SMSAltaria;

class Altiria extends Facade
{
    protected static function getFacadeAccessor() { return SMSAltaria::class; }
}