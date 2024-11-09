<?php

namespace App\Http\Controllers;

use App\Models\Usuario;
use Illuminate\Http\Request;

class UsuarioController extends Controller
{
    public function verUser()
    {
        try {
            // Crear una instancia del modelo Usuario
            $usuarioModel = new Usuario();

            // Obtener todos los usuarios usando el modelo
            $usuarios = $usuarioModel->all();

            // Pasar los resultados a la vista
            return view('verUsuarios', ['usuarios' => $usuarios]);
        } catch (\Exception $e) {
            // Pasar el mensaje de error a la vista
            return view('verUsuarios', ['error' => 'Error de conexión: ' . $e->getMessage()]);
        }
    }
}
