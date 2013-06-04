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
        header('Content-Type: text/xml; charset=utf-8'); 
        $html="";
        $array=$this->modelo->cargarParroquias($id);
        $datos=array();
        foreach ($array as $key => $value) {
            $datos[$value['idParroquia']]=utf8_encode($value['parroquia']);
        }
        echo json_encode($datos);
    }

    public function cargarMunicipios($id){
        header('Content-Type: text/xml; charset=utf-8'); 
        $html="";
        $array=$this->modelo->seleccionarMunicipios($id);
        $datos=array();
        foreach ($array as $key => $value) {
            $datos[$value['idMunicipio']]=utf8_encode($value['municipio']);
        }
        echo json_encode($datos);
    }

    public function buscar_clientes($nombre){
         $data=$this->modelo->buscar_cliente($nombre);
         echo json_encode($data);
    }

    public function buscar_cliente_individual(){
      $data=$this->modelo->listarClienteIndividual($_POST['id']);
      echo json_encode($data);
    }
    
}

?>
