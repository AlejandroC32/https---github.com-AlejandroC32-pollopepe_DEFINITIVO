<?php

if (isset($_SESSION['nombre'])) {
    require_once("menu.php");

    ?>

<h3>Nuevo Usuario:</h3>

<div class="container">
    <form action="" method="post">
        <label for="fname">Usuario:</label>
        <input type="text" id="fname" name="nombre" placeholder="Nombre de usuario..">

        <label for="clave">Contraseña:</label>
        <input type="password" id="clave" name="clave" placeholder="Contraseña..">

        <label for="fapellido">Apellido:</label>
        <input type="text" id="fapellido" name="apellido" placeholder="Apellido..">

        <label for="fcorreo">Correo:</label>
        <input type="text" id="fcorreo" name="correo" placeholder="Correo..">

        <input type="submit" name="insertar" value="Insertar">
    </form>
    <?php
        if (isset($array_datos)) {
            echo "<table border> <tr><th>Correo</th><th>Nombre</th><th>Apellido</th></tr>";
            foreach ($array_datos as $value) {
                if (is_array($value)) {
                    echo "<tr><td>" . $value['correo'] . "</td>";
                    echo "<td>" . $value['nombre'] . "</td>";
                    echo "<td>" . $value['apellido'] . "</td>";
                    echo '<td><form action="" method="post">
                        <input type="hidden" name="correo" value="' . $value['correo'] . '">
                        <input type="submit" name="borrar" value="Borrar">
                      </form></td></tr>';
                }
            }
            echo "</table>";
        }
}
?>