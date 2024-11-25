<?php

namespace App\Models;

use MongoDB\Client;

class Inventario_Proveedores
{
    protected $collection;

    public function __construct()
    {
        $client = new Client(env('DB_DSN'));
        $this->collection = $client->selectCollection(env('DB_DATABASE'), 'Inventario_Proveedores');
    }

    public function all()
    {
        // Ajustar los campos según el nombre exacto en la base de datos
        $projection = ['projection' => ['_id' => 1, 'id_Producto' => 1, 'Cantidad' => 1]];
        return iterator_to_array($this->collection->find([], $projection));
    }

    public function updateQuantity($idProducto, $nuevaCantidad)
    {
        // Actualizar la cantidad del inventario para el id_Producto dado
        $query = ['id_Producto' => $idProducto];
        $update = ['$set' => ['Cantidad' => $nuevaCantidad]];
        return $this->collection->updateOne($query, $update);
    }
}
