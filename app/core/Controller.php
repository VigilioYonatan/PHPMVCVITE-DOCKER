<?php
namespace App\Core;
class Controller{
    public $body;
    public $request;
    public function __construct()
    {
        $this->setBody();

    }
    public function render(string $route,array $params = []){
        // destructar array y mostrar en las vistas las variables
        extract($params);
       
        $route=str_replace(".","/",$route);
       
        if(file_exists("../resources/views/$route.php")){
            ob_start();
            require_once "../resources/views/$route.php";
            $contenido=ob_get_clean();
            require_once  '../resources/views/layout.php';
            // return $contenido;
        }else{
            return errorMessage("View not found: <b>{$route}</b>");
        }
        // return $route;
    }

    public function redirect(string $route):void{
        header("Location: {$route}");
    }
    public function statusCode(int $num = 200):void{
        http_response_code($num);
    }
    public function setBody():void{
        $this->body = json_decode(file_get_contents('php://input'), true);
    }
}