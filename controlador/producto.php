<?php

class Producto extends Controlador {
    
    function __construct() {
        parent::__construct();   

         $this->view->js = array('producto/js/default.js');
     
    }
    
    public function nuevo(){
        $this->view->categorias = $this->modelo->seleccionarCategorias();
        $this->view->render('producto/nuevo');
    }
    
    public function index(){
        //$this->view->alarma= $this->modelo->delimitarStock();
        $this->view->modelos =$this->modelo->seleccionarModelos();
        $this->view->marcas= $this->modelo->seleccionarMarcas();
        $this->view->categorias = $this->modelo->seleccionarCategorias();
        $this->view->listaProductos = $this->modelo->listarProductos();
        //exit(print_r($this->view->listaProductos));
        $this->view->render('producto/index');
    }
    
    public function editar($id){
        //exit($id);
        $this->view->modelos =$this->modelo->seleccionarModelos();
        $this->view->marcas= $this->modelo->seleccionarMarcas();
        $this->view->categorias = $this->modelo->seleccionarCategorias();
        $this->view->producto = $this->modelo->listarProductoIndividual($id);
        //exit(print_r($this->view->proveedor));
        $this->view->render('producto/editar');
    }
    
    public function crear(){
       $data = array();
       $data['codigo'] = $_POST['codigo'];
       $data['nombre'] = $_POST['nombre'];
       $data['fecha_entrada'] = $_POST['fecha'];
       $data['precio_compra'] = $_POST['precio_compra'];
       $data['precio_venta'] = $_POST['precio_venta'];
       $data['stock_minimo'] = $_POST['stock_minimo'];
       $data['existencia'] = $_POST['existencia'];
       $data['id_proveedor'] = $_POST['id_proveedor'];
       $data['id_categoria'] = $_POST['categoria'];
       $data['id_marca'] = $_POST['marca'];
       $data['id_modelo'] = $_POST['modelo'];

       $this->modelo->crear($data);
       header('location:' . URL .'producto');
    }
    
     public function guardarEditar($id){
       $data = array();
       $data['codigo'] = $_POST['codigo'];
       $data['nombre'] = $_POST['nombre'];
       $data['precio_compra'] = $_POST['precio_compra'];
       $data['precio_venta'] = $_POST['precio_venta'];
       $data['stock_minimo'] = $_POST['stock_minimo'];
       $data['existencia'] = $_POST['existencia'];
       $data['id_categoria'] = $_POST['categoria'];
       $data['id_marca'] = $_POST['marca'];
       $data['id_modelo'] = $_POST['modelo'];
       $data['id'] = $id;
       //exit(print_r($data));
       $this->modelo->guardarEditar($data);
       header('location:' . URL .'producto');
    }
    
    public function eliminar($id) {
        $this->modelo->eliminar($id);
        header('location:' . URL .'producto');
    }

    public function producto_proveedor($id_proveedor){
        $this->view->id_proveedor=$id_proveedor;
        $this->view->listaProductos = $this->modelo->listarProductosProveedor($id_proveedor);
        $this->view->render('producto/proveedor');
    }

    public function buscarProveedores($nombre){
        $this->modelo->buscarProveedores($nombre);
    }

    public function buscar_productos($nombre){
         $this->modelo->buscar_producto($nombre);
    }

    public function actualizarExistencia(){
        $data = array();
       $data['existencia'] = $_POST['input_existencia'];
       $data['id'] = $_POST['id_producto_existencia'];
       $this->modelo->actualizarExistencia($data);
       header('location:' . URL .'producto');
    }


    public function imprimir(){
        $this->view->producto = $this->modelo->listarProductos();
        $this->view->render('producto/reporte_producto',TRUE);
    }
    

    
}
?>
