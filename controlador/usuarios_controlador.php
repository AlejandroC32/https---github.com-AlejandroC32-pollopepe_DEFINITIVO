<?php
session_start();

function home()
{
    require_once("modelo/usuarios_modelo.php");
    // Lógica del programa
    $error = '';
    $datos = new usuarios_modelo();

    if (isset($_POST['borrar'])) {
        $nombre = isset($_POST['correo']) ? $_POST['correo'] : '';

        $result = $datos->borrarUsuario($nombre);

        if ($result) {
            $error = "Borrado correctamente";
        } else {
            $error = "Error al borrar";
        }
    } elseif (isset($_POST['insertar'])) {
        $nombre = isset($_POST['nombre']) ? $_POST['nombre'] : '';
        $clave = isset($_POST['clave']) ? $_POST['clave'] : '';
        $apellido = isset($_POST['apellido']) ? $_POST['apellido'] : '';
        $correo = isset($_POST['correo']) ? $_POST['correo'] : '';

        if ($datos->insertarUsuario($nombre, $clave, $apellido, $correo)) {
            $error = "Insertado correctamente.";
        } else {
            $error = "Error al insertar.";
        }
    }

    $array_datos = $datos->get_usuarios();
    require_once("vista/modificarUsuarios_vista.php");
}

function desconectar()
{
    session_destroy();
    header("Location: index.php");
}
?>