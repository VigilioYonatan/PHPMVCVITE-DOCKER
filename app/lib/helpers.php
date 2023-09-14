<?php

use App\Core\Router;

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
                $params= array_slice(explode("/:",$key),1);
                if(count($params) > 0){
                    if(!$param){
                        echo errorMessage("Paramaters is required in {$uri}: parameters ".implode(", ",$params));
                        return;
                    }
                    if(array_keys($param) !== $params){
                        echo errorMessage("Paramaters incorrect: ".implode(", ",$params));
                        return;      
                    }
                    foreach($params as $par){
                        $url= str_replace(":$par",$param[$par],$url);
                    }
                }
                break;
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
    return errorMessage("Component not found: <b>{$route}</b>");
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