<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProductosController;
use App\Http\Controllers\CompraController;

Route::get('/proveedores', function () {
    return view('principal');
});

Route::get('/proveedores/venta', [ProductosController::class, 'consultar']);

Route::post('/proveedores/compra', [CompraController::class, 'registrar']);


Route::get('/proveedores/inventario', [CompraController::class, 'consultarInventario']);
