<?php

namespace App\Http\Controllers;

use App\Models\Productos;
use Illuminate\Http\Request;

class ProductosController extends Controller
{
    protected $productos;

    public function __construct(Productos $productos)
    {
        $this->productos = $productos;
    }

    public function consultar()
    {
        $productos = $this->productos->all();
        return response()->json($productos);
    }
}
