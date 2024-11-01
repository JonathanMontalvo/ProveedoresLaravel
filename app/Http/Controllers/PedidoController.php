<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PedidoController extends Controller
{
    public function agregar()
    {
        // Leer el archivo JSON desde la carpeta public
        $json = file_get_contents(public_path('assets/data/productos.json'));
        // Decodificar el JSON a un array de PHP
        $products = json_decode($json, true);

        // Añadir la clave 'img' a cada producto
        foreach ($products as &$product) {
            $nombre = str_replace(' ', '', strtolower($product['nombre']));
            $marca = str_replace(' ', '', strtolower($product['marca']));
            $product['img'] = $nombre . $marca . '.png';
        }

        // Pasar los datos a la vista
        return view('agregarPedidos', ['products' => $products]);
    }
}
