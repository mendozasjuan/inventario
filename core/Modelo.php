<?php

class Modelo {

    function __construct() {
       $this->db=new Database(DB_TYPE, DB_HOST, DB_NAME, DB_USER, DB_PASSWORD);
    }
    
   

}
