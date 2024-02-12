<?php
class usuarios_modelo
{
    private $db; // Conexión con la BBDD
    private $datos; // Registros recuperados de la BBDD

    public function __construct()
    {
        require_once("modelo/conectar.php");
        $this->db = Conectar::conexion();
        $this->datos = array();
    }

    public function get_usuarios()
    {
        $sql = "SELECT * FROM usuarios";
        $consulta = $this->db->query($sql);
        while ($registro = $consulta->fetch_assoc()) {
            $this->datos[] = $registro;
        }
        return $this->datos;
    }

    public function borrarUsuario($nombre)
    {
        // Eliminar registros relacionados en la tabla tareas
        $sql_tareas = "DELETE FROM tareas WHERE correo_usuario IN (SELECT correo FROM usuarios WHERE correo = '$nombre')";
        $this->db->query($sql_tareas);

        // Ahora puedes eliminar el usuario
        $sql_usuarios = "DELETE FROM usuarios WHERE correo = '$nombre'";
        return $this->db->query($sql_usuarios);
    }

    public function insertarUsuario($nombre, $clave, $apellido, $correo)
    {
        $sql = "INSERT INTO usuarios (nombre, apellido, correo, password) VALUES ('$nombre', '$apellido', '$correo' , '$clave')";
        if ($this->db->query($sql)) {
            return true;
        } else {
            return false;
        }
    }
}
?>