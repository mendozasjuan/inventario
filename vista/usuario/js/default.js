function eliminarUsuario(id){
    if(confirm("¿Desea Eliminar este Usuario?")){
        location.href="http://localhost/inventario/usuario/eliminar/"+id;
    }
}