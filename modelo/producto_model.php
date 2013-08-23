<?php

class Producto_Model extends Modelo {

    function __construct() {
        parent::__construct();
    }
    
    public function listarProductos() {
       $sql='SELECT id, codigo, nombre, precio_compra, precio_venta, stock_minimo, existencia, categoria, marca, modelo
FROM productos
LEFT JOIN categorias ON categorias.idCategoria = productos.idCategoria
LEFT JOIN marcas ON marcas.idMarca = productos.idMarca
LEFT JOIN modelos ON modelos.idModelo = productos.idModelo';       
       $consulta = $this->db->ejecutarConsulta($sql) ;
       
       return $consulta->fetchAll();
    }



    public function listarProductoIndividual($id) {
       $sql = 'SELECT p.id, p.codigo, p.nombre, p.precio_compra, p.precio_venta, p.stock_minimo, p.existencia, c.idCategoria, c.categoria, m.idMarca, m.marca, s.idModelo, s.modelo
FROM productos p
INNER JOIN categorias c ON p.idCategoria = c.idCategoria
INNER JOIN marcas m ON p.idMarca = m.idMarca
INNER JOIN modelos s ON p.idModelo = s.idModelo
WHERE p.id = :id';
       $consulta = $this->db->ejecutarConsulta($sql,array(':id' => $id)) ;
       return $consulta->fetch();
    }

        
    public function crear($data){
        $datos=array(
            'codigo'        => $data['codigo'],
            'nombre'        => $data['nombre'],
            'fecha_entrada' => $data['fecha_entrada'],
            'precio_compra' => $data['precio_compra'],
            'precio_venta'  => $data['precio_venta'],
            'stock_minimo'  => $data['stock_minimo'],
            'existencia'    => $data['existencia'],
            'id_proveedor'  => $data['id_proveedor'],
            'idCategoria'   => $data['id_categoria'],
            'idMarca'       => $data['id_marca'],
            'idModelo'      => $data['id_modelo']
        );
        $this->db->insertar('productos', $datos);
    }
    
    public function guardarEditar($data){
       
       $datos=array(
            'codigo'        => $data['codigo'],
            'nombre'        => $data['nombre'],
            'precio_compra' => $data['precio_compra'],
            'precio_venta'  => $data['precio_venta'],
            'stock_minimo'  => $data['stock_minimo'],
            'existencia'    => $data['existencia'],
            'idCategoria'   => $data['id_categoria'],
            'idMarca'       => $data['id_marca'],
            'idModelo'      => $data['id_modelo']
        );
         $this->db->actualizar('productos', $datos,"id={$data['id']}");
    }
    
    public function eliminar($id) {
        $sql = 'DELETE FROM productos WHERE id= :id';
        $consulta = $this->db->ejecutarConsulta($sql,array(':id' => $id));
    }

    public function listarProductosProveedor($id_proveedor) {

       $consulta = $this->db->ejecutarConsulta('SELECT id, codigo, descripcion, precio_compra,precio_venta,stock_minimo, existencia FROM productos where id_proveedor='.$id_proveedor) ;

       return $consulta->fetchAll();
    }

    public function buscarProveedores($nombre) {

       $consulta = $this->db->ejecutarConsulta("SELECT id,razon_social, rif,telefono from proveedores
where razon_social like '%$nombre%'");
       $consulta->setFetchMode(PDO::FETCH_ASSOC);
        $data = $consulta->fetchAll();
        echo json_encode($data);
    }

    public function buscar_producto($nombre) {

       $consulta = $this->db->ejecutarConsulta("SELECT id, codigo, nombre, precio_compra, precio_venta, stock_minimo, existencia, categoria, marca, modelo
FROM productos
LEFT JOIN categorias ON categorias.idCategoria = productos.idCategoria
LEFT JOIN marcas ON marcas.idMarca = productos.idMarca
LEFT JOIN modelos ON modelos.idModelo = productos.idModelo where nombre like '%$nombre%' or categoria like '%$nombre%' or codigo like '%$nombre%' or marca like '%$nombre%' or modelo like '%$nombre%'");
       $consulta->setFetchMode(PDO::FETCH_ASSOC);
        $data = $consulta->fetchAll();
        echo json_encode($data);
    }

    public function actualizarExistencia($data){
        $sql='UPDATE productos set existencia=existencia + '.$data['existencia'].' where id='.$data['id'];
        $consulta = $this->db->ejecutarConsulta($sql) ;
    }
    
    public function seleccionarCategorias(){
        $sqlconsulta = $this->db->ejecutarConsulta(" SELECT * from categorias ");
        return $sqlconsulta->fetchAll();
    }


    public function seleccionarMarcas(){
      $sqlMarcas= $this->db->ejecutarConsulta("SELECT * FROM marcas");
      return $sqlMarcas->fetchAll();
    }

    public function seleccionarModelos(){


      $sqlModelos= $this->db->ejecutarConsulta("SELECT * FROM modelos");
      return $sqlModelos->fetchAll();
    }

    public function delimitarStock(){

      $sql= $this->db->ejecutarConsulta('SELECT id,stock_minimo, existencia from productos where id=:id');

    }



    
    

}