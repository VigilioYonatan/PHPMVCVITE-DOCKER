<?php 

namespace App\Controllers;

use App\Core\Controller;
use App\Models\UsuarioModel;
use Rakit\Validation\Validator;

class AuthController extends Controller{
    public  function loginPage(){
        $test = [
            ["nombre"=>"yonatan","apellido"=>"vigilio"],
            ["nombre"=>"elmer","apellido"=>"vigilio"]
        ];
        return $this->render("auth/login.page",["test"=> $test]);
    }
    public  function login(){
        if($this->request === "POST"){
           $user = UsuarioModel::where("email",$this->body->email);
           return $user;
            // return $this->body;
          
        }
    }

    public  function registerPage(){
       
        return $this->render("auth.register");
    }
    public  function register(){
        if($this->request === "POST"){
           
            echo json_encode("hola");
        }
    }
}