<?php

class Dashboard_Model extends Modelo {

    function __construct() {
        parent::__construct();
        }
    
    public function xhrInsert() {
        $consulta = $this->db->prepare('INSERT INTO data (texto) VALUES (:text)');
        $consulta->execute(array(
            ':text' => $_POST['texto']
        ));
        
        $data = array('texto' => $_POST['texto'], 'id' => $this->db->lastInsertId());
        echo json_encode($data);
        
    }
    
    public function xhrGetListing(){
        $consulta = $this->db->prepare('SELECT * FROM data');
        $consulta->setFetchMode(PDO::FETCH_ASSOC);
        $consulta->execute();
        $data = $consulta->fetchAll();
        echo json_encode($data);
    }
    
    public function xhrDeleteListing() {
        $id = $_POST['id'];
        $consulta = $this->db->prepare("DELETE FROM data WHERE id=$id");
        $consulta->setFetchMode(PDO::FETCH_ASSOC);
        $consulta->execute();
    }

}