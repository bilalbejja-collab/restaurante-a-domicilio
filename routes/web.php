<?php

use App\Http\Controllers\PlatoController;
use App\Http\Controllers\Admin\UserController;
use App\Http\Controllers\CarroController;
use App\Http\Controllers\PedidoController;
use Illuminate\Support\Facades\Route;

// Ruta para ver platos en la página principal
Route::middleware(['auth:sanctum', 'verified'])->get('/', [PlatoController::class, 'index'])->name('platos.index');

// Rutas para
// mostrar plato
Route::get('platos/{plato}', [PlatoController::class, 'show'])->name('platos.show');
// mostrar platos por categoria y restaurante
Route::get('categoria/{categoria}/restaurante/{restaurante}', [PlatoController::class, 'categoria'])->name('platos.categoria');
// mostrar platos de un determinado restaurante
Route::get('restaurante/{restaurante}', [PlatoController::class, 'restaurante'])->name('platos.restaurante');

// Rutas para el carrito
Route::post('carro-add', [CarroController::class, 'add'])->name('carro.add');
Route::get('ver-carro', [CarroController::class, 'verCarro'])->name('carro.ver');
Route::post('limpiar-carro', [CarroController::class, 'limpiarCarro'])->name('carro.limpiar');
Route::post('borrar-plato', [CarroController::class, 'borrarItem'])->name('carro.borrar');
Route::post('carro-comprar', [CarroController::class, 'comprarPlatos'])->name('carro.comprar');

// Rutas para pedido del cliente autenticado
Route::get('pedidos', [PedidoController::class, 'verPedidos'])->name('pedidos.index');
Route::post('pedidos/borrar', [PedidoController::class, 'borrarPedido'])->name('pedidos.borrar');

Route::get('/send-email', [CarroController::class , 'enviarEmail']);
