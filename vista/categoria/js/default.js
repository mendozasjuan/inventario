
function eliminarCategoria(id){
    if(confirm("¿Desea Eliminar esta Categoria?")){
        location.href="http://localhost/inventario/categoria/eliminar/"+id;
    }
//    else{
//        return false;
//    }
}