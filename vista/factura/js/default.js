

function eliminarFactura(id){
    if(confirm("¿Desea Eliminar esta Factura?")){
        location.href="http://localhost/facturacion/factura/eliminar/"+id;
    }

}