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
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

/*
GET /asocrest/restaurantes: todos los restaurantes
GET /asocrest/restaurantes/{id}: info de un restaurante y sus platos
GET /asocrest/platos/categoría/{id}: mostrar los platos de una categoría
GET /asocrest/platos/{id}: información de un plato en concreto
GET /asocrest/categorías:todas las categorías de platos
GET /asocrest/clientes/{dni}: información de un cliente
GET /asocrest/clientes/{dni}/pedidos: todos sus pedidos
GET /asocrest/clientes/{dni}/pedidos/{id}: información de un pedido
PUT /asocrest/restaurantes: crea un restaurante
PUT /asocrest/restaurantes/{id}/plato: crea un plato
DELETE /asocrest/restaurantes/{id}: borra un restaurante y todos sus platos
DELETE /asocrest/restaurantes/{id}/platos/{id}: borra un plato de un restaurante
*/

/**
 * GET /asocrest/restaurantes: todos los restaurantes
 */
Route::get('/restaurantes', function () {
    return RestauranteResource::collection(Restaurante::paginate(5));
});

/**
 * GET /asocrest/restaurantes/{id}: info de un restaurante y sus platos
 */
Route::get('/restaurantes/{id}', function ($id) {
    return new RestauranteResource(Restaurante::findOrFail($id));
});
#####################################################
/**
 * GET /asocrest/platos/categoría/{id}: mostrar los platos de una categoría
 */
// 1 forma
Route::get('/platos/categoria/{id}', function ($id) {
    return PlatoResource::collection(Plato::where('categoria_id', '=', $id)->get());
});

// 2 forma
Route::get('/categorias/{id}', function ($id) {
    return new CategoriaResource(Categoria::findOrFail($id));
});
#####################################################
/**
 * GET /asocrest/platos/{id}: información de un plato en concreto
 */
Route::get('/platos/{id}', function ($id) {
    return new PlatoResource(Plato::findOrFail($id));
});
#####################################################
/**
 * GET /asocrest/platos: todos los platos
 */
Route::get('/platos', function () {
    return PlatoResource::collection(Plato::paginate(5));
});
#####################################################
/**
 * GET /asocrest/categorías:todas las categorías de platos
 */
Route::get('/categorias', function () {
    return CategoriaResource::collection(Categoria::paginate(5));
});
#####################################################
/**
 * GET /asocrest/clientes/{dni}: información de un cliente
 */
Route::get('/clientes/{dni}', function ($dni) {
    return new ClienteResource(
        User::role('Cliente')->where('dni', '=', $dni)->firstOrFail()
    );
});
#####################################################
/**
 * GET /asocrest/clientes/{dni}/pedidos: todos sus pedidos
 */
Route::get('/clientes/{dni}/pedidos', function ($dni) {
    $cliente = User::role('Cliente')->where('dni', '=', $dni)->firstOrFail();
    return PedidoResource::collection(Pedido::where('user_id', '=', $cliente->id)->paginate(5));
});
#####################################################
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

Route::put('/restaurantes', [RestauranteController::class, 'apiStoreRestaurante']);
Route::put(
    '/restaurantes/{restaurante_id}/categorias/{categoria_id}/plato',
    function (
        $restaurante_id,
        $categoria_id
    ) {
        return $restaurante_id . " " . $categoria_id;
    }
);

//Route::middleware('auth:sanctum')->delete('/restaurante/delete/{restaurante}', [RestauranteController::class, 'apiDelete']);

/*
Route::prefix('asocrest')->group(function () {
    Route::apiResource('platos', PlatoController::class);

    Route::get('/restaurantes', function () {
        return Restaurante::all();
    });

    Route::get('/restaurantes/{id}', function ($id) {
        return ['restaurante' => Restaurante::where('id', $id)->get(), 'sus platos' => Plato::where('restaurante_id', $id)->get()];
    });

    Route::get('/platos/{id}', function ($id) {
        return ['plato' => Plato::where('id', $id)->get()];
    });

    Route::get('/platos/categroria/{id}', function ($id) {
        return ['platos' => Plato::where('categoria_id', $id)->get()];
    });

    Route::get('/categorias', function () {
        return Categoria::all();
    });
});
*/
