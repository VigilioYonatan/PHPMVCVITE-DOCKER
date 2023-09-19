<?php
namespace App\Core;
class Controller{
    public $body;
    public $request;
    public Validators $validator;
    public Redirect $redirect;
     
    public function __construct()
    {
        $this->setBody();
        $this->validator = new Validators();
        $this->redirect = new Redirect();
    }
    public function render(string $route,array $params = []){
        // dump(md5(uniqid()));
        // http_response_code($this->redirect->code);
        // destructar array y mostrar en las vistas las variables
        extract($params);
       
        $route=str_replace(".","/",$route);
        require_once __DIR__."/../lib/global.php";
        if(file_exists("../resources/views/$route.php")){
            ob_start();
            require_once "../resources/views/$route.php";
            $contenido=ob_get_clean();
            require_once  '../resources/views/layout.php';
            $this->closeSessions();
            return;
        }   
        dd("View not found: <b>{$route}</b>");
    }

    // public function redirect(string $route,?array $param = null){
    //     $route=route($route,$param);
    //     header("Location: {$route}");
    // }
    public static function page404(){
        $route=route('404');
        header("Location: {$route}");
    }
    // public function backPage(){
    //     header("Location: {$_SERVER['HTTP_REFERER']}");
    // }
   
    public function statusCode(int $num = 200):void{
        http_response_code($num);
    }
    public function setBody():void{
        $this->body = json_decode(file_get_contents('php://input'), true);
    }
    public function get(string $key ){
        return $this->all()[$key];
    }
  
    public function all(){
        unset($_POST[Sessiones::CSRF_TOKEN]);
        $files = [];
        foreach($_FILES as $key => $value){
            $files[$key]=$value;
        }
        return [...$_POST,...$files];
    }

    public static function csrf(){
        if($_SERVER["REQUEST_METHOD"] === "POST" && isset($_POST[Sessiones::CSRF_TOKEN]) ){
            if ($_SESSION &&  isset($_SESSION[Sessiones::CSRF_TOKEN]) &&hash_equals($_SESSION[Sessiones::CSRF_TOKEN], $_POST[Sessiones::CSRF_TOKEN])  ) {
                unset($_SESSION[Sessiones::CSRF_TOKEN]);       
            }else{
                header("Location: {$_SERVER['HTTP_REFERER']}");
            }
        }  
    }

    public static function old(){
        if($_SERVER["REQUEST_METHOD"] === "POST"  ){
           Sessiones::init(Sessiones::OLD,$_POST);
        }  
    }
    private static function closeSessions(){
        Sessiones::clean();
    }
}