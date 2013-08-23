<?php

class Proveedor_Model extends Modelo {

    function __construct() {
        parent::__construct();
    }
    
    public function listarProveedores() {
                
       $consulta = $this->db->ejecutarConsulta('SELECT id, rif, razon_social, telefono,direccion,email FROM proveedores') ;
       
       return $consulta->fetchAll();
    }
    
    public function listarProveedorIndividual($id) {
       // exit("id: ".$id);
//       $sql = 'SELECT p.id, p.rif, p.razon_social, p.telefono,
//               FROM proveedores p
//               WHERE p.id= :id';
       $consulta = $this->db->ejecutarConsulta('SELECT id, rif, razon_social, telefono,email,direccion FROM proveedores where id='.$id) ;
       return $consulta->fetch();
    }
    
    public function crear($data){
        $datos=array(
            'rif'   => $data['rif'],
            'razon_social'         => $data['razon_social'],
            'telefono'       => $data['telefono'],
            'direccion'       => $data['direccion'],
            'email'       => $data['email']
        );
        $this->db->insertar('proveedores', $datos);
    }
    
    public function guardarEditar($data){
       
       $datos=array(
            'rif'   => $data['rif'],
            'razon_social'         => $data['razon_social'],
            'telefono'       => $data['telefono'],
            'direccion'       => $data['direccion'],
            'email'       => $data['email']
        );
         $this->db->actualizar('proveedores', $datos,"id={$data['id']}");
    }
    
    public function eliminar($id) {
        $sql = 'DELETE FROM proveedores WHERE id= :id';
        $consulta = $this->db->ejecutarConsulta($sql,array(':id' => $id));
    }

    public function buscar_proveedor($nombre) {

       $consulta = $this->db->ejecutarConsulta("SELECT * from proveedores where rif like '%$nombre%' or razon_social like '%$nombre%'");
       $consulta->setFetchMode(PDO::FETCH_ASSOC);
        $data = $consulta->fetchAll();
        echo json_encode($data);
    }
    

    
    

}