<?php

class Dashboard extends Controlador {
    function __construct() {
        parent::__construct();
//        Session::init();
//        $logeado = Session::get('logeado');
//        if(!$logeado){
//            Session::destroy();
//            header('location: '. URL .'/login');
//            exit;
//        }
        $this->view->js = array('dashboard/js/default.js');
    }
    
    public function index(){
         $this->view->render('dashboard/index');
    }
    
    public function logout(){
        Session::destroy();
        header('location: '. URL .'login');
        exit;
    }
    
    public function xhrInsert(){
        $this->modelo->xhrInsert();
    }
    
    public function xhrGetListing(){
        $this->modelo->xhrGetListing();
    }
    public function xhrDeleteListing() {
        $this->modelo->xhrDeleteListing();
    }

}