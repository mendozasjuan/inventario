

Genera Alarma para Stock_minimo.

logica

Si lo que estoy descontando de la existencia es igual al stock_minimo  enteonces debo
generar  una alarma que indique, acaba de llegar al minimo en su inventario

programacion debo seleccionar la tabla producto para saber cuanto tengo

en existencia y cual es mi stock_minimo

SELECT id, nombre, stock_minimo, existencia from productos where id = id 

if ($existencia ==stock_minimo){

$this->producto $value['nombre']= alert('A llegado al stock_minino');

}

