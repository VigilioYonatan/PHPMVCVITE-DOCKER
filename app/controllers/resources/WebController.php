<?php
namespace App\Controllers\Resources;
use App\Core\Controller;
use App\Models\User;

class WebController extends Controller{
    public function home(){
        return $this->render("web.home");
    }
    public function controller(){
        $user= new User();
        return $this->render("web.controller");
    }
    public function model(){
    
        return $this->render("web.model");
    }
    public function examples(){
        return $this->render("web.examples");
    }

    public function ga($id){
        return $this->render("web.ga");
        
    }
}