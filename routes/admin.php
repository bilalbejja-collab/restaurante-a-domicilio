<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\CategoriaController;
use App\Http\Controllers\Admin\HomeController;
use App\Http\Controllers\TagController;
use App\Http\Controllers\PostController;

//Route::get('', [HomeController::class, "index"])->name('admin.home');
//Route::resource('categorias', CategoriaController::class)->names('admin.categorias');

Route::get('', [HomeController::class, 'index']);
