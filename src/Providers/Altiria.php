<?php

namespace IrvinCode\SMS\Providers;

use Illuminate\Support\ServiceProvider;
use IrvinCode\SMS\SMSAltiria;

class Altiria extends ServiceProvider
{
    /**
     * Bootstrap the application services.
     *
     * @return void
     */
    public function boot()
    {
        $this->publishes([
            __DIR__ . '/../config/SMSAltiria.php' => config_path('SMSAltiria.php'),
        ], 'config');
    }
    /**
     * Register the application services.
     *
     * @return void
     */
    public function register()
    {
        // Config
        $this->mergeConfigFrom( __DIR__ . '/../config/SMSAltiria.php', 'config');

        $this->app->singleton(SMSAltiria::class, function($app){
            return new SMSAltiria();
        });
    }
}