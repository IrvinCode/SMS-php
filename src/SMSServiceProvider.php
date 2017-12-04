<?php

namespace IrvinCode\SMS;

use Illuminate\Support\ServiceProvider;

class SMSServiceProvider extends ServiceProvider
{
    /**
     * Indicates if loading of the provider is deferred.
     *
     * @var bool
     */
    protected $defer = false;

    /**
     * Bootstrap the application services.
     *
     * @return void
     */
    public function boot()
    {
        $this->publishes([
            __DIR__ . '/config/config.php' => config_path('config.php'),
        ]);
    }
    /**
     * Register the application services.
     *
     * @return void
     */
    public function register()
    {
    }
}