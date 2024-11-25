<?php

namespace App\Models;

use MongoDB\Client;
use DateTime;
use DateTimeZone;

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
        $projection = ['projection' => ['_id' => 1, 'id_Producto' => 1, 'cantidad' => 1]];
        return iterator_to_array($this->collection->find([], $projection));
    }

    public function updateQuantity($idProducto, $nuevaCantidad)
    {
        // Obtener la fecha actual en el formato adecuado
        $fechaActualizacion = (new DateTime('now', new DateTimeZone('America/Mexico_City')))->format('Y-m-d\TH:i:s.vP');

        // Actualizar la cantidad del inventario y la fecha de actualización para el id_Producto dado
        $query = ['id_Producto' => $idProducto];
        $update = [
            '$set' => [
                'cantidad' => $nuevaCantidad,
                'fecha_Actualizacion' => $fechaActualizacion
            ]
        ];
        return $this->collection->updateOne($query, $update);
    }
}
