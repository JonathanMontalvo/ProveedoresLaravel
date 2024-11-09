<?php

namespace App\Models;

use MongoDB\Client;

class Usuario
{
    protected $collection;

    public function __construct()
    {
        $client = new Client(env('DB_DSN'));
        $this->collection = $client->selectCollection(env('DB_DATABASE'), 'Usuarios');
    }

    public function all()
    {
        return iterator_to_array($this->collection->find());
    }
}
