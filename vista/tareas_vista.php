<?php
if (isset($_SESSION['nombre'])) {
    require_once("menu.php");
    ?>
<?php
    if (isset($array_datos)) {
        echo "<table border><tr><th>Titulo</th><th>Descripcion</th><th>Estado</th>
                  <th>Fecha_Creacion</th><th>Correo_Usuario</th></tr>";
        foreach ($array_datos as $value) {
            if (is_array($value)) {
                echo "<tr><td>" . $value['titulo'] . "</td>";
                echo "<td>" . $value['descripcion'] . "</td>";
                echo "<td>" . $value['estado'] . "</td>";
                echo "<td>" . $value['fecha_creacion'] . "</td>";
                echo "<td>" . $value['correo_usuario'] . "</td></tr>";
            }
        }
        echo "</table>";
    }
} else {
    ?>
<h3>Login</h3>
<div class="container">
    <form action="" method="post">
        <label for="fname">Usuario:</label>
        <input type="text" id="fname" name="nombre" placeholder="Nombre de los usuarios..">

        <label for="clave">Contraseña:</label>
        <input type="password" id="clave" name="clave" placeholder="Contraseña..">

        <input type="submit" value="Login">
    </form>
    <?php
}
echo "<p>$error</p>";
?>