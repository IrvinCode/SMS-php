<?php

namespace IrvinCode\SMS;

use Illuminate\Support\ServiceProvider;

class SMSServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap the application services.
     *
     * @return void
     */
    public function boot()
    {
        $this->loadTranslationsFrom(__DIR__.'/config/config.php', 'IrvinCode\SMS\config\config');

        $this->publishes([
            __DIR__.'/config/config.php' => config_path('config.php'),
        ], 'config');
    }
    /**
     * Register the application services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->bind('IrvinCode\smsAltiria\SMSAltiria');

        $this->mergeConfigFrom(
            __DIR__.'/config/config.php', 'sms'
        );
    }
}