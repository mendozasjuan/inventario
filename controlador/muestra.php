<?php


class Muestra extends Controlador {

	public function index(){

        $this->view->VerModelos= $this->modelo->listarModelos();
		$this->view->render('muestra/index');
	}
	 public function editar($id){
     
        $this->view->vermodelo = $this->modelo->listarModeloIndividual($id);
         //exit(print_r($this->view->verCategoria));
        $this->view->render('muestra/editar');
    }


 public function crear(){
       $data = array();
       $data['modelo'] = $_POST['modelo'];
       $data['descripcion'] = $_POST['descripcion'];          
       $this->modelo->crear($data);
       header('location:' . URL .'muestra');
    }
          
     public function guardarEditar($id){
       $data = array();
       $data['modelo'] = $_POST['modelo'];
       $data['descripcion'] = $_POST['descripcion'];
       $data['idModelo'] = $id;
       //exit(print_r($data));
       $this->modelo->guardarEditar($data);
       header('location:' . URL .'muestra');
    }


   
     public function eliminar($idModelo) {
        $this->modelo->eliminar($idModelo);
        header('location:' . URL .'muestra');
    }

     public function buscar_cilindrada($nombre){
         $this->modelo->buscar_cilindrada($nombre);
    }
}



?>