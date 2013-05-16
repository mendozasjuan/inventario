<?php

class Factura_Model extends Modelo {

    function __construct() {
        parent::__construct();
    }

    public function buscarClientes($nombre) {

        $consulta = $this->db->ejecutarConsulta("SELECT id,nombre_apellido, nacionalidad,cedula,direccion,telefono,parroquia,municipio from clientes
inner join parroquias using(idParroquia)
inner join municipios using(idMunicipio)
where nombre_apellido like '%$nombre%'");
        $consulta->setFetchMode(PDO::FETCH_ASSOC);
        $data = $consulta->fetchAll();
        echo json_encode($data);
    }

    public function listarFacturaIndividual($id) {
        $sql = 'SELECT f.id,f.nro_control,f.fecha_emision,f.total_iva,f.total_neto,f.total_neto - f.total_iva as total_sin_iva,f.estatus,
                       c.nacionalidad,c.cedula,c.nombre_apellido,c.direccion,c.telefono,pa.parroquia,m.municipio
                       FROM facturas f
                       INNER JOIN clientes c ON c.id=f.id_cliente
                       INNER JOIN parroquias pa ON c.idParroquia=pa.idParroquia
                       INNER JOIN municipios m ON pa.idMunicipio=m.idMunicipio
               WHERE f.id= :id';
        $consulta = $this->db->ejecutarConsulta($sql, array(':id' => $id));
        return $consulta->fetch();
    }
    
    public function listarProductosFactura($id_factura){
        $sql = 'SELECT pf.id, pf.cantidad_producto, pf.total_producto, pro.nombre, pro.precio_venta
                FROM productos_factura pf
                INNER JOIN productos pro ON pro.id = pf.id_producto
                WHERE pf.id_factura= :id';
        $consulta = $this->db->ejecutarConsulta($sql, array(':id' => $id_factura));
        return $consulta->fetchAll();
    }

    public function agregar($data) {
        $datos = array(
            'id_cliente' => $data['id_cliente'],
            'nro_control' => $data['nro_control'],
            'fecha_emision' => $data['fecha_emision'],
            'hora' => $data['hora'],
            'total_iva' => $data['total_iva'],
            'total_descuento' => $data['total_descuento'],
            'total_neto' => $data['total_neto'],
            'forma_pago' => $data['forma_pago'],
            'id_usuario' => $data['id_usuario'],
            'estatus' => $data['estatus']
        );
        $this->db->insertar('facturas', $datos);
        return $this->db->lastInsertId();
    }

    public function guardarEditar($data) {
        $datos = array(
            'estatus' => $data['estatus']
        );
        $this->db->actualizar('facturas', $datos, "id={$data['id']}");
    }

    public function eliminar($id) {
        $sql = 'DELETE FROM facturas WHERE id= :id';
        $consulta = $this->db->ejecutarConsulta($sql, array(':id' => $id));
    }

  

    public function buscar_producto($nombre) {

        $consulta = $this->db->ejecutarConsulta("SELECT * from productos where nombre like '%$nombre%'");
        $consulta->setFetchMode(PDO::FETCH_ASSOC);
        $data = $consulta->fetchAll();
        echo json_encode($data);
    }

    public function agregar_producto_factura($id_factura, $data) {
        foreach ($data as $clave => $valor) {
            $sql = "INSERT INTO productos_factura(id_factura,id_producto,cantidad_producto,iva_producto,descuento_producto,total_producto)
            VALUES($id_factura," . $data[$clave]['id_producto'] . "," . $data[$clave]['cantidad_producto'] . ",0,0," . $data[$clave]['total_producto'] . ")";

            if ($this->db->ejecutarConsulta($sql)) {
                $this->actualizar_existencia($data[$clave]['id_producto'], $data[$clave]['cantidad_producto']);
            }
        }
    }

    public function actualizar_existencia($id_producto, $cantidad) {
        $sql = 'UPDATE productos set existencia=existencia-' . $cantidad . ' where id=' . $id_producto;
        $this->db->ejecutarConsulta($sql);
    }

    public function buscar_pagadas() {

        $consulta = $this->db->ejecutarConsulta("SELECT f.id,c.nombre_apellido,f.nro_control,f.total_neto,f.fecha_emision from facturas f
inner join clientes c on f.id_cliente=c.id
where f.estatus='pagada' ");
        $consulta->setFetchMode(PDO::FETCH_ASSOC);
        $data = $consulta->fetchAll();
        echo json_encode($data);
    }

    public function buscar_pendientes() {

        $consulta = $this->db->ejecutarConsulta("SELECT f.id,c.nombre_apellido,f.nro_control,f.total_neto,f.fecha_emision from facturas f
inner join clientes c on f.id_cliente=c.id
where f.estatus='pendiente' ");
        $consulta->setFetchMode(PDO::FETCH_ASSOC);
        $data = $consulta->fetchAll();
        echo json_encode($data);
    }

    public function ultimoId(){
        $sql = 'SELECT max( id ) as id FROM facturas';
        $consulta = $this->db->ejecutarConsulta($sql);
        return $consulta->fetch();
    }
    
    

}