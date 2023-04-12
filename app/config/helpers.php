<?php

function dump($var): void
{
    echo "<pre>";
    var_dump($var);
    echo "</pre>";
}


function cleanHtml($html): string
{
    return htmlspecialchars($html);
}

function pagina_actual($path ) : bool {
    return str_contains( $_SERVER['PATH_INFO'] ?? '/', $path  ) ? true : false;
}

function arrayFrom($var,int $length=20){
    $values = [];
    for ($i=0; $i < $length; $i++) { 
        $values [] = $var;
    }
    return $values;
}