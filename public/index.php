<?php
require_once __DIR__ . '/../app/app.php';

use App\Core\Router;
use App\Controllers\Resources\UserController;
use App\Controllers\Resources\WebController;

/* Web */
Router::get("/",[WebController::class,"home"],"web.home");
Router::get("/ga/:id",[WebController::class,"ga"],"web.ga");
Router::get("/ga2/:id/:user",[WebController::class,"ga"],"web.ga2");
Router::get("/models",[WebController::class,"model"],"web.models");
Router::get("/controllers",[WebController::class,"controller"],"web.controllers");
Router::get("/examples",[WebController::class,"examples"],"web.examples");

Router::resource("/users",UserController::class);
/* Auth */

/* Api */

// Router::post("${API}/auth/register", [UsuarioController::class, "onRegister"]);
// Router::get("${API}/productos", [UsuarioController::class, 'addUser']);
Router::dispatch();