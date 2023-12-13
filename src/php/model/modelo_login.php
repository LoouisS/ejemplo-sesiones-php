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
        $sql = "SELECT * FROM usuarios WHERE correo = ? AND password_hash = ?";
        $stmt = $this->conexion->prepare($sql);
        $stmt->bind_param("ss", $correo, $password);
        $stmt->execute();

        $result = $stmt->get_result();

        if ($result->num_rows > 0) {
            return $result->fetch_assoc(); 
        } else {
            return null; 
        }
    }


}