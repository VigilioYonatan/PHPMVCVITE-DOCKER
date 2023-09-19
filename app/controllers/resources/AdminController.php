<?php
namespace App\Controllers\Resources;
use App\Core\Controller;

class AdminController extends Controller{
    public function dashboard(){
        session_start();
        $_SESSION["id"]=1;
        return  $this->render("admin.dashboard");
    }
}