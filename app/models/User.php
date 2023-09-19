<?php
namespace App\Models;

use App\Core\Model;


class User extends Model{
    protected $table = "users";
    protected $fillable=["name","email","password"];
    protected $updated_at=false;

    public function storeValidation(array $all){
        $this->validator->validate($all,[
            "name"=>"required|min:3|max:10",
            "email"=>"required|email",
            "password"=>"required|min:5|max:10",
            "images"=>"required|files:jpg,"
        ]);
        return $this->validator;
    }
}