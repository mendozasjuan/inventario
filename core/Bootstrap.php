<?php
class Bootstrap {

    function __construct() {
        $url = isset($_GET['url']) ? $_GET['url'] : null;
        $url = rtrim($url, '/');
        $url = explode('/', $url);
        
        if(empty($url[0])){
            require 'controlador/index.php';
            $controlador=new Index();
            $controlador->index();
            return false;
        }
        
        $file = 'controlador/' . $url[0] . '.php';
        if(file_exists($file)){
          require $file;  
        }else{
            $this->error();
        }
        
        $controlador = new $url[0];
        $controlador->cargarModelo($url[0]);
        
        //Llamando los metodos
        if (isset($url[2])) {
            if(method_exists($controlador, $url[1])){
                 $controlador->{$url[1]}($url[2]);
            }else{
                $this->error();
            }
           
        } else {
            if (isset($url[1])) {
                 if(method_exists($controlador, $url[1])){
                    $controlador->{$url[1]}();
                 }else{
                     $this->error();
                 }
            }else{
                $controlador->index();
            }
        }
            

    }
    
    function error(){
        require 'controlador/error.php';
        $controlador=new Error();
        $controlador->index();
        return false;
    }

}