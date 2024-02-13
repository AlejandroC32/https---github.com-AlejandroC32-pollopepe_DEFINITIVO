<?php 

    class Datos_modelo{

        private $db; // Conexión con la BBDD
        private $datos; // Registros recuperados de la BBDD

        public function __construct(){

            require_once("modelo/conectar.php");
            $this->db = Conectar::conexion();
            $this->datos = array();
        }

        public function get_datos(){

            $sql = "SELECT * FROM tareas";
            $consulta = $this->db->query($sql);
            while ($registro = $consulta->fetch_assoc()){
                $this->datos[] = $registro;
            }
            return $this->datos;
        }

        public function login($user, $password){
            $login = false;
            $sql = "SELECT * FROM usuarios WHERE correo = '$user' AND password = '$password'";
            if($consulta = $this->db->query($sql)){
                if($consulta->num_rows > 0){
                    $login = true;
                }
            }
            return $login;
        }

        public function borrar($nombre){
            $sql = "DELETE FROM tareas WHERE titulo = '$nombre'";
            if($this->db->query($sql)){
                    $sql1 = "DELETE FROM tareas WHERE titulo = '$nombre'";
                    return $this->db->query($sql1);
                    
                }
                return false;
            }

        public function insertar($titulo, $descripcion, $estado, $fecha, $correo){

                $sql = "INSERT INTO tareas VALUES ('$titulo', '$descripcion', '$estado', '$fecha', '$correo')";
                if($this->db->query($sql)){
                    return $this->db->query($sql);

                    }
                    return false;
            }   
    }

?>