<?php
    require_once getcwd() . '/src/php/config/db.php';
    
    class ModeloLogin {
        private $conexion;
    
        function __construct() {
            $this->conexion = $this->conexion();
        }
    
        public function conexion() {
            $this->conexion = new mysqli(HOST, USER, PASSWORD, DATABASE);
            $this->conexion->set_charset('utf8');
    
            return $this->conexion;
        }

        public function login($correo, $password) {
            $sql = "SELECT * FROM usuarios WHERE correo = ?";

            $stmt = $this->conexion->prepare($sql);
            $stmt->bind_param("s", $correo);
            $stmt->execute();
            $resultado = $stmt->get_result();
            $stmt->close();
        
            if ($resultado !== false && $resultado->num_rows > 0) {

                $row = $resultado->fetch_assoc();
                $storedHashedPassword = $row['password_hash'];
                $inputHashedPassword = hash('sha256', $password);

                // echo $storedHashedPassword;
                // echo "<br>";
                // echo $inputHashedPassword;
                // echo "<br>";
                // fkjsdfsd;
                if ($inputHashedPassword === $storedHashedPassword) {   
                    return $row;
                } else {
                    // Passwords do not match
                    return false;
                }
            } else {
                // No matching user found
                return false;
            }
        }
        

        public function comprobarSuperAdmin() {
            $sql = "SELECT * FROM usuarios WHERE perfil = 'a'";
            $resultado = $this->conexion->query($sql);
            return $resultado;
        }

        public function crearSuperAdmin($correo, $password) {
            $hashedPassword = hash('sha256', $password);
            $sql = "INSERT INTO Usuarios (correo, password_hash, perfil) VALUES (?, ?, 'a')";
            $stmt = $this->conexion->prepare($sql);
            $stmt->bind_param("ss", $correo, $hashedPassword);
            $stmt->execute();
            $stmt->close();
        }

        public function crearAdmin($correo, $password) {
            $hashedPassword = hash('sha256', $password);
            $sql = "INSERT INTO Usuarios (correo, password_hash, perfil) VALUES (?, ?, 'b')";
            $stmt = $this->conexion->prepare($sql);
            $stmt->bind_param("ss", $correo, $hashedPassword);
            $stmt->execute();
            $stmt->close();
        }
    }
?>