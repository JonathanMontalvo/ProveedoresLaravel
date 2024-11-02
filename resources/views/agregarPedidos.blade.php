<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Agregar Pedido</title>
    <!-- Enlace a Bootstrap CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <!-- Enlace a tus estilos personalizados -->
    <link rel="stylesheet" href="{{ asset('assets/css/styleCarrito.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/styleCards.css') }}">
</head>

<body>
    @include('components.carrito')
    <div class="container mt-3">
        <h1 class="mb-3">Agregar Pedido</h1>
        <div class="row">
            @foreach ($products as $product)
                <div class="col-md-4 mb-4">
                    <div class="card">
                        <img src="{{ asset('assets/img/' . $product['img']) }}" class="card-img-top"
                            alt="{{ $product['nombre'] }}">
                        <div class="card-body">
                            <h5 class="card-title"><strong>{{ $product['nombre'] }}</strong></h5>
                            <p class="card-text">{{ $product['descripcion'] }}</p>
                            <p class="card-text"><strong>Precio:</strong> ${{ $product['precio'] }}</p>
                            <p class="card-text"><strong>Dimensiones:</strong> {{ $product['dimensiones'] }}</p>
                            <p class="card-text"><strong>Capacidad:</strong> {{ $product['capacidad'] }} kg</p>
                            <p class="card-text"><strong>Marca:</strong> {{ $product['marca'] }}</p>
                            <button class="btn btn-primary add-to-cart" data-id="{{ $product['id'] }}"
                                id="product-{{ $product['id'] }}">Agregar al Carrito</button>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>

    <!-- Enlace a jQuery y Bootstrap JS -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    <!-- Enlace a tu archivo JavaScript personalizado -->
    <script src="{{ asset('assets/js/carrito.js') }}"></script>
</body>

</html>