<?php
session_start();

if (isset($_POST["accion"])) {

    //estamos ante una llamada a ajax
    echo '  <form action="" method="post">
    <label for="ftitulo">Titulo:</label>
    <input type="text" id="ftitulo" name="titulo" value="' . $_POST['titulo'] . '" >

    <label for="fdesc">Descripcion:</label>
    <input type="text" id="fdesc" name="descripcion" value="' . $_POST['descripcion'] . '">

    <label for="festado">Estado:</label>
    <input type="text" id="festado" name="estado" value="' . $_POST['estado'] . '">

    <label for="ffecha">Fecha_Creacion:</label>
    <input type="date" id="ffecha" name="fecha" value="' . $_POST['fecha_creacion'] . '" readonly>

    <br>
    <br>

    <label for="fcorreo">Correo del usuario:</label>
    <input type="text" id="fcorreo" name="correo" value="' . $_POST['correo_usuario'] . '" readonly>


</form>
<input type="submit" name="modificar" value="Modificar">
<input type="submit" id="cancelar" name="cancelar" value="Cancelar" onclick=cancelar()>
';
}

function home()
{
    require_once("modelo/tareas_modelo.php");
    // Lógica del programa
    $error = '';
    $datos = new tareas_modelo();
    if (!isset($_SESSION['nombre'])) {
        $nombre = isset($_POST['nombre']) ? $_POST['nombre'] : '';
        $clave = isset($_POST['clave']) ? $_POST['clave'] : '';
        if ($datos->login($nombre, $clave)) {
            $_SESSION['nombre'] = $nombre;
        }
    }

    if (isset($_SESSION['nombre'])) {
        $array_datos = $datos->get_tareas();
        require_once("vista/tareas_vista.php");
    } else {
        require_once("vista/tareas_vista.php");
    }
    $array_datos = $datos->get_tareas();
    require_once("vista/tareas_vista.php");
}


function modificarTarea()
{
    require_once("modelo/tareas_modelo.php");
    // Lógica del programa
    $error = '';
    $datos = new tareas_modelo();

    if (isset($_POST['borrar'])) {
        $titulo = isset($_POST['titulo']) ? $_POST['titulo'] : '';

        if ($datos->borrar($titulo)) {
            $error = "Tarea borrada correctamente";
        } else {
            $error = "Error al borrar la tarea";
        }
    } elseif (isset($_POST['insertar'])) {
        // Recoger datos del formulario
        $titulo = isset($_POST['titulo']) ? $_POST['titulo'] : '';
        $descripcion = isset($_POST['descripcion']) ? $_POST['descripcion'] : '';
        $estado = isset($_POST['estado']) ? $_POST['estado'] : '';
        $fecha = isset($_POST['fecha']) ? $_POST['fecha'] : '';
        $correo = isset($_POST['correo']) ? $_POST['correo'] : '';

        if ($datos->insertar($titulo, $descripcion, $estado, $fecha, $correo)) {
            echo "Datos insertados correctamente.";
        } else {
            echo "Error al insertar datos en la base de datos.";
        }

        if (isset($_POST["modificar"])) {

            /*
            if (isset($_POST["nombre"])) {
                $nombre=$_POST["nombre"]
            }else {
                $nombre='';
            }
            Esto es lo mismo que lo de abajo*/

            $titulo = isset($_POST['titulo']) ? $_POST['titulo'] : '';
            $descripcion = isset($_POST['descripcion']) ? $_POST['descripcion'] : '';
            $estado = isset($_POST['estado']) ? $_POST['estado'] : '';
            if ($datos->modificar($titulo, $descripcion, $estado)) {
                $error = "Modificado correctamente";
            } else {
                $error = "Error al modificar";
            }

        }
    }

    $array_datos = $datos->get_tareas();
    require_once("vista/modificarTarea_vista.php");
}



function desconectar()
{
    session_destroy();
    header("Location: index.php");
}

?>