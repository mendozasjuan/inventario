<?php

class Index extends Controlador {

    function __construct() {
        parent::__construct();
        Session::init();
        $logeado = Session::get('logeado');  
 
        if (!$logeado) {
            Session::destroy();
            header('location: ' . URL . 'login');
            exit;
        }
        $this->view->titulo = ' - Index';
    }

    public function index() {
        $this->view->render('index/index');
    }

    public function detalles() {
        $this->view->render('index/index');
    }

}
