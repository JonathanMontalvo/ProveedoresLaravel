<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PedidoController;
use App\Http\Controllers\UsuarioController;

Route::get('/proveedores', function () {
    return view('principal');
});

Route::get('/proovedores/pedidos/agregar', [PedidoController::class, 'agregar']);
Route::get('/proveedores/usuarios', [UsuarioController::class, 'verUser']);

Route::get('/proovedores/pedidos/consultar', function () {
    return view('consultarPedidos');
});
