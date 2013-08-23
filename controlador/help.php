<?php

class Help extends Controlador{

    function __construct() {
        parent::__construct();       
    }
    
    public function index(){
         $this->view->render('help/index');
    }


    public function otro($arg = false) {
        $this->view->suma=  $this->modelo->suma();
        $this->view->render('help/otro');
    }

}