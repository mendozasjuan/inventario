<?php

class Marca extends Controlador{

	 function __construct() {
        parent::__construct();   

            
    }


	public function index (){


		$this->view->listaMarcas= $this->modelo->listarMarcas();
		$this->view->render('marca/index');
	}

	public function crear(){

		$data= array();
		$data['marca'] = $_POST['marca'];
		$data['descripcion'] = $_POST['descripcion'];
		$this->modelo->crear($data);
		header('location:' .URL. 'marca');
	}

	public function editar($id){

        $this->view->vermarca =$this->modelo->listarMarcaIndividual($id);
		$this->view->render('marca/editar');
	}


     public function guardarEditar($id){
       $data = array();
       $data['marca'] = $_POST['marca'];
       $data['descripcion'] = $_POST['descripcion'];
       $data['idMarca'] = $id;
       //exit(print_r($data));
       $this->modelo->guardarEditar($data);
       header('location:' . URL .'marca');
    }


     public function eliminar($idMarca) {
        $this->modelo->eliminar($idMarca);
        header('location:' . URL .'marca');
    }
    
     public function buscar_marca($nombre){
         $this->modelo->buscar_marca($nombre);
    }






}



?>