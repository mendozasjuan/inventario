<?php

class Usuario extends Controlador {
    function __construct() {
        parent::__construct();
        Session::init();
        $logeado = Session::get('logeado');
        $role = Session::get('rol');
        $usuario= Session::get('usuario');
        if(!$logeado ){
            Session::destroy();
            header('location: '.URL.'login');
            exit;
        }

        $this->view->js = array('usuario/js/default.js');
     
    }
    
    public function index(){
        $this->view->listaUsuario = $this->modelo->listarUsuarios();
        $this->view->render('usuario/index');
    }
    
    public function nuevo(){
        
        $this->view->render('usuario/nuevo');
    }
    
    public function crear(){
       $data = array();
       $data['nombre'] = $_POST['nombre'];
       $data['apellido'] = $_POST['apellido'];
       $data['login'] = $_POST['login'];
       $data['password'] = $_POST['password'];
       $data['rol'] = $_POST['role'];
       
       $this->modelo->crear($data);
       header('location:' . URL .'usuario');
    }
    
    public function editar($id) {
        $this->view->usuario = $this->modelo->listarUsuarioIndividual($id);
        $this->view->render('usuario/editar');
    }
    
    public function guardarEditar($id){
       $data = array();
       $data['nombre'] = $_POST['nombre'];
       $data['apellido'] = $_POST['apellido'];
       $data['login'] = $_POST['login'];
       $data['password'] = $_POST['password'];
       $data['rol'] = $_POST['role'];
       $data['id'] = $id;
       
       $this->modelo->guardarEditar($data);
       header('location:' . URL .'usuario');
    }
    
    public function editarGuardar($id) {
       header('location:' . URL .'usuario');
    }
    
    public function eliminar($id) {
        $this->modelo->eliminar($id);
        header('location:' . URL .'usuario');
    }
    
    public function reset_password($id) {
        $this->modelo->resetPassword($id);
        header('location:' . URL .'usuario');
    }

    public function buscar_usuarios($nombre){
         $this->modelo->buscar_usuario($nombre);
    }
    
    
}