<?php
require_once __DIR__ . '/../app/app.php';

use App\Core\Router;
use App\Controllers\Resources\AdminController;
use App\Controllers\Resources\Page404Controller;
use App\Controllers\Resources\UserController;
use App\Controllers\Resources\WebController;

/* Web */

Router::get("/",[WebController::class,"home"],"web.home");
Router::post("/users",[UserController::class,"store"],'users.store');
Router::get("/users",[UserController::class,"index"],'users.index');
Router::get("/users/:id",[UserController::class,"show"],'users.show');
Router::get("/users/:id/edit",[UserController::class,"edit"],'users.edit');
Router::post("/users/:id/update",[UserController::class,"update"],'users.update');
/* Auth */

/* Admin */
Router::get("/admin",[AdminController::class,"dashboard"],"admin.dashboard");

/* Api */
Router::get("/not-found",[Page404Controller::class,"index"],"404");
// Router::post("${API}/auth/register", [UsuarioController::class, "onRegister"]);
// Router::get("${API}/productos", [UsuarioController::class, 'addUser']);
Router::dispatch();