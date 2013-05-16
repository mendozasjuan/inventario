<?php

class Usuario_Model extends Modelo {

    function __construct() {
        parent::__construct();
    }
    
    public function listarUsuarios() {
                
       $consulta = $this->db->ejecutarConsulta('SELECT id, nombre, apellido, login, rol FROM usuarios') ;
       
       return $consulta->fetchAll();
    }
    
    public function listarUsuarioIndividual($id) {
       $sql = 'SELECT id, nombre, apellido, login, rol FROM usuarios WHERE id= :id';
       $consulta = $this->db->ejecutarConsulta($sql,array(':id' => $id)) ;
       return $consulta->fetch();
    }
    
    public function crear($data){
        $datos=array(
            'nombre'   => $data['nombre'],
            'apellido' => $data['apellido'],
            'login'    => $data['login'],
            'password' => $data['password'],
            'rol'     => $data['rol']
        );
        $this->db->insertar('usuarios', $datos);
        
    }
    
    public function guardarEditar($data){
       
        $datos=array(
            'nombre'   => $data['nombre'],
            'apellido' => $data['apellido'],
            'login'    => $data['login'],
            'password' => $data['password'],
            'rol'     => $data['rol']
        );
        
         $this->db->actualizar('usuarios', $datos,"id={$data['id']}");
    }
    
    public function eliminar($id) {
        $sql = 'DELETE FROM usuarios WHERE id= :id';
        $consulta = $this->db->ejecutarConsulta($sql,array(':id' => $id));
    }
    
    public function resetPassword($data){
       
        $datos=array(
            'password' => Hash::create('md5','123456')
        );
        
         $this->db->actualizar('usuarios', $datos,"id={$data['id']}");
    }

    public function buscar_usuario($nombre) {

       $consulta = $this->db->ejecutarConsulta("SELECT * from usuarios where nombre like '%$nombre%' or apellido like '%$nombre%' or login like '%$nombre%' or rol like '%$nombre%'");
       $consulta->setFetchMode(PDO::FETCH_ASSOC);
        $data = $consulta->fetchAll();
        echo json_encode($data);
    }


}