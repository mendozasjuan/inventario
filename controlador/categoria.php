<?php

class Categoria extends Controlador{

 function __construct() {
        parent::__construct();   
           
    }


   public function index(){

    $this->view->listaCategorias= $this->modelo->listarCategorias();
   	$this->view->render('categoria/index');
   }


 public function crear(){
       $data = array();
       $data['categoria'] = $_POST['categoria'];
       $data['descripcion'] = $_POST['descripcion'];          
       $this->modelo->crear($data);
       header('location:' . URL .'categoria');
    }

      public function editar($id){
     
        $this->view->verCategoria = $this->modelo->listarCategoriaIndividual($id);
         //exit(print_r($this->view->verCategoria));
        $this->view->render('categoria/editar');
    }
      
     public function guardarEditar($id){
       $data = array();
       $data['categoria'] = $_POST['categoria'];
       $data['descripcion'] = $_POST['descripcion'];
       $data['idCategoria'] = $id;
       //exit(print_r($data));
       $this->modelo->guardarEditar($data);
       header('location:' . URL .'categoria');
    }


     public function eliminar($idCategoria) {
        $this->modelo->eliminar($idCategoria);
        header('location:' . URL .'categoria');
    }

    public function buscar_categoria($nombre){
         $this->modelo->buscar_categoria($nombre);
    }
}




?>