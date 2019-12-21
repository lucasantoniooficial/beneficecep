<?php

namespace BeneficeCep;

use Illuminate\Support\ServiceProvider;

class CepServiceprovider extends ServiceProvider
{
    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {
        include __DIR__ . '/LibCep.php';
    }
}
