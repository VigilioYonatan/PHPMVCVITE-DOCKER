<?php
require_once __DIR__ . '/../app/app.php';
use App\Controllers\AuthController;
use App\Controllers\SeedController;
use App\Core\Router;
use App\Controllers\WebController;

$API = "/api";

/* Web */
Router::get('/', [WebController::class, 'index']);
// Router::post('/', [UsuarioController::class, 'home']);
// Router::get('/editar', [UsuarioController::class, 'editar']);
// Router::post('/editar', [UsuarioController::class, 'editar']);
/* Admin */
// Router::get('/admin', [AdminController::class, 'dashboardPage']);

/* Auth */
Router::get("/auth/login",[AuthController::class,"loginPage"]);
Router::post("$API/auth/login",[AuthController::class,"login"]);
Router::get("/auth/register",[AuthController::class,"registerPage"]);
Router::post("$API/auth/register",[AuthController::class,"register"]);

/* Api */
Router::get("$API/seed",[SeedController::class,"index"]);

// Router::post("${API}/auth/register", [UsuarioController::class, "onRegister"]);
// Router::get("${API}/productos", [UsuarioController::class, 'addUser']);

Router::dispatch();