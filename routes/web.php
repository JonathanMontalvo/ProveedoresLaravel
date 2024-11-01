<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PedidoController;

Route::get('/proveedores', function () {
    return view('principal');
});

Route::get('/proovedores/pedidos/agregar', [PedidoController::class, 'agregar']);

Route::get('/proovedores/pedidos/consultar', function () {
    return view('consultarPedidos');
});
