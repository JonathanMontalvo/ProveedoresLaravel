<?php

namespace App\Models;

use MongoDB\Client;

class Historial_Venta
{
    protected $collection;

    public function __construct()
    {
        $client = new Client(env('DB_DSN'));
        $this->collection = $client->selectCollection(env('DB_DATABASE'), 'Historial_Venta');
    }

    public function insert($data)
    {
        $result = $this->collection->insertOne($data);
        return $result->getInsertedId();
    }
}
