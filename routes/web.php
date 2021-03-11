<?php

use App\Http\Controllers\Controller;
use App\Http\Controllers\PlatoController;
use App\Http\Controllers\CarroController;
use App\Http\Controllers\PedidoController;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Storage;

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

// Ruta acerca de nosotros
Route::get('acerca-de-nosotros', [Controller::class, 'acercaDeNosotros'])->name('acerca-de-nosotros');

// Ruta para probar subir imagen a Amazon
Route::get('/imagenes', function () {
    $path = public_path('storage/platos');
    $files = File::allFiles($path);
    //$contents = Storage::get(public_path('storage/' . $plato->foto->url));

    foreach ($files as $file) {
        Storage::disk('s3')->put('platos/', $file);
    }

    //Storage::disk('s3')->put('platos/', fopen('storage/platos', 'r+'));

    return view('fileUpload');
});

Route::post('upload', function () {
    dd(request()->file('file')->store(
        'my_file',
        's3'
    ));
})->name('upload');
