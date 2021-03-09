<?php

use App\Http\Controllers\Admin\PlatoController;
use App\Http\Controllers\Admin\RestauranteController;
use App\Http\Resources\CategoriaResource;
use App\Http\Resources\ClienteResource;
use App\Http\Resources\PedidoResource;
use App\Http\Resources\PlatoResource;
use App\Http\Resources\RestauranteResource;
use App\Models\Categoria;
use App\Models\Pedido;
use App\Models\Plato;
use App\Models\Restaurante;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
*/

// PREFIX GENERAL
Route::prefix('asocrest')->group(function () {

    // PREFIX RESTAURANTES
    Route::prefix('restaurantes')->group(function () {
        /**
         * GET /asocrest/restaurantes: todos los restaurantes
         */
        Route::get('/', function () {
            return RestauranteResource::collection(Restaurante::paginate(5));
        });

        /**
         * GET /asocrest/restaurantes/{id}: info de un restaurante y sus platos
         */
        Route::get('/{id}', function ($id) {
            return new RestauranteResource(Restaurante::findOrFail($id));
        });


        /**
         * PUT /asocrest/restaurantes: crea un restaurante
         */
        Route::put('/', [RestauranteController::class, 'apiStoreRestaurante']);


        /**
         * PUT /asocrest/restaurantes/{id}/categorias/{id}/plato: crea un plato
         */
        Route::put(
            '/{restaurante_id}/categorias/{categoria_id}/plato',
            [RestauranteController::class, 'apiStorePlato']
        );

        /**
         * DELETE /asocrest/restaurantes/{restaurante}: borra un restaurante y todos sus platos
         */
        Route::delete(
            '/{restaurante}',
            [RestauranteController::class, 'apiDeleteRestaurante']
        );

        /**
         * DELETE /asocrest/restaurantes/{id}/platos/{id}: borra un plato de un restaurante.
         */
        Route::delete(
            '/{restaurante_id}/platos/{plato_id}',
            [PlatoController::class, 'apiDeletePlato']
        );
    });

    // PREFIX PLATOS
    Route::prefix('platos')->group(function () {
        /**
         * GET /asocrest/platos/categoría/{id}: mostrar los platos de una categoría
         */
        Route::get('/categoria/{id}', function ($id) {
            return PlatoResource::collection(Plato::where('categoria_id', '=', $id)->get());
        });


        /**
         * GET /asocrest/platos/{id}: información de un plato en concreto
         */
        Route::get('/{id}', function ($id) {
            return new PlatoResource(Plato::findOrFail($id));
        });


        /**
         * GET /asocrest/platos: todos los platos
         */
        Route::get('/', function () {
            return PlatoResource::collection(Plato::paginate(5));
        });
    });

    // PREFIX CLIENETES
    Route::prefix('clientes')->group(function () {

        /**
         * GET /asocrest/clientes/{dni}: información de un cliente
         */
        Route::get('/clientes/{dni}', function ($dni) {
            return new ClienteResource(
                User::role('Cliente')->where('dni', '=', $dni)->firstOrFail()
            );
        });

        /**
         * GET /asocrest/clientes/{dni}/pedidos: todos sus pedidos
         */
        Route::get('/clientes/{dni}/pedidos', function ($dni) {
            $cliente = User::role('Cliente')->where('dni', '=', $dni)->firstOrFail();
            return PedidoResource::collection(Pedido::where('user_id', '=', $cliente->id)->paginate(5));
        });

        /**
         * GET /asocrest/clientes/{dni}/pedidos/{id}: información de un pedido
         */
        Route::get('/clientes/{dni}/pedidos/{id}', function ($dni, $id) {
            $cliente = User::where('dni', '=', $dni)->firstOrFail();
            return new PedidoResource(
                Pedido::where('user_id', '=', $cliente->id)
                    ->where('id', $id)
                    ->firstOrFail()
            );
        });
    });

    /**
     * GET /asocrest/categorías:todas las categorías de platos
     */
    Route::get('/categorias', function () {
        return CategoriaResource::collection(Categoria::paginate(5));
    });
});
