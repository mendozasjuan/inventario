<?php

class Factura extends Controlador{
    
    public function __construct() {
        parent::__construct();
        $this->view->js = array('factura/js/default.js');
    }
    
    public function index(){
        $this->view->render('factura/index');
    }
    
    public function nueva(){
        $this->view->nroFactura=$this->generarNroFactura();
        $this->view->render('factura/nueva');
    }

    public function buscarClientes($nombre){
        $this->modelo->buscarClientes($nombre);
    }

    public function anadir_producto(){
        $this->view->render('factura/anadir_producto',TRUE);
    }
    
    public function buscar_producto($nombre){
         $this->modelo->buscar_producto($nombre);
    }

    public function agregar(){
        
        $data = array();
       $data['id_cliente'] = $_POST['id_cliente'];
       $data['nro_control'] = $_POST['numero'];
       $data['fecha_emision'] = $_POST['fecha'];
       $data['hora'] = date('H:i');
       $data['total_iva'] = $_POST['iva'];
       $data['total_descuento'] = 0;
       $data['total_neto'] = $_POST['input_total_civa'];
       $data['forma_pago'] = $_POST['forma_pago'];
       $data['id_usuario'] = Session::get('id_usuario');
       if($data["forma_pago"] == "contado"){
           $data["estatus"]="pagada";
       }else{
           $data["estatus"]="pendiente";
       }
       $ultimo_id=$this->modelo->agregar($data);
       if (!empty($ultimo_id) and $ultimo_id > 0){
           $datos=array();
           foreach ($_POST['id_producto'] as $key => $value) {
               $datos[$key]['id_producto']=$value;
           }
           foreach ($_POST['total_producto'] as $key => $value) {
               $datos[$key]['total_producto']=$value;
           }
           foreach ($_POST['quantity'] as $key => $value) {
               $datos[$key]['cantidad_producto']=$value;
           }
       }
       
       $this->agregar_producto_factura($ultimo_id,$datos);
       header('location:' . URL .'factura/imprimir/'.$ultimo_id);
    }
    
    public function agregar_producto_factura($id_factura,$data){
         $this->modelo->agregar_producto_factura($id_factura,$data);
    }

    public function pagadas(){
        $this->view->render('factura/pagadas');
        //$this->modelo->pagadas();
    }

    public function buscar_pagadas(){
        $this->modelo->buscar_pagadas();
    }

    public function buscar_pendientes(){
        $this->modelo->buscar_pendientes();
    }
    
    public function editar($id){
        $this->view->factura = $this->modelo->listarFacturaIndividual($id);
        $this->view->productos_factura = $this->modelo->listarProductosFactura($id);
        //exit(print_r($this->view->productos_factura));
        $this->view->render('factura/editar');
    }
    
    public function guardarEditar(){
       $data = array();
       $data['estatus'] = $_POST['estatus'];
       $data['id'] = $_POST['id_factura'];
       $this->modelo->guardarEditar($data);
       header('location:' . URL .'factura');
    }
    
     public function eliminar($id) {
        $this->modelo->eliminar($id);
        header('location:' . URL .'factura');
    }

    public function generarNroFactura(){
        $data=$this->modelo->ultimoId();
        return "F-".str_pad($data['id']+1,5,'0',STR_PAD_LEFT);
    }
    
    public function imprimir($id){
        $this->view->factura = $this->modelo->listarFacturaIndividual($id);
        $this->view->productos = $this->modelo->listarProductosFactura($id);
        $this->view->render('factura/reporte_factura',TRUE);
    }
    

}
?>
