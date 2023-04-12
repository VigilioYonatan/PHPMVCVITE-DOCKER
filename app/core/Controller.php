<?php
namespace App\Core;
class Controller{
    public $body;
    public $request;
    public function __construct()
    {
        $this->setBody();
        $this->setRequest();
    }
    public function render($route,$params = []){
        // destructar array y mostrar en las vistas las variables
        extract($params);
        // $route=str_replace(".","/",$route);
        if(file_exists("../resources/views/$route.php")){
            ob_start();
            require_once "../resources/views/$route.php";
            $contenido=ob_get_clean();
            require_once  '../resources/views/layout.php';
            // return $contenido;
        }
        // return $route;
    }

    public function redirect($route){
        header("Location: {$route}");
    }
    public function setRequest(){
        $this->request= $_SERVER['REQUEST_METHOD'];
    }

    public function statusCode($num = 200){
        http_response_code($num);
    }
    public function setBody(){
        $this->body = json_decode(file_get_contents('php://input'), true);
    }
}