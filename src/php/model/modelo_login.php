<?php

require_once getcwd() . '/src/php/config/db.php';

class ModeloLogin {
    private $conexion;

    public function __construct() {
        $this->conexion = $this->conexion();
    }

    private function conexion() {
        $conexion = new mysqli(HOST, USER, PASSWORD, DATABASE);
        $conexion->set_charset('utf8');
        return $conexion;
    }

    public function login($correo, $password) {
        $sql = "SELECT * FROM Usuarios WHERE correo = ?";
        $stmt = $this->conexion->prepare($sql);
        $stmt->bind_param("s", $correo);
        $stmt->execute();
        $resultado = $stmt->get_result();
        $stmt->close();

        if ($resultado !== false && $resultado->num_rows > 0) {
            $row = $resultado->fetch_assoc();
            $storedHashedPassword = $row['password_hash'];
            $inputHashedPassword = hash('sha256', $password);

            return ($inputHashedPassword === $storedHashedPassword) ? $row : false;
        }

        return false;
    }

    public function comprobarSuperAdmin() {
        $sql = "SELECT * FROM Usuarios WHERE perfil = 'a'";
        return $this->conexion->query($sql);
    }

    private function crearUsuario($correo, $password, $perfil) {
        $hashedPassword = hash('sha256', $password);
        $sql = "INSERT INTO Usuarios (correo, password_hash, perfil) VALUES (?, ?, ?)";
        $stmt = $this->conexion->prepare($sql);
        $stmt->bind_param("sss", $correo, $hashedPassword, $perfil);
        $stmt->execute();
        $stmt->close();
    }

    public function crearSuperAdmin($correo, $password) {
        $this->crearUsuario($correo, $password, 'a');
    }

    public function crearAdmin($correo, $password) {
        $this->crearUsuario($correo, $password, 'b');
        // Asigna el minijuego al subadministrador
        $subadminId = $this->conexion->insert_id;

        $minijuegoId = $_POST['minijuego'];

        $sql = "UPDATE Minijuegos SET subadministrador_id = ? WHERE idMinijuego = ?";
        $stmt = $this->conexion->prepare($sql);
        $stmt->bind_param("ii", $subadminId, $minijuegoId);
        $stmt->execute();
        $stmt->close();
    }

    public function obtenerMinijuegosSubadmin($idSubadmin) {
        $sql = "SELECT * FROM Minijuegos WHERE subadministrador_id = ?";
        $stmt = $this->conexion->prepare($sql);
        $stmt->bind_param("i", $idSubadmin);
        $stmt->execute();
        $resultado = $stmt->get_result();
        $stmt->close();

        if ($resultado !== false && $resultado->num_rows > 0) {
            $minijuegos = array();

            while ($row = $resultado->fetch_assoc()) {
                $minijuegos[] = $row;
            }

            return $minijuegos;
        }

        return array();
    }

    public function obtenerMinijuegosSinSubadmin() {
        $sql = "SELECT * FROM Minijuegos WHERE subadministrador_id IS NULL";
        $resultado = $this->conexion->query($sql);

        if ($resultado !== false && $resultado->num_rows > 0) {
            $minijuegos = array();

            while ($row = $resultado->fetch_assoc()) {
                $minijuegos[] = $row;
            }

            return $minijuegos;
        }

        return array(); 
    }


}

?>
