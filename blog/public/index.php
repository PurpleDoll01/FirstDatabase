<?php

/*Se comienza haciendo todo sin librerías, luego se aplica el router
y composer, htaccess para que las url sean mas bonitas, luego se aplica twig que tiene que ver con el render del
router. Se agrega filtro para las url desde base controller para poder poner src y linkear
Hacemos un layout con todo el código que se repite. Los modelos los hacemos con Eloquent, bases de datos
Modelo es la interacción con la base de datos. Configuramos el env para las variables de entorno,
Validamos desde el backend con sirius, esto se hace en los post. Recordar que los errores se muestran desde el validador
y se pueden añadir más
*/

ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

require_once '../vendor/autoload.php'; // Con hacer esto ya podemos usar phroute en todos los archivos

session_start();

$baseDir = str_replace(basename($_SERVER['SCRIPT_NAME']), '', $_SERVER['SCRIPT_NAME']);
$baseUrl = 'http://' . $_SERVER['HTTP_HOST'] . $baseDir;
define('BASE_URL', $baseUrl); // Aca estamos definiendo una constante

$dotenv = new \Dotenv\Dotenv(__DIR__ . '/..');
$dotenv->load();

use Illuminate\Database\Capsule\Manager as Capsule;

$capsule = new Capsule;
$capsule->addConnection([
    'driver'    => 'mysql',
    'host'      => getenv('DB_HOST'),
    'database'  => getenv('DB_NAME'),
    'username'  => getenv('DB_USER'),
    'password'  => getenv('DB_PASS'),
    'charset'   => 'utf8',
    'collation' => 'utf8_unicode_ci',
    'prefix'    => '',
]);

$capsule->setAsGlobal();
$capsule->bootEloquent();

$route = $_GET['route'] ?? '/';

use Phroute\Phroute\RouteCollector;

$router = new RouteCollector();

$router->filter('auth', function () {
    if (!isset($_SESSION['userID'])) {
       header('Location: ' . BASE_URL . 'auth/login');
       return false;
    }
});


$router->group(['before' => 'auth'], function ($router) {

    $router->controller('/admin', App\Controllers\Admin\IndexController::class);
    $router->controller('/admin/posts', App\Controllers\Admin\PostController::class);
    $router->controller('/admin/users', App\Controllers\Admin\userController::class);
});
$router->controller('/', App\Controllers\IndexController::class);
$router->controller('/auth', App\Controllers\AuthController::class);

$dispatcher = new Phroute\Phroute\Dispatcher($router->getData());
$response = $dispatcher->dispatch($_SERVER['REQUEST_METHOD'], $route);

echo $response;



