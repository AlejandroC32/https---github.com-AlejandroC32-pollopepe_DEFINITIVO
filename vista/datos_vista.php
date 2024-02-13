<?php 

if(isset($_SESSION['nombre'])){
    require_once("menu.php");

?>
<h3>Nueva Tarea:</h3>

<div class="container">
  <form action="index.php" method="post">
    <label for="ftitulo">Titulo:</label>
    <input type="text" id="ftitulo" name="titulo" placeholder="Titulo de la nueva tarea..">

    <label for="fdesc">Descripcion:</label>
    <input type="text" id="fdesc" name="descripcion" placeholder="Escriba una descripcion de la tarea..">

    <label for="festado">Estado:</label>
    <input type="text" id="festado" name="estado" placeholder="Estado de la tarea..">

    <label for="ffecha">Fecha_Creacion:</label>
    <input type="date" id="ffecha" name="fecha" placeholder="Fecha de creacion de la tarea..">

    <label for="fcorreo">Correo del usuario:</label>
    <input type="text" id="fcorreo" name="correo" placeholder="Correo del usuario responsable..">

    <input type="submit" name="insertar" value="Insertar">
  </form>
<?php
    if(isset($array_datos)){
        echo "<table border><tr><th>numTarea</th><th>Titulo</th><th>Descripcion</th><th>Estado</th>
        <th>Fecha_Creacion</th><th>Correo_Usuario</th></tr>";
        foreach ($array_datos as $value){
            if (is_array($value)){
                echo "<tr>";
                foreach ($value as $k=>$value2){
                    echo "<td>".$value2."</td>";
            }
                    echo '<td><form action="" method="post">
                                <input type="hidden" name="titulo" value="'.$value['titulo'].'">
                                <input type="submit" name="borrar" value="Borrar">
                            </form>
                        </td>';
                    echo "</tr>";
            }
            
        }
        echo "</table>";
    }
}else {

?>
<h3>Login</h3>

<div class="container">
  <form action="index.php" method="post">
    <label for="fname">Usuario:</label>
    <input type="text" id="fname" name="nombre" placeholder="Nombre de usuario..">

    <label for="lclave">Contraseña:</label>
    <input type="password" id="lclave" name="clave" placeholder="Contraseña..">

    <input type="submit" value="Login">
  </form>
  <?php
}
echo "<p>$error</p>";
?>