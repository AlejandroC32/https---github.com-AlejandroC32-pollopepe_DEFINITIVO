<?php
class tareas_modelo
{
    private $db;

    public function __construct()
    {
        require_once("modelo/conectar.php");
        $this->db = Conectar::conexion();
    }

    public function get_tareas()
    {
        $sql = "SELECT * FROM tareas";
        $consulta = $this->db->query($sql);
        while ($registro = $consulta->fetch_assoc()) {
            $this->datos[] = $registro;
        }
        return $this->datos;
    }

    public function login($user, $password)
    {
        $login = false;
        $sql = "SELECT * FROM usuarios WHERE correo = '$user' AND password = '$password'";
        if ($consulta = $this->db->query($sql)) {
            if ($consulta->num_rows > 0) {
                $login = true;
            }
        }
        return $login;
    }

    public function borrar($titulo)
    {
        $sql = "DELETE FROM tareas WHERE titulo = '$titulo'";
        return $this->db->query($sql);
    }

    public function insertar($titulo, $descripcion, $estado, $fecha, $correo)
    {
        $sql = "INSERT INTO tareas (titulo, descripcion, estado, fecha_creacion, correo_usuario) VALUES ('$titulo', '$descripcion', '$estado', '$fecha', '$correo')";

        if ($this->db->query($sql)) {
            return true;
        } else {
            return false;
        }
    }

    function modificar($titulo, $descripcion, $estado)
    {


        $sql = "UPDATE tareas SET titulo='$titulo', descripcion='$descripcion', estado='$estado' WHERE titulo='$titulo'";
        return $this->db->query($sql);

    }
}
?>