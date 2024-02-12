<?php

class Conectar
{
    public static function conexion()
    {
        try {
            $conexion = new mysqli("localhost", "root", "", "practica1eva");
        } catch (Exception $e) {
            die('Error' . $e->get_message());
        }
        return $conexion;
    }

}

?>