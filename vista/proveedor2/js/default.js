

function eliminarCliente(id){
    if(confirm("¿Desea Eliminar este Proveedor?")){
        location.href="http://localhost/inventario/proveedor/eliminar/"+id;
    }
//    else{
//        return false;
//    }
}