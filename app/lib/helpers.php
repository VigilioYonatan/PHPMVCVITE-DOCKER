<?php

// use App\Core\Router;

use App\Core\Database;
use App\Core\Router;

function dump(mixed $var): void
{
    echo "<pre style='font-size:.8rem;color:white;background-color:rgba(0,0,0,0.9);border-radius:.5rem;padding:1rem;max-width:800px;max-height:600px;overflow: auto;>";
    var_dump($var);
    echo "</pre>";
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
            if ($ruta[2] === $uri) {
                $url = $key;  
                $params= array_slice(explode("/:",$key),1);
                if(count($params) > 0   ){
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
            }else{
            //    echo errorMessage("no se encontró una uri con este nombre: <b>{$uri}</b>");
               return;
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

function errorMessage($message){
    return "<p  style='color:white;background-color:rgb(220,38,38,1);display:block;padding:1rem;margin:0rem 1.3rem;border-radius:0.5rem'>{$message}</p>";
}


function routes(string $mode,string $textColor){
    $color = "#16A34A";

    echo    "<div class='dropdown-vigilio'>
    <button style='color:{$color};font-size:1.2rem;text-transform:uppercase;font-weight:bolder;margin:.4rem 0;border-bottom:2px solid {$color};padding:.5rem 0rem;width:100%'>Router</button>";
    echo "
    <div class='dropdown-container-vigilio-hidden' style='overflow:auto;'>
    <table style='border-collapse: collapse; width: 100%; text-align: center'>
        <thead style='position:sticky;top:0;background-color:{$mode};border: 1px solid $color'>
        <tr style='color:{$color}'>
            <th style='border: 1px solid $color; padding: 4px;'>N°</th>
            <th style='border: 1px solid $color; padding: 4px;'>URL</th>
            <th style='border: 1px solid $color; padding: 4px;'>METHOD</th>
            <th style='border: 1px solid $color; padding: 4px;'>NAME</th>
            <th style='border: 1px solid $color; padding: 4px;'>CONTROLLER</th>
        </tr>
        </thead>
        <tbody style='font-size:.9rem;color:$textColor'>";
        $i =0;
        foreach(Router::routers() as $method =>$route){
            foreach($route  as $key =>$value){ 
                $key = "/{$key}";
                $i++;
                echo "<tr>
                    <td style='border: 1px solid $color; padding: 4px;'>$i</td>
                    <td style='border: 1px solid $color; padding: 4px;'>{$key}</td>
                    <td style='border: 1px solid $color; padding: 4px;'>{$method}</td>
                    <td style='border: 1px solid $color; padding: 4px;'>{$value[2]}</td>
                    <td style='border: 1px solid $color; padding: 4px;'>{$value[0]}.{$value[1]}</td>
                </tr>";
            }
        }
             
    echo "</tbody>
        </table>
    </div>";
    echo "</div>";
}

function settings(string $mode ="dark"){
   
    if($_ENV["MODE"] === "production") return;
    $textColor = $mode === "dark" ? "#fff" :"#000";
    $mode = $mode === "dark" ? "rgba(0, 0, 0, 1)" :"rgba(255, 255, 255, 1)";

    echo "<div>
            <div
                id='btn-vigilio'
                style='position: fixed; box-shadow: 0px 0px 4px rgba(0, 0, 0, 0.5); bottom: 20px;right:40px;background-color: $mode ;padding:0.7rem; border-radius: 100%;cursor: pointer;'
                >
                <div style='position: relative;'>
                    <img width='60' height='60' alt='php'
                        src='https://cdn.jsdelivr.net/gh/devicons/devicon/icons/php/php-original.svg' />
                    <p style='position: absolute; bottom: 4px;right:-10px;color:$textColor;font-weight: bold;font-size: .8rem;'>by
                        <strong>Vigilio</strong>
                    </p>
                </div>
            </div>";
        modal($mode,$textColor);
         dropdown();
         btnHtml();
    echo "</div>";
}

function modal(string $mode,string $textColor){
    echo "
    <div id='modal-vigilio'  style='width:600px;position:relative;position:fixed;background-color:{$mode};color:{$textColor};z-index:999999999;border-radius:.5rem;padding:2rem;bottom:120px;right:30px;overflow:auto'
    > ";
    echo "<div>";
    // echo "<a href='' style='color:{$color};font-size:1.6rem;text-transform:uppercase;font-weight:bolder;margin:.4rem 0;text-align:center;display:inline-block'>VIGILIO</a>";
    routes($mode,$textColor);
    migrations($mode,$textColor);

    echo " </div>";
    echo "<div  id='btn-vigilioClose' style='position:absolute;top:0;right:0;color:white;font-size:1.4rem;margin:20px;cursor: pointer;'>
                X
            </div>";
    echo  "</div>";
}

function dropdown(){
    echo "
    <script> 
    const dropdownVigilio = document.querySelectorAll('.dropdown-vigilio');
    for(dropVigilio of dropdownVigilio){
        dropVigilio.addEventListener('click',dropdownChange)
    }
    
    function dropdownChange(e){
        const dropdownContainervigilio = e.target.parentElement.children[1];
        if(document.querySelector('.dropdown-container-vigilio') && dropdownContainervigilio.classList.contains('dropdown-container-vigilio-hidden')){
            document.querySelector('.dropdown-container-vigilio').classList.add('dropdown-container-vigilio-hidden');
            document.querySelector('.dropdown-container-vigilio').classList.remove('dropdown-container-vigilio');
        }
        if(dropdownContainervigilio.classList.contains('dropdown-container-vigilio-hidden')){
            dropdownContainervigilio.classList.remove('dropdown-container-vigilio-hidden');
            dropdownContainervigilio.classList.add('dropdown-container-vigilio');
        }else{
            dropdownContainervigilio.classList.add('dropdown-container-vigilio-hidden');
            dropdownContainervigilio.classList.remove('dropdown-container-vigilio');
        }
    }
         
    </script>";

    echo "<style>
          
            .dropdown-container-vigilio {     
                height:300px;
            }
            .dropdown-container-vigilio-hidden {
                height:0px;
            }

        </style>";
}

function btnHtml(){
    echo "<script>
    const btnVigilio = document.getElementById('btn-vigilio');
    const btnVigilioClose = document.getElementById('btn-vigilioClose');
    const modalVigilio = document.getElementById('modal-vigilio');
    let openModal = false;
    modalHtml();
    btnVigilio.addEventListener('click',e=>{
        changeStateModel();
      
    });
    
    btnVigilioClose.addEventListener('click',e=>{
        changeStateModel();
    });
    function modalHtml(){
        if(openModal){
            modalVigilio.classList.add('show');
            modalVigilio.classList.remove('hidden');
        }else{
            modalVigilio.classList.remove('show');
            modalVigilio.classList.add('hidden');
        }
    }
   
    function changeStateModel(){
        openModal = !openModal;  
        modalHtml();
    }
    
    </script>";
    echo "<style>
        .show{
            transform:translateX(0px);
            transition:transform .3s ease;
        }
        .hidden{
            transform:translateX(2000px);
            transition:transform .3s ease;
        }
    </style>";
}

function migrations(string $mode,string $textColor){
    $migrations = new Database();
    $result = $migrations->getMigrations();
    $color="#DC2626";
    echo    "<div class='dropdown-vigilio'>
                <button style='color:{$color};font-size:1.2rem;text-transform:uppercase;font-weight:bolder;margin:.4rem 0;border-bottom:2px solid {$color};padding:.5rem 0rem;width:100%'>Model</button>";
    echo "
    <div class='dropdown-container-vigilio-hidden' style='overflow:auto;'>";
    echo "<p style='color:white;font-size:1rem;display:block;text-align:center;text-transform:uppercase;margin:.5rem 0px'>Migrations</p>";
    echo "<table style='border-collapse: collapse; width: 100%; text-align: center'>
        <thead style='position:sticky;top:0;background-color:{$mode};border: 1px solid $color'>
        <tr style='color:{$color}'>
            <th style='border: 1px solid $color; padding: 4px;'>N°</th>
            <th style='border: 1px solid $color; padding: 4px;'>MIGRATION</th>
            <th style='border: 1px solid $color; padding: 4px;'>CREATED_AT</th>
        </tr>
        </thead>
        <tbody style='font-size:.9rem;color:$textColor'>";
        $i =0;
        foreach($result as $value){
            $i++;
            echo "<tr>
                <td style='border: 1px solid $color; padding: 4px;'>$i</td>
                <td style='border: 1px solid $color; padding: 4px;'>{$value['migration']}</td>
                <td style='border: 1px solid $color; padding: 4px;'>{$value['created_at']}</td>
            </tr>";
        }       
        echo "</tbody>
        </table>";
        echo "<p style='color:white;font-size:1rem;display:block;text-align:center;text-transform:uppercase;margin:.5rem 0px'>Tables</p>";
        echo "<table style='border-collapse: collapse; width: 100%; text-align: center'>
        <thead style='position:sticky;top:0;background-color:{$mode};border: 1px solid $color'>
        <tr style='color:{$color}'>
            <th style='border: 1px solid $color; padding: 4px;'>N°</th>
            <th style='border: 1px solid $color; padding: 4px;'>TABLE</th>
            <th style='border: 1px solid $color; padding: 4px;'>COUNT</th>
        </tr>
        </thead>
        <tbody style='font-size:.9rem;color:$textColor'>";
        $i =0;

        foreach($migrations->getTables() as $value){
            $i++;
            $dbTable=$value['Tables_in_'.strtolower($_ENV['DB_NAME'])];
            $count =$migrations->count($dbTable)["count"];
            echo "<tr>
                <td style='border: 1px solid $color; padding: 4px;'>{$i}</td>
                <td style='border: 1px solid $color; padding: 4px;'>{$dbTable}</td>
                <td style='border: 1px solid $color; padding: 4px;'>{$count}</td>
            </tr>";
        }       
    echo "</tbody>
        </table>";
    echo "</div>";
    echo "</div>";
    
}