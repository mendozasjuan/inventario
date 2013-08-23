<?php


class Categoria_Model extends Modelo{


  function __construct() {
        parent::__construct();
    }

    public function listarCategorias(){


    	$consulta= $this->db->ejecutarConsulta("SELECT * FROM categorias");
    	return $consulta->fetchAll();
    }


   public function listarCategoriaIndividual($id) {
  
       $consulta = $this->db->ejecutarConsulta('SELECT idCategoria, categoria, descripcion FROM categorias where idCategoria='.$id) ;
       return $consulta->fetch();
    }


   public function crear($data){
        $datos=array(
            'categoria'      => $data['categoria'],
            'descripcion'    => $data['descripcion'],
                   );
        $this->db->insertar('categorias', $datos);
    }


  public function guardarEditar($data){
       
       $datos=array(
            'categoria'   => $data['categoria'],
            'descripcion'   => $data['descripcion'],
          
        );
         $this->db->actualizar('categorias', $datos,"idCategoria={$data['idCategoria']}");
    }

  


     public function eliminar($idCategoria) {
        $sql = 'DELETE FROM categorias WHERE idCategoria= :id';
        $consulta = $this->db->ejecutarConsulta($sql,array(':id' => $idCategoria));
    }

     public function buscar_categoria($nombre) {

       $consulta = $this->db->ejecutarConsulta("SELECT * from categorias where categoria like '%$nombre%'");
       $consulta->setFetchMode(PDO::FETCH_ASSOC);
       $data = $consulta->fetchAll();
        echo json_encode($data);
    }



}


?>