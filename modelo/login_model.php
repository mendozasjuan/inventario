<?php
class Login_Model extends Modelo {

    function __construct() {
        parent::__construct();
    }
    
    public function entrar(){
        $consulta = $this->db->prepare("SELECT id, rol,nombre from usuarios WHERE login = :login AND password = :password");
        $consulta->execute(array(
            ':login'    => $_POST['nick'],
            ':password' => Hash::create('md5', $_POST['clave'])
        ));
        //Hash::create('md5', $_POST['clave'])
        
        $data = $consulta->fetch();
        $contar = $consulta->rowCount();
        if($contar > 0){
            Session::init();
            Session::set('rol', $data['rol']);
            Session::set('logeado', true);
            Session::set('usuario', $data['nombre']);
            Session::set('id_usuario', $data['id']);
            header('location: '.URL.'index');
            //logear
        }else{
            header('location: ../login');
        }
       
    }
}