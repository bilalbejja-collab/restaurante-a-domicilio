<?php

namespace App\Providers;

use App\Models\Pedido;
use App\Models\Plato;
use App\Observers\PedidoObserver;
use App\Observers\PlatoObserver;
use Illuminate\Auth\Events\Registered;
use Illuminate\Auth\Listeners\SendEmailVerificationNotification;
use Illuminate\Foundation\Support\Providers\EventServiceProvider as ServiceProvider;
use Illuminate\Support\Facades\Event;

class EventServiceProvider extends ServiceProvider
{
    /**
     * The event listener mappings for the application.
     *
     * @var array
     */
    protected $listen = [
        Registered::class => [
            SendEmailVerificationNotification::class,
        ],
    ];

    /**
     * Register any events for your application.
     *
     * @return void
     */
    public function boot()
    {
        // cuando se crea un pedido se le asigna el id del usuario autenticado
        Pedido::observe(PedidoObserver::class);



        // cuando se borra un plato me borra la imagen asociada a ese
        Plato::observe(PlatoObserver::class);
    }
}
