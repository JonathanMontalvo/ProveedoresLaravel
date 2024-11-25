<?php

namespace App\Models;

use MongoDB\Client;

class Productos
{
    protected $collection;

    public function __construct()
    {
        $client = new Client(env('DB_DSN'));
        $this->collection = $client->selectCollection(env('DB_DATABASE'), 'Productos');
    }

    public function all()
    {
        // Obtener solo los productos con status 1
        $query = ['status' => 1];
        return iterator_to_array($this->collection->find($query));
    }

    public function find($idProducto)
    {
        // Buscar un producto por su id como cadena
        $query = ['_id' => new \MongoDB\BSON\ObjectId($idProducto)];
        return $this->collection->findOne($query);
    }
}
