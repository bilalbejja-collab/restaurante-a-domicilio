<?php

use App\Http\Controllers\PlatoController;
use App\Http\Controllers\Admin\UserController;
use App\Http\Controllers\CarroController;
use Illuminate\Support\Facades\Route;



Route::post('/carro-add', [CarroController::class, 'add'])->name('carro.add');
Route::get('/ver-carro', [CarroController::class, 'verCarro'])->name('carro.ver');
Route::post('/limpiar-carro', [CarroController::class, 'limpiarCarro'])->name('carro.limpiar');
Route::post('/borrar-plato', [CarroController::class, 'borrarItem'])->name('carro.borrar');
Route::post('/carro-comprar', [CarroController::class, 'comprarPlatos'])->name('carro.comprar');

Route::middleware(['auth:sanctum', 'verified'])->get('/', [PlatoController::class, 'index'])->name('platos.index');

Route::get('platos/{plato}', [PlatoController::class, 'show'])->name('platos.show');
Route::get('categoria/{categoria}/restaurante/{restaurante}', [PlatoController::class, 'categoria'])->name('platos.categoria');
Route::get('restaurante/{restaurante}', [PlatoController::class, 'restaurante'])->name('platos.restaurante');

Route::resource('users', UserController::class)->only(['index','edit','update'])->names('admin.users');
