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
        $this->loadTranslationsFrom(__DIR__.'/src/config', 'IrvinCode\SMS\config\Altiria');

        $this->publishes([
            __DIR__.'/src/config' => resource_path('IrvinCode/SMS/src/config/Altiria'),
        ]);
    }
    /**
     * Register the application services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->bind('IrvinCode\smsAltiria\SMSAltiria');
    }
}