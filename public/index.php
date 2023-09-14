<?php
require_once __DIR__ . '/../app/app.php';

use App\Core\Router;
use App\Controllers\Resources\WebController;

/* Web */

Router::get("/",[WebController::class,"home"],"web.home");

/* Auth */

/* Api */

// Router::post("${API}/auth/register", [UsuarioController::class, "onRegister"]);
// Router::get("${API}/productos", [UsuarioController::class, 'addUser']);
Router::dispatch();