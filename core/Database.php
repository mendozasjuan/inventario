<?php
/**
 * Database
 * @author Juan Mendoza
 */
class Database extends PDO{

        function __construct($DB_TYPE, $DB_HOST, $DB_NAME, $DB_USER, $DB_PASSWORD) {
        parent::__construct($DB_TYPE .':host='. $DB_HOST .';dbname='. $DB_NAME ,$DB_USER,$DB_PASSWORD);
        
        //parent::setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    }
    
    /**
     * insertar
     * @param string $tabla tabla en donde se van a insertar los datos
     * @param array $data arreglo asociativo con los datos a insertar 
     */
    public function insertar($tabla, $data){
        ksort($data);
       // exit(print_r($data));
        $nombreCampos=implode(',',array_keys($data));
        $valoresCampos=':' . implode(', :',array_keys($data));;
        
        $consulta = $this->prepare("INSERT INTO $tabla ($nombreCampos) VALUES ($valoresCampos)");
        
        foreach ($data as $key => $value) {
            $consulta->bindValue(":$key", $value);
        }
        
        if($consulta->execute()){
            return TRUE;
        }else{
            return FALSE;
        }
    }
    
    /**
     * actualizar
     * @param string $tabla tabla en donde se van a insertar los datos
     * @param array $data arreglo asociativo con los datos a insertar
     * @param string $where parte del where del sql 
     */
    public function actualizar($tabla, $data, $where) {
        ksort($data);
        
        $detalleCampos = NULL;
        
        foreach ($data as $key => $value) {
            $detalleCampos .= "$key=:$key,";
        }
        
        $detalleCampos = rtrim($detalleCampos, ',');
              
        $consulta = $this->prepare("UPDATE $tabla set $detalleCampos WHERE $where");
        
        foreach ($data as $key => $value) {
            $consulta->bindValue(":$key", $value);
        }
        
        $consulta->execute();
    }
    
    /**
     * ejecutarConsulta
     * @param strin $sql
     * @param array $preparado
     * @return string 
     */
    public function ejecutarConsulta($sql,$preparado=""){
        $consulta = $this->prepare($sql);
        if(empty($preparado)){
            $consulta->execute();
        }else{
            $consulta->execute($preparado);
//            $error=$consulta->errorInfo();
//            exit($error[2]);
            
        }
        return $consulta;
        
    }

}