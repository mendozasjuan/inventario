<?php

class Muestra_Model extends Modelo{

	function __construct() {
        parent::__construct();
    }

	public function listarModelos(){

		$consulta= $this->db->ejecutarConsulta("SELECT * FROM modelos");

		return $consulta->fetchAll();
	}

	  public function listarModeloIndividual($id) {
  
       $consulta = $this->db->ejecutarConsulta('SELECT idModelo, modelo, descripcion FROM modelos where idModelo='.$id) ;
       return $consulta->fetch();
    }


   public function crear($data){
        $datos=array(
            'modelo'      => $data['modelo'],
            'descripcion'    => $data['descripcion'],
                   );
        $this->db->insertar('modelos', $datos);
    }


  public function guardarEditar($data){
       
       $datos=array(
            'modelo'   => $data['modelo'],
            'descripcion'   => $data['descripcion'],
          
        );
         $this->db->actualizar('modelos', $datos,"idModelo={$data['idModelo']}");
    }

       public function eliminar($idModelo) {
        $sql = 'DELETE FROM modelos WHERE idModelo= :id';
        $consulta = $this->db->ejecutarConsulta($sql,array(':id' => $idModelo));
    }


     public function buscar_cilindrada($nombre) {

       $consulta = $this->db->ejecutarConsulta("SELECT * from modelos where modelo like '%$nombre%'");
       $consulta->setFetchMode(PDO::FETCH_ASSOC);
       $data = $consulta->fetchAll();
        echo json_encode($data);
    }








}





?>