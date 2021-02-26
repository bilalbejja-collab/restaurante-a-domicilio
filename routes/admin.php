<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\Admin\HomeController;
use App\Http\Controllers\Admin\CategoriaController;
use App\Http\Controllers\Admin\PedidoController;
use App\Http\Controllers\Admin\RestauranteController;
use App\Http\Controllers\Admin\PlatoController;
use App\Http\Controllers\Admin\RepartidorController;
use App\Http\Controllers\Admin\UserController;
use App\Http\Controllers\TagController;
use App\Http\Controllers\PostController;

// Al panel de administración solo puede acceder: admin, repartidor o grestaurante
Route::get('', [HomeController::class, "index"])->middleware('can:admin.home')->name('admin.home');

Route::resource('users', UserController::class)->only('index', 'edit', 'update')->names('admin.users');

Route::resource('categorias', CategoriaController::class)->except('show')->names('admin.categorias');

Route::resource('restaurantes', RestauranteController::class)->except('show')->names('admin.restaurantes');

Route::resource('platos', PlatoController::class)->except('show')->names('admin.platos');

Route::resource('repartidores', RepartidorController::class)->except('show')->names('admin.repartidores');

Route::resource('pedidos', PedidoController::class)->except('show')->names('admin.pedidos');
