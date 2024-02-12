<?php

if (isset($_SESSION['nombre'])) {
  require_once("menu.php");

  ?>

  <h3>Nueva Tarea:</h3>

  <div class="container">
    <div id="nuevo">
      <form action="" method="post">
        <label for="ftitulo">Titulo:</label>
        <input type="text" id="ftitulo" name="titulo" placeholder="Titulos de las nuevas tareas 1..">

        <label for="fdesc">Descripcion:</label>
        <input type="text" id="fdesc" name="descripcion" placeholder="Escriba una descripcion de la tarea..">

        <label for="festado">Estado:</label>
        <input type="text" id="festado" name="estado" placeholder="Estado de la tarea..">

        <label for="ffecha">Fecha_Creacion:</label>
        <input type="date" id="ffecha" name="fecha" placeholder="Fecha de creacion de la tarea..">

        <br>
        <br>

        <label for="fcorreo">Correo del usuario:</label>
        <input type="text" id="fcorreo" name="correo" placeholder="Correo del usuario responsable..">

        <input type="submit" name="insertar" value="Insertar">

      </form>
    </div>
    <div id="contenido"></div>
    <?php
    if (isset($array_datos)) {
      echo "<table border><tr><th>Título</th><th>Descripción</th><th>Estado</th><th>Fecha de Creación</th><th>Correo del Usuario</th></tr>";
      foreach ($array_datos as $value) {
        echo "<tr>";
        foreach ($value as $k => $value2) {
          echo "<td>$value2</td>";
        }
        echo "<td><form action='' method='post'>
                <input type='hidden' name='titulo' value='" . $value['titulo'] . "'>
                <input type='submit' name='borrar' value='Borrar'>
                </form></td>";
        echo "<td>
                <input type='hidden' id='titulo" . $value['titulo'] . "' value='" . $value['titulo'] . "'>
                <input type='hidden' id='descripcion" . $value['descripcion'] . "' value='" . $value['descripcion'] . "'>
                <input type='hidden' id='estado" . $value['estado'] . "' value='" . $value['estado'] . "'>
                <input type='hidden' id='fecha_creacion" . $value['fecha_creacion'] . "' value='" . $value['fecha_creacion'] . "'>
                <input type='hidden' id='correo_usuario" . $value['correo_usuario'] . "' value='" . $value['correo_usuario'] . "'>
                <input type='submit' name='modificar' value='Modificar' onclick=modificarTarea(`" . $value['titulo'] . "`)></td>";
        echo "</tr>";
      }
      echo "</table>";
    }
} else {

  ?>
    <h3>Login</h3>

    <div class="container">
      <form action="" method="post">
        <label for="fname">Usuario:</label>
        <input type="text" id="fname" name="nombre" placeholder="Nombre de usuario..">

        <label for="clave">Contraseña:</label>
        <input type="password" id="clave" name="clave" placeholder="Contraseña..">

        <input type="submit" value="Login">
      </form>
      <?php
}
echo "<p>$error</p>";
?>