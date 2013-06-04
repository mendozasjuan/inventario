<?php

class Cliente_Model extends Modelo {

    function __construct() {
        parent::__construct();
    }
    
    public function listarClientes() {
                
       $consulta = $this->db->ejecutarConsulta('SELECT id, nacionalidad, cedula, nombre_apellido, direccion, telefono FROM clientes') ;
       
       return $consulta->fetchAll();
    }
    
    public function listarClienteIndividual($id) {
       $sql = 'SELECT p.id, p.nacionalidad, p.cedula, p.nombre_apellido, p.direccion, p.telefono, 
                      pa.parroquia, m.municipio, pa.idParroquia, m.idMunicipio
               FROM clientes p
               INNER JOIN parroquias pa ON p.idParroquia = pa.idParroquia
               INNER JOIN municipios m ON pa.idMunicipio = m.idMunicipio
               WHERE p.id= :id';
       $consulta = $this->db->ejecutarConsulta($sql,array(':id' => $id)) ;
       return $consulta->fetch();
    }
    
    public function crear($data){
        $datos=array(
            'nacionalidad'   => $data['nacionalidad'],
            'cedula'         => $data['cedula'],
            'nombre_apellido'=> $data['nombre'],
            'direccion'      => $data['direccion'],
            'telefono'       => $data['telefono'],
            'idParroquia'    => $data['parroquia']
        );

        if($this->db->insertar('clientes', $datos)){
          return TRUE;
        }else{
          return FALSE;
        }
    }
    
    public function guardarEditar($data){
       
        $datos=array(
            'nacionalidad'   => $data['nacionalidad'],
            'cedula'         => $data['cedula'],
            'nombre_apellido'=> $data['nombre'],
            'direccion'      => $data['direccion'],
            'telefono'       => $data['telefono'],
            'idParroquia'    => $data['parroquia']
        );
         $this->db->actualizar('clientes', $datos,"id={$data['id']}");
    }
    
    public function eliminar($id) {
        $sql = 'DELETE FROM clientes WHERE id= :id';
        $consulta = $this->db->ejecutarConsulta($sql,array(':id' => $id));
    }
    
    public function seleccionarMunicipios() {
        $consulta = $this->db->ejecutarConsulta('SELECT * FROM municipios');
        return  $consulta->fetchAll();
        
         
    }
    
    public function cargarParroquias($id){
        $consulta = $this->db->prepare('SELECT * FROM parroquias where idMunicipio = :id');
        $consulta->setFetchMode(PDO::FETCH_ASSOC);
        $consulta->execute(array(':id' => $id));
        $data = $consulta->fetchAll();
        return $data;
        //retorna el formato json
        
    }

    public function buscar_cliente($nombre) {

       $consulta = $this->db->ejecutarConsulta("SELECT * from clientes where nombre_apellido like '%$nombre%' or cedula like '%$nombre%'");
       $consulta->setFetchMode(PDO::FETCH_ASSOC);
        $data = $consulta->fetchAll();
        echo json_encode($data);
    }
    
    

}