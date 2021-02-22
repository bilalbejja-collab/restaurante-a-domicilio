<?php

namespace App\Providers;

use App\Models\Pedido;
use Illuminate\Support\ServiceProvider;

use App\Models\Plato;
use App\Observers\PedidoObserver;
use App\Observers\PlatoObserver;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {

    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        // registrar el observer que hemos creado
    }
}
