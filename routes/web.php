<?php

use App\Http\Controllers\Admin\HomeController;
use App\Http\Controllers\PlatoController;
use App\Http\Controllers\CategoriaController;
use App\Http\Controllers\ClienteController;
use App\Http\Controllers\Admin\UserController;
use Illuminate\Support\Facades\Route;

Route::get('/', [PlatoController::class, 'index'])->name('platos.index');

Route::get('platos/{plato}', [PlatoController::class, 'show'])->name('platos.show');

Route::get('categoria/{categoria}', [PlatoController::class, 'categoria'])->name('platos.categoria');


/*
Route::get('', [HomeController::class, 'index'])->name('admin.home');

Route::resource('users', UserController::class)->only(['index','edit','update'])->names('admin.users');
Route::resource('categories', CategoryController::class)->names('admin.categories');
Route::resource('tags', TagController::class)->names('admin.tags');
Route::resource('posts', PostController::class)->names('admin.posts');

*/
Route::get('/dashboard', function () {
    return view('dashboard');
})->name('dashboard');



/*
Route::middleware(['auth:sanctum', 'verified'])->get('/dashboard', function () {
    return view('dashboard');
})->name('dashboard');

Route::middleware(['auth:sanctum', 'verified'])->get('/blog', function () {
    return view('blog');
})->name('blog');


//Clientes
Route::get('/clientes/{id}/delete', [ClienteController::class, "destroy"]);
Route::middleware(['auth:sanctum', 'verified'])->get('/clientes/index', [ClienteController::class, "index"])->name('clientes');
Route::resource('/clientes', ClienteController::class);

//Categorias
Route::get('/categorias/{id}/delete', [CategoriaController::class, "destroy"]);
Route::middleware(['auth:sanctum', 'verified'])->get('/categorias/index', [CategoriaController::class, "index"])->name('categorias');
Route::resource('/categorias', CategoriaController::class)->names('admin.categorias');;


Route::middleware(['auth:sanctum', 'verified'])->get('/dashboard', function () {
    return view('dashboard');
})->name('dashboard');

*/

/*
Route::prefix('intranet')->middleware('auth')->group(function () {
    Route::get('/dashboard', function () {
        return view('dashboard');
    });

    Route::group(['middleware' => 'role:grestaurante', 'prefix' => 'grestaurante', 'as' => 'grestaurante.'], function () {
        Route::get('/', function () {
            return view('intranet.restaurantes');
        });
    });

    Route::group(['middleware' => 'role:cliente', 'prefix' => 'cliente', 'as' => 'cliente.'], function () {
        Route::get('/', function () {
            return view('intranet.clientes');
        });
    });

    Route::group(['middleware' => 'role:repartidor', 'prefix' => 'repartidor', 'as' => 'repartidor.'], function () {
        Route::get('/', function () {
            return view('intranet.repartidores');
        });
    });
});

//Rutas web principal
Route::prefix('/fooding')->middleware('auth')->group(function () {
    Route::get('/', function () {
        return view('fooding');
    });

    //ruta hacer pedidos
});
*/
