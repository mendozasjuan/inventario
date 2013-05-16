<?php

class Error extends Controlador {
    
    function __construct() {
        parent::__construct();
    }
    
    public function index(){
        $this->view->msg="Esta pagina no existe";
        $this->view->render('error/index');
    }

}
