<?php

use App\Core\Router;
use App\Core\Sessiones;

function dump(mixed $var): void
{
    echo "<pre style='font-size:.8rem;color:white;background-color:rgba(0,0,0,0.9);border-radius:.5rem;padding:1rem;max-width:800px;overflow: auto;'>";
    var_dump($var);
    echo "</pre>";
}
function asset(string $url): string
{
    return "http://{$_SERVER['HTTP_HOST']}$url";
}

function dd(mixed $var){
    dump($var);
    exit();
    
}

function cleanHtml($html): string
{
    return htmlspecialchars($html);
}

function isPage($path) : bool {
    return str_contains($_SERVER['PATH_INFO'] ?? '/', $path  ) ? true : false;
}

function arrayFrom($var,int $length=20){
    $values = [];
    for ($i=0; $i < $length; $i++) { 
        $values [] = $var;
    }
    return $values;
}

function route(string $uri,array $param=null){
    $url = null;
    foreach(Router::routers() as  $rutas){
        foreach($rutas as $key=>$ruta){
            if ($ruta["NAME"] === $uri) {
                $url = $key;  
                if( $param) {     
                    foreach ($param as $key => $value) {
                        if (in_array($key, array_keys($param))) {
                            $url = str_replace(":$key",$value,$url);
                        } else {
                            dump("falta un paramatro: {$key}");
                        } 
                    }
                }

            }
        }  
    } 
    return "http://{$_SERVER['HTTP_HOST']}/$url";
}

function component(string $route,array $props =[]){
    extract($props);
    $route=str_replace(".","/",$route);
   
    if(file_exists("../resources/views/components/{$route}.php")){
        ob_start();
        include "../resources/views/components/{$route}.php";
        $contenido =ob_get_clean();
       return $contenido;
    }
     dd("Component not found: <b>{$route}</b>");
}


function vuePrint($var):string{
    return cleanHtml(json_encode($var));
}

function props(...$args){
    foreach($args as $key=> $val){
        if(gettype($key) === "string"){
            if(!isset(${$key})){
               ${$key} = $args[$key] ??  null;
            }
        }else{
            if(!isset(${$val})){
                ${$val} = null;
            }
        }     
    }
}

function csrf_token(){
    if (!isset($_SESSION[Sessiones::CSRF_TOKEN])) {
        $_SESSION[Sessiones::CSRF_TOKEN] = bin2hex(random_bytes(32)); // Genera un token aleatorio
    }
    $csrf_token = $_SESSION[Sessiones::CSRF_TOKEN];
    $name=Sessiones::CSRF_TOKEN;
    return "<input type='hidden' name={$name} value={$csrf_token} >";
}
function error(string $key ){
    if ($_SESSION &&  isset($_SESSION[Sessiones::ERRORS]) && isset(Sessiones::get(Sessiones::ERRORS)[$key])) {
        $error=$_SESSION[Sessiones::ERRORS][$key];
        return array_shift($error[0]);
    }
}
function old(string $key ){
    if ($_SESSION &&  isset($_SESSION[Sessiones::OLD]) && isset(Sessiones::get(Sessiones::OLD)[$key])) {
        return Sessiones::get(Sessiones::OLD)[$key];
    }
}

function session(string $key){
    $value = null;
    if(isset($_SESSION[Sessiones::CUSTOM]) && isset($_SESSION[Sessiones::CUSTOM][$key])){
        $value =$_SESSION[Sessiones::CUSTOM][$key];
    }
    return $value;
}