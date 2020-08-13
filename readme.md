# PROYECTO SIGEPE

_Acá va un párrafo que describe lo que es el proyecto_

## Comenzando 🚀

_Estas instrucciones te permitirán obtener una copia del proyecto en funcionamiento en tu máquina local para propósitos de desarrollo y pruebas._


### Pre-requisitos 📋

https://laragon.org/download/

https://git-scm.com/downloads

### Instalación 🔧

_1. Abrir Laragon e ingresar a 'Terminal'_

_2. En el terminal ejecutar el siguiente comando para descargar el repositorio_
```
git clone https://github.com/navichicken/sigepe
```
_3. Ejecutar el siguiente comando para ingresar a la carpeta_
```
cd sigepe-master
```
_4. Ejecutar el siguiente comando para instalar todas las dependencias_
```
composer install
```
_5. Este paso puedes hacerlo mientras se instalan las dependencias. Dirigite a Laragon y haz click 'Iniciar Todo', esto iniciará el servidor de Apache y mysql, ahora haces click en "Base de datos", en la interface colocas abrir y te abrirá una GUI, en esta GUI haces anticlick en laragon(la parte izquierda), luego 'Crear Nuevo' y 'base de datos', y creas la base de datos 'sigepe_db'._

_6. Ejecutas el siguiente comando para crear una copia del archivo de entorno de variable_
```
cp .env.example .env
```
_7. Ahora que tienes el archivo .env creado. Abre el archivo con un IDE y en este archivo debes poner las credenciales de la conexión a la base de datos._
```
DB_DATABASE=sigepe_db
DB_USERNAME=root
DB_PASSWORD=
```
_8. Ejecutar el siguiente comando, este comando creará las tablas en la base de datos(migrate) e insertará datos iniciales a las tablas(seed)._
```
php artisan migrate:fresh --seed
```
Nota:
Si te aparece un error sobre una clase que existe y no la encuentra. Puedes ejecutar el siguiente comando, que actualiza la información del class loader.
```
composer dump-autoload
```
_9. Ejecutar el siguiente comando, que creará una key en el archivo .env_
```
php artisan key:generate
```
_10. Listo ya configuraste lo necesario. Ahora en tu navegador dirigite a http://localhost/sigepe/public ._
```
User: sigespro@gmail.com
```
```
Contraseña: 123456
```
## Posibles errores que ocurran durante la instalación y configuración 🤬🤬
Si estás una versión reciente de Mysql, puede que ocurra un error en el paso de las migraciones, para solucionarlo puedes ejecutar el siguiente comando SQL, desde tu usario root.
```
CREATE USER 'sigepe_user'@'localhost' IDENTIFIED WITH mysql_native_password BY 'sigepe_pass';
GRANT ALL PRIVILEGES ON sigepe_db.* TO 'sigepe_user'@'localhost';
```
Donde _DB_USERNAME=sigepe_user_, _DB_PASSWORD=sigepe_pass_ y _DB_DATABASE=_sigepe_db_




## Construido con 🛠️

_Menciona las herramientas que utilizaste para crear tu proyecto_

* [Laravel](https://laravel.com/docs/5.6) - El framework web usado
* [Composer](https://getcomposer.org/) - Manejador de dependencias




<p align="center"><img src="https://laravel.com/assets/img/components/logo-laravel.svg"></p>

<p align="center">
<a href="https://travis-ci.org/laravel/framework"><img src="https://travis-ci.org/laravel/framework.svg" alt="Build Status"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://poser.pugx.org/laravel/framework/d/total.svg" alt="Total Downloads"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://poser.pugx.org/laravel/framework/v/stable.svg" alt="Latest Stable Version"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://poser.pugx.org/laravel/framework/license.svg" alt="License"></a>
</p>

## About Laravel

Laravel is a web application framework with expressive, elegant syntax. We believe development must be an enjoyable and creative experience to be truly fulfilling. Laravel takes the pain out of development by easing common tasks used in many web projects, such as:

- [Simple, fast routing engine](https://laravel.com/docs/routing).
- [Powerful dependency injection container](https://laravel.com/docs/container).
- Multiple back-ends for [session](https://laravel.com/docs/session) and [cache](https://laravel.com/docs/cache) storage.
- Expressive, intuitive [database ORM](https://laravel.com/docs/eloquent).
- Database agnostic [schema migrations](https://laravel.com/docs/migrations).
- [Robust background job processing](https://laravel.com/docs/queues).
- [Real-time event broadcasting](https://laravel.com/docs/broadcasting).

Laravel is accessible, powerful, and provides tools required for large, robust applications.

## Learning Laravel

Laravel has the most extensive and thorough [documentation](https://laravel.com/docs) and video tutorial library of all modern web application frameworks, making it a breeze to get started with the framework.

If you don't feel like reading, [Laracasts](https://laracasts.com) can help. Laracasts contains over 1400 video tutorials on a range of topics including Laravel, modern PHP, unit testing, and JavaScript. Boost your skills by digging into our comprehensive video library.

## License

The Laravel framework is open-source software licensed under the [MIT license](https://opensource.org/licenses/MIT).
