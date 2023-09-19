<?php
namespace App\Core;
class Redirect{
    private ?string $uri = null;
    private ?array $params = null;
    public int $code = 200;
    public array $sessionData = [];

    public function route(string $uri,?array $params=null){
        $this->uri = $uri;
        if($params){
            $this->params = $params;
        }
        return $this;
    }
    public function back(){
        $this->uri = $_SERVER['HTTP_REFERER'];
        return $this;
    }
    public function withStatus(int $code){
        $this->code = $code;
        return $this;
    }
    public function with(string $key,mixed $value){
        $_SESSION[Sessiones::CUSTOM][$key] = $value; 
        return $this;
    }
    public function redirect(){
        $route=route($this->uri,$this->params);
        // $code = $this->code;
        $this->uri=null;
        $this->params=null;
        // $this->code=200;
        header("Location: {$route}");
        exit;
    }
}