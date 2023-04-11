<?php

namespace App\Controllers;

use App\Core\Router;
use App\Models\UsuarioModel;

class WebController
{
    public static function home(Router $router){
        $users = UsuarioModel::all();
        $router->render("web/home",["users"=>$users]);
    }
}