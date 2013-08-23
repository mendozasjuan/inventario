

function eliminarProducto(id){
    if(confirm("¿Desea Eliminar este Producto?")){
        location.href="http://localhost/inventario/producto/eliminar/"+id;
    }
//    else{
//        return false;
//    }
}