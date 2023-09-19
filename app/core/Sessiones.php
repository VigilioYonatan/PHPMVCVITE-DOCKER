<?php
namespace App\Core;
class Sessiones {
    const   ERRORS    = "ERRORS";
    const   OLD       = "OLD";
    const   CSRF_TOKEN = "CSRF_TOKEN";
    const   CUSTOM = "CUSTOM";

    
    public static function init(string $key,$value){
        $_SESSION[$key] = $value; 
    }
    public static function custom(string $key,$value){
        $_SESSION[$key] = $value; 
    }
    
    public static function get(string $key){
        return $_SESSION[$key];
    }
    public static function destroy(string $key){
        if($_SESSION && isset($_SESSION[$key])){
            unset($_SESSION[$key]);
        }
    }

    public static function clean(){
        self::destroy(self::ERRORS);
        self::destroy(self::OLD);
        self::destroy(self::CUSTOM);
    }
}