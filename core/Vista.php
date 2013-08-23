<?php
class Vista {
   

    function __construct() {
        Session::init();
        $usuario= Session::get('usuario');
        $this->usuario=$usuario;
    }
    
    public function get_titulo() {
        return $this->titulo;
    }
    
    public function set_titulo($titulo) {
        $this->titulo= $titulo;
    }
    
    public function render($nombre, $no_include = FALSE){
        if($no_include){
            require 'vista/' . $nombre . '.php';
        }else{
            require 'templates/'. TEMPLATE .'/header.php'; 
            require 'vista/' . $nombre . '.php';
            require 'templates/'. TEMPLATE .'/footer.php';
        }
    }
    
    public function mostrarTitulo() {
        if(isset($this->titulo)){  
            echo $this->titulo;
       }
    }
    
    public function mostrarJs() {
        if (isset($this->js)) {
                foreach ($this->js as $js) {
                    echo " <script type='text/javascript' src='". URL . 'vista/' .$js ."'></script>";
                }
            }
    }

}
