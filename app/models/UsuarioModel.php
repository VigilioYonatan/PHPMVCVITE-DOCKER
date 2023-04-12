<?php

namespace App\Models;
use App\Core\Model;
use Faker\Factory;

class UsuarioModel extends Model
{
    protected static $tabla = 'usuarios';
    protected static $columnasDB = ['id', 'nombre'];
    public $id,$nombre,$email,$password;
    public function __construct($args = [])
    {
        $this->id           = $args['id'] ?? null;
        $this->nombre       = $args['nombre']  ?? null;
        $this->email        = $args['email'] ?? '';
        $this->password     = $args['password'] ?? '';
    }

    public function loginValidate($body){
        $validator = $this->validator->make($body,[
            "email"=>"numeric",
            "password"=>"numeric"
        ]);
     return $validator;
    }
}