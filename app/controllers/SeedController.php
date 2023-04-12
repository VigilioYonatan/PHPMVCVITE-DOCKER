<?php
namespace App\Controllers;

use App\Models\UsuarioModel;

class SeedController{
    public function index(){
        if($_ENV["PHP_MODE"] !== "development"){
            return ["success"=>false,"msg"=>"No permitido"];
        }
        // $usuarios = UsuarioModel::bulkCreate(UsuarioModel::SEED());
        return [
            "success"=>true,
            "msg"=>"seed executed"
        ];
    }
}