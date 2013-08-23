<?php

class Session {

    function __construct() {
        
    }
    
    public static function init(){
        @session_start();
    }
    
    public static function get($clave){
        if(isset($_SESSION[$clave])){
            return $_SESSION[$clave];
        }
        
    }
    
    public static function set($clave,$valor){
        $_SESSION[$clave] = $valor;
    }
    
    public static function destroy(){
        session_destroy();
    }

}