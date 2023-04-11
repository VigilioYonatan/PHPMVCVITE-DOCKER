<?php
require_once __DIR__ . '/../vendor/autoload.php';


$dotenv = Dotenv\Dotenv::createImmutable(__DIR__);
$dotenv->safeLoad(); // para que no mande error si noexisten variables de entorno
require_once __DIR__ . '/config/helpers.php';
require_once __DIR__ . '/config/vite.php';
use App\Config\Database;
use App\Core\ActiveRecord;
use App\Core\Router;
use App\Controllers\WebController;

/*Instanciar conexion database*/

$cnx  = new Database();
$cnx->connect();
ActiveRecord::setDb($cnx->pdo);

$router = new Router();
/* Web */
$router->get('/', [WebController::class, 'home']);
// $router->post('/', [UsuarioController::class, 'home']);
// $router->get('/editar', [UsuarioController::class, 'editar']);
// $router->post('/editar', [UsuarioController::class, 'editar']);
/* Admin */
// $router->get('/admin', [AdminController::class, 'dashboardPage']);



/* Api */
$API = "/api";
// $router->post("${API}/auth/register", [UsuarioController::class, "onRegister"]);
// $router->get("${API}/productos", [UsuarioController::class, 'addUser']);

$router->comprobarRutas();