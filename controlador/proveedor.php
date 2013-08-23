<?php

class Proveedor extends Controlador {
    
    function __construct() {
        parent::__construct();   

         $this->view->js = array('proveedor/js/default.js');
     
    }
    
    public function nuevo(){
        $this->view->render('proveedor/nuevo');
    }
    
    public function index(){
        $this->view->listaProveedores = $this->modelo->listarProveedores();
        $this->view->render('proveedor/index');
    }
    
    public function editar($id){
        //exit($id);
        $this->view->proveedor = $this->modelo->listarProveedorIndividual($id);
        //exit(print_r($this->view->proveedor));
        $this->view->render('proveedor/editar');
    }
    
    public function crear(){
       $data = array();
       $data['rif'] = $_POST['rif'];
       $data['razon_social'] = $_POST['razon_social'];
       $data['telefono'] = $_POST['telefono'];
       $data['direccion'] = $_POST['direccion'];
       $data['email'] = $_POST['email'];
       
       $this->modelo->crear($data);
       header('location:' . URL .'proveedor');
    }
    
     public function guardarEditar($id){
       $data = array();
       $data['rif'] = $_POST['rif'];
       $data['razon_social'] = $_POST['razon_social'];
       $data['telefono'] = $_POST['telefono'];
       $data['direccion'] = $_POST['direccion'];
       $data['email'] = $_POST['email'];
       $data['id'] = $id;
       //exit(print_r($data));
       $this->modelo->guardarEditar($data);
       header('location:' . URL .'proveedor');
    }
    
    public function eliminar($id) {
        $this->modelo->eliminar($id);
        header('location:' . URL .'proveedor');
    }

    public function buscar_proveedores($nombre){
         $this->modelo->buscar_proveedor($nombre);
    }

    public function buscar_proveedor_individual(){
      $data=$this->modelo->listarProveedorIndividual($_POST['id']);
      echo json_encode($data);
    }
    

    
}
?>
