<?php

use Illuminate\Support\Facades\Route;

Route::get('/proveedores', function () {
    return view('principal');
});

Route::get('/proovedores/pedidos/agregar', function () {
    return view('agregarPedidos');
});

Route::get('/proovedores/pedidos/consultar', function () {
    return view('consultarPedidos');
});
