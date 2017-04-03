<?php

namespace AngeloBiscola\Gerencianet\Providers;

use Illuminate\Support\ServiceProvider;
use AngeloBiscola\Gerencianet\Gerencianet;

class GerencianetServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap the application services.
     *
     * @param MobileDetect $mobileDetect
     */
    public function boot()
    {
        $this->publishes([__DIR__ . '/../../../resources/config/gerencianet.php' => config_path('gerencianet.php')]);
    }

    /**
     * Register the application services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->bind('AngeloBiscola\Gerencianet\Gerencianet', function () {
            return new Gerencianet([
                'client_id' => config('gerencianet.client_id'),
                'client_secret' => config('gerencianet.client_secret'),
                'sandbox' => config('gerencianet.sandbox')
            ]);
        });
    }
}
