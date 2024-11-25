<?php

namespace App\Http\Controllers;

use App\Models\Inventario_Proveedores;
use App\Models\Historial_Venta;
use App\Models\Productos;
use Illuminate\Http\Request;
use Exception;
use GuzzleHttp\Client;
use Log;
use DateTime;
use DateTimeZone;

class CompraController extends Controller
{
    protected $inventario;
    protected $ventas;
    protected $productos;

    public function __construct(Inventario_Proveedores $inventario, Historial_Venta $ventas, Productos $productos)
    {
        $this->inventario = $inventario;
        $this->ventas = $ventas;
        $this->productos = $productos;
    }

    public function registrar(Request $request)
    {
        try {
            // Obtener el JSON recibido
            $data = $request->json()->all();
            $inventario = $this->inventario->all();

            $ventasData = [];
            $updatesData = [];
            $totalGeneral = 0;

            foreach ($data as $item) {
                $idProducto = $item['id_Producto']['$oid'];
                $productosComprados = $item['productos_Comprados'];
                $fechaCompra = $item['fecha_Compra']['$date'];

                // Verificar si el producto existe en el inventario
                $productoEncontrado = false;
                foreach ($inventario as $inventarioItem) {
                    $itemIdProducto = (string) $inventarioItem['id_Producto'];
                    if ($itemIdProducto === $idProducto) {
                        $productoEncontrado = true;
                        $cantidadInventario = (float) $inventarioItem['cantidad'];
                        break;
                    }
                }

                if (!$productoEncontrado) {
                    return response()->json([
                        'resultado' => 0,
                        'mensaje' => 'Producto no encontrado'
                    ]);
                }

                // Verificar si la cantidad es suficiente
                if ($productosComprados > $cantidadInventario) {
                    return response()->json([
                        'resultado' => 0,
                        'mensaje' => 'Compra no realizada, excedió el abastecimiento'
                    ]);
                }

                // Obtener el precio del producto
                $producto = $this->productos->find($idProducto);
                if (!$producto) {
                    return response()->json([
                        'resultado' => 0,
                        'mensaje' => 'Producto no encontrado en la base de datos de productos'
                    ]);
                }
                $precio = $producto['precio'];

                // Calcular el total
                $total = $productosComprados * $precio;
                $totalGeneral += $total;

                // Agregar el producto vendido a la lista
                $ventasData[] = [
                    'id_Producto' => $producto['_id'],
                    'cantidad' => $productosComprados,
                    'total' => $total
                ];

                // Preparar la actualización del inventario
                $nuevaCantidadInventario = $cantidadInventario - $productosComprados;
                $updatesData[] = [
                    'id_Producto' => $producto['_id'],
                    'nuevaCantidad' => $nuevaCantidadInventario
                ];
            }

            // Obtener la fecha actual en el formato adecuado
            $fechaC = (new DateTime('now', new DateTimeZone('America/Mexico_City')))->format('Y-m-d\TH:i:s.vP');
            // Crear el registro de la venta unificada
            $ventaDataUnificada = [
                'productos_Vendidos' => $ventasData,
                'status_Pago' => 1, // 1 = reazlizado 2 = cancelada
                'fecha_Venta' => $fechaC,
                'total' => $totalGeneral
            ];

            // Realizar la inserción de la venta y obtener el ID
            $idCompra = $this->ventas->insert($ventaDataUnificada);

            // Realizar las actualizaciones del inventario
            foreach ($updatesData as $update) {
                $this->inventario->updateQuantity($update['id_Producto'], $update['nuevaCantidad']);
            }

            // Enviar una petición POST adicional
            //try {
            //    $client = new Client();
            //    $response = $client->post('http://localhost:8080/proveedores/productos/logistica/compra', [
            //        'json' => [
            //            'id_compra' => (string) $idCompra,
            //            'mensaje' => 'Compra realizada exitosamente'
            //        ]
            //    ]);
            //} catch (Exception $e) {
            //    // Loguear el error y continuar
            //    Log::error('Error en la petición POST adicional: ' . $e->getMessage());
            //}

            // Devolver la respuesta de éxito
            return response()->json([
                'resultado' => 1,
                'mensaje' => 'Compra realizada exitosamente',
                'id_compra' => $idCompra
            ]);

        } catch (Exception $e) {
            // Capturar cualquier error inesperado y devolver una respuesta de error
            return response()->json([
                'resultado' => 0,
                'mensaje' => 'Error en el servidor: ' . $e->getMessage()
            ], 500);
        }
    }

    public function consultarInventario()
    {
        // Obtener todo el inventario
        $inventario = $this->inventario->all();

        // Devolver el inventario en formato JSON
        return response()->json($inventario);
    }
}
