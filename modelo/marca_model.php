<?php


class Marca_Model extends Modelo{


function __construct() {
        parent::__construct();
    }


    public function listarMarcas(){

    	$consulta= $this->db->ejecutarConsulta("SELECT * FROM marcas");

    	return $consulta->fetchAll();


    }
    public function listarMarcaIndividual($id){

        $consulta= $this->db->ejecutarConsulta('SELECT idMarca, marca, descripcion from marcas where idMarca='.$id);
        return $consulta->fetch();
    }

    public function crear($data){

    	$datos=array(

    		'marca' => $data['marca'],
    		'descripcion'=> $data['descripcion'],
    		);

    	$this->db->insertar('marcas', $datos);
    }


    public function guardarEditar($data){
       
       $datos=array(
            'marca'   => $data['marca'],
            'descripcion'   => $data['descripcion'],
          
        );
         $this->db->actualizar('marcas', $datos,"idMarca={$data['idMarca']}");
    }

    public function eliminar($idMarca) {
        $sql = 'DELETE FROM marcas WHERE idMarca= :id';
        $consulta = $this->db->ejecutarConsulta($sql,array(':id' => $idMarca));
    }

     public function buscar_marca($nombre) {

       $consulta = $this->db->ejecutarConsulta("SELECT * from marcas where marca like '%$nombre%'");
       $consulta->setFetchMode(PDO::FETCH_ASSOC);
       $data = $consulta->fetchAll();
        echo json_encode($data);
    }

}


?>