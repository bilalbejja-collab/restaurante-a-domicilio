<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\Admin\HomeController;
use App\Http\Controllers\Admin\CategoriaController;
use App\Http\Controllers\Admin\RestauranteController;
use App\Http\Controllers\Admin\PlatoController;
use App\Http\Controllers\TagController;
use App\Http\Controllers\PostController;

Route::get('', [HomeController::class, "index"])->name('admin.home');

Route::resource('categorias', CategoriaController::class)->except('show')->names('admin.categorias');

Route::resource('restaurantes', RestauranteController::class)->names('admin.restaurantes');

Route::resource('platos', PlatoController::class)->names('admin.platos');

