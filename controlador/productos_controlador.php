<?php 
function home(){
    require_once("modelo/productos_modelo.php");
    // Lógica del programa
    $datos = new Productos_modelo();
    $array_datos = $datos->get_datos();
    require_once("vista/productos_vista.php");

    echo "hola";
}

?>