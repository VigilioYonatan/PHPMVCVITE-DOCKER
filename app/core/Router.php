<?php
namespace App\Core;
class Router
{

    private static array $routes=[];

    private static function routesResources (string $uri,string $param) {
        return [
            "index"=>["method"=>"GET","uri"=>$uri], //index
            "store"=>["method"=>"POST","uri"=>$uri], //index
            "create"=>["method"=>"GET","uri"=>"{$uri}/create"], //create
            "show"=>["method"=>"GET","uri"=>"{$uri}/:{$param}"], //show
            "edit"=>["method"=>"GET","uri"=>"{$uri}/:{$param}/edit"], //edit
            "update"=>["method"=>"POST","uri"=>"{$uri}/:{$param}"], //update
            "destroy"=>["method"=>"POST","uri"=>"{$uri}/:{$param}/delete"], //destroy
        ];
    }

    public static function get(string $uri, $callback,string $name)
    {
        $uri = trim($uri,"/");
        self::$routes["GET"][$uri] = [...$callback,$name];
    }
    public static function post(string $uri, $callback,string $name)
    {
        $uri = trim($uri,"/");
        self::$routes["POST"][$uri] = [...$callback,$name];
    }

    public static function resource(string $uri, $callback,array $only=null){
        
        if($uri[-1] !== "s"){
            die("Debe ser plural tu ruta");
        }
        if($uri[0] !== "/"){
            $uri = "/".$uri;
        }
        
       
        $param =strpos($uri,"/api") !==false  ? substr($uri,5,-1)  :substr($uri,1,-1);
       
        if($only){
            foreach($only as $path){
                $pathOnly =self::routesResources($uri,$param)[$path];
                self::{$pathOnly["method"]}($pathOnly["uri"],[$callback,$path],substr($uri,1).".".$path);
            }
            return;
        }

        $paths = self::routesResources($uri,$param) ;
        foreach($paths as  $key=>$path){
            self::{$path["method"]}($path["uri"],[$callback,$key],substr($uri,1).".".$key);
       }
    }
    public static function apiResource(string $uri, $callback,array $only=["index","store","show","update","destroy"]){
        $apiUri="/api{$uri}";
        self::resource($apiUri,$callback, $only);
    }
 
    public static function dispatch(){
        $uri = $_SERVER["REQUEST_URI"];
        $uri = trim($uri,"/");
        if(strpos($uri,"?")){
            $uri = substr($uri,0,strpos($uri,"?"));
        }   
      
        $method=$_SERVER["REQUEST_METHOD"];
        foreach (self::$routes[$method] as $route => $callback) {
            if(strpos($route,":")){
                $route = preg_replace("#:[a-zA-Z1-9]+#","([a-zA-Z1-9]+)",$route);
            }
            //#^hola$# -> hola true, holaaa false,sshola false
            if(preg_match("#^$route$#",$uri,$matches)){
                
                $params = array_slice($matches,1);
                
                if(is_callable($callback)){
                    $response= $callback(...$params);
                }
                if(is_array($callback)){
                    $controller = new $callback[0];
                    $response   = $controller->{$callback[1]}(...$params);
                }
               
                if(is_array($response) || is_object($response)){
                    header("Content-Type: application/json");
                    echo json_encode($response);
                }else{
                    echo $response;
                }
                return;
            }
      
        }
        http_response_code(404);
        echo "404";
    }

    public static function routers(){
        return self::$routes;
    }
}