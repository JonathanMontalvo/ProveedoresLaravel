# ProveedoresLaravel

#################################################################################################################################

# Dependencia necesarias para trabajar con mongo, utilizar es que es compatible en version estable con su php

Descargamos el dll de mongo: https://pecl.php.net/package/mongodb/1.20.0/windows

# En prubas locales usamos xampp (Pero añadirlo para su respetivo servidor)

vamos a C:\xampp\php\ext y pegamos el dll descargado (php_mongodb.dll)

# Posteriormen se modifica el archivo php.ini para añadir la extension de mongo extension=mongodb

Abrimos el archivo php.ini que se encuentra en la carpeta C:\xampp\php y agregamos extension=mongodb

# Reiniciamos el servidor apache y probamos php -m para ver que salga mongo en el listado de extensiones

php -m

# Instalamos el paquete de mongo para manejarlo en laravel: composer require mongodb/laravel-mongodb

composer require mongodb/laravel-mongodb

# Instalar las dependencias

# Navegar a al directorio Middleware

Navegar a \vendor\laravel\framework\src\Illuminate\Foundation\Http\Middleware

# Abrir el archivo

VerifyCsrfToken.php

# Buscar protected $except y editarlo de la siguiente manera

    protected $except = [
        '/proveedores/compra',
    ];

# Iniciar el proyecto y hacer pruebas con postman

php artisan serve

# Peticion post a http://127.0.0.1:8000/proveedores/compra

# Json ejemplo

[
{
"id_Producto": {"$oid": "6745254721ea143547381726"},
"fecha_Compra": {"$date": "2024-11-25T19:34:28.333-06:00"},
"productos_Comprados": 100
}
]

##################################################################################################################################
