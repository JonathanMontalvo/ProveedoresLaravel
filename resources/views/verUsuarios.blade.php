<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ver Usuarios</title>
    <!-- Si usas Bootstrap, puedes incluirlo aquí -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>

<body>
    <div class="container mt-5">
        <h1>Listado de Usuarios</h1>

        @if(isset($error))
            <div class="alert alert-danger">
                {{ $error }}
            </div>
        @elseif(count($usuarios) == 0)
            <div class="alert alert-warning">
                No hay usuarios disponibles.
            </div>
        @else
            <!-- Tabla de usuarios -->
            <table class="table table-bordered">
                <thead>
                    <tr>
                        <th>Nombre</th>
                        <th>Apellido Paterno</th>
                        <th>Apellido Materno</th>
                        <th>Correo</th>
                        <th>Teléfono</th>
                        <th>Rol</th>
                        <th>Status</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($usuarios as $usuario)
                        <tr>
                            <td>{{ $usuario['nombre'] }}</td>
                            <td>{{ $usuario['apellidoPaterno'] }}</td>
                            <td>{{ $usuario['apellidoMaterno'] }}</td>
                            <td>{{ $usuario['correo'] }}</td>
                            <td>{{ $usuario['telefono'] }}</td>
                            <td>{{ $usuario['rol'] }}</td>
                            <td>{{ $usuario['status'] == 1 ? 'Activo' : 'Inactivo' }}</td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        @endif
    </div>

    <!-- Incluye los scripts de Bootstrap -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>