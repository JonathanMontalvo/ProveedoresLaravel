<header>
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
        <a class="navbar-brand" href="{{ url('/proveedores/') }}">
            <img src="{{ asset('assets/img/carro.webp') }}" alt="Logo">
            Paquetería
        </a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavDropdown"
            aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNavDropdown">
            <ul class="navbar-nav ml-auto">
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" id="productosDropdown" role="button"
                        data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        Gestión de Productos
                    </a>
                    <div class="dropdown-menu" aria-labelledby="productosDropdown">
                        <a class="dropdown-item" href="{{ url('/proovedores/productos/agregar') }}">Agregar
                            Productos</a>
                        <a class="dropdown-item" href="{{ url('/proovedores/productos/consultar') }}">Consultar
                            Productos</a>
                    </div>
                </li>
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" id="vehiculosDropdown" role="button"
                        data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        Gestión de Vehículos
                    </a>
                    <div class="dropdown-menu" aria-labelledby="vehiculosDropdown">
                        <a class="dropdown-item" href="{{ url('/proovedores/proovedores/vehiculos/agregar') }}">Agregar
                            Vehículo</a>
                        <a class="dropdown-item" href="{{ url('/proovedores/vehiculos/consultar') }}">Consultar
                            Vehículo</a>
                    </div>
                </li>
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" id="pedidosDropdown" role="button"
                        data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        Gestión de Pedidos
                    </a>
                    <div class="dropdown-menu" aria-labelledby="pedidosDropdown">
                        <a class="dropdown-item" href="{{ url('/proovedores/pedidos/agregar') }}">Agregar Pedido</a>
                        <a class="dropdown-item" href="{{ url('/proovedores/pedidos/consultar') }}">Consultar Pedido</a>
                    </div>
                </li>
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" id="logisticaDropdown" role="button"
                        data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        Gestión Logística
                    </a>
                    <div class="dropdown-menu" aria-labelledby="logisticaDropdown">
                        <a class="dropdown-item" href="{{ url('/proovedores/logistica/gestionLogistica') }}">Gestión</a>
                    </div>
                </li>
                <!-- Nuevo botón Mi Cuenta -->
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" id="cuentaDropdown" role="button"
                        data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        Mi Cuenta
                    </a>
                    <div class="dropdown-menu" aria-labelledby="cuentaDropdown">
                        <a class="dropdown-item" href="{{ url('/proovedores/cuenta') }}">Editar Datos</a>
                        <a class="dropdown-item" href="{{ url('/proovedores/cuenta') }}">Cerrar sesión</a>
                    </div>
                </li>
                <!-- Nuevo botón Carrito -->
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" id="carritoDropdown" role="button"
                        data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        <img src="{{ asset('assets/img/carrito.png') }}" alt="Carrito"
                            style="width: 30px; height: 30px;">
                    </a>
                    <div class="dropdown-menu dropdown-menu-right p-3" aria-labelledby="carritoDropdown"
                        style="min-width: 500px;">
                        <div class="table-responsive">
                            <table class="table table-sm">
                                <thead>
                                    <tr>
                                        <th>Imagen</th>
                                        <th>Nombre</th>
                                        <th>Precio</th>
                                        <th>Marca</th>
                                        <th>Cantidad</th>
                                        <th></th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <!-- Aquí irán los elementos del carrito -->
                                </tbody>
                            </table>
                        </div>
                        <a href="#" class="btn btn-danger btn-sm btn-block">Vaciar Carrito</a>
                    </div>
                </li>
            </ul>
        </div>
    </nav>
</header>