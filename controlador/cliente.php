<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of persona
 *
 * @author informatica
 */
class Cliente extends Controlador {
    
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
         //$this->view->usuario=$usuario;
         $this->view->js = array('cliente/js/default.js');
     
    }
    
    public function nuevo(){
        $this->view->municipios = $this->modelo->seleccionarMunicipios();
        $this->view->render('cliente/nuevo');
    }
    
    public function index(){
        $this->view->municipios = $this->modelo->seleccionarMunicipios();
        $this->view->listaClientes = $this->modelo->listarClientes();
        $this->view->render('cliente/index');
    }
    
    public function editar($id){
        $this->view->municipios = $this->modelo->seleccionarMunicipios();
        $this->view->cliente = $this->modelo->listarClienteIndividual($id);
        $this->view->render('cliente/editar');
    }
    
    public function crear(){
       $data = array();
       $data['nacionalidad'] = $_POST['nacionalidad'];
       $data['cedula'] = $_POST['cedula'];
       $data['nombre'] = $_POST['nombre'];
       $data['direccion'] = $_POST['direccion'];
       $data['telefono'] = $_POST['telefono'];
       $data['parroquia'] = $_POST['parroquia'];
       
       if($this->modelo->crear($data)){
        $this->view->mensaje="Datos Guardados con Exito";
        header('location:' . URL .'cliente');
       }else{
        $this->view->mensaje="Datos no se han guardado";
       }
       
    }
    
     public function guardarEditar($id){
       $data = array();
       $data['nacionalidad'] = $_POST['nacionalidad'];
       $data['cedula'] = $_POST['cedula'];
       $data['nombre'] = $_POST['nombre'];
       $data['direccion'] = $_POST['direccion'];
       $data['telefono'] = $_POST['telefono'];
       $data['parroquia'] = $_POST['parroquia'];
       $data['id'] = $id;
       $this->modelo->guardarEditar($data);
       header('location:' . URL .'cliente');
    }
    
    public function eliminar($id) {
        $this->modelo->eliminar($id);
        header('location:' . URL .'cliente');
    }
    
    public function cargarParroquias($id){
        $this->modelo->cargarParroquias($id);
    }

    public function buscar_clientes($nombre){
         $this->modelo->buscar_cliente($nombre);
    }
    
}

?>
