<?php

namespace App\Controllers;

use App\Core\Router;

class AdminController
{
    public static function dashboardPage(Router $router)
    {
        $router->render("admin/DashboardPage", []);
    }
}