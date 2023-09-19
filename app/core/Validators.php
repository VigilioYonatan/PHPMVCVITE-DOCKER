<?php
namespace App\Core;
class Validators{
    public  array $errors = [];
    
    public  function validate(array $data,array $validation){
        foreach ($validation as $path => $value) {
            $validator = explode("|",$value);
            foreach ($validator as  $value) {
                if(strpos($value,":")){
                    $validate = explode(":",$value);
                    $fn =$validate[0];
                    if(strpos($validate[1],",")){
                        $args = explode(",",$validate[1]);
                        $this->$fn($path,$data[$path],$args);
                    }else{
                        $this->$fn($path,$data[$path],$validate[1]) ;
                    }
                }else{
                    $this->$value($path,$data[$path] ?? null) ;
                }        
            }
        }
        Sessiones::init(Sessiones::ERRORS,$this->errors);
    }
    // methods
    public function isErrors():bool{
        return count($this->errors) > 0;
    }
    public function firstError(){
        return [
            "message"=>array_values( array_shift($this->errors))[0],
            "body"=>array_keys( array_shift($this->errors))[0]
        ];
    }

    // validations

    private  function required(string $key,mixed $value):void{
    
        if(is_null($value) ){
            $this->errors[$key][]=["required"=>"Este campo es obligatorio."];
            return;
        }
        
        if(is_array($value)){
            if(isset($value["name"]) ){
                if(is_array( $value["name"])){
                    if(empty($value["name"][0])){
                        $this->errors[$key][]=["required"=>"Este campo es obligatorio."];
                    }
                }else{
                    if(empty($value["name"])){
                        $this->errors[$key][]=["required"=>"Este campo es obligatorio."];
                    }
                }
                return;
            }
            return;
        }

        if(strlen($value) ===0 ){
            $this->errors[$key][]=["required"=>"Este campo es obligatorio."];
        }
    }

    private function min(string $key,string|int $value,$param){
        $param=intval($param);
        if($this->isString($value)){
            if(strlen($value)<$param){
                $this->errors[$key][]=["min"=>"El campo {$key} debe contener {$param} caracteres."];
            }
        }
        if($this->isNumeric($value)){
            if($param >$value){
                $this->errors[$key]=["min"=>"El campo {$key} debe ser al menos {$value}."];
            }
        }
       
    }

    private function max(string $key,string|int $value,$param){
        $param = intval($param);
        if($this->isString($value)){
            if(strlen($value)>$param){
                $this->errors[$key][]=["max"=>"El campo {$key} no debe ser mayor a {$param}."];
            }
        }
        if($this->isNumeric($value)){
            if(intval($param) >$value){
                $this->errors[$key][]=["max"=>"El campo {$key} debe ser al menos {$value}."];
            }
        }
       
    }
    private function email(string $key,string|int $value,){
        if(!filter_var($value,FILTER_VALIDATE_EMAIL)){
            $this->errors[$key][]=["email"=>"Correo electrónico no válido"];
        }
    }
    private function unique(string $key,string|int $value,array $params){
        $db  = new Database();
        $query = "SELECT * FROM {$params[0]} WHERE {$params[1]} = '{$value}' LIMIT 1";
        $db->query($query);
        $result= $db->query->fetch();
        if($result){
            $this->errors[$key][]=["unique"=>"El valor {$value} del campo {$key} ya está en uso."];
        }
    }

    private function isNumeric($value):bool{
        return is_numeric($value);
    }
    private function isString($value):bool{
        return is_string($value);
    }
     
   
}