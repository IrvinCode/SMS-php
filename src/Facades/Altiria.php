<?php
/**
 * Created by PhpStorm.
 * User: irvin
 * Date: 5/12/17
 * Time: 10:08 AM
 */

namespace IrvinCode\SMS\Facades;

use Illuminate\Support\Facades\Facade;
use IrvinCode\SMS\SMSAltaria;

class Altiria extends Facade
{
    protected static function getFacadeAccessor() { return SMSAltaria::class; }
}