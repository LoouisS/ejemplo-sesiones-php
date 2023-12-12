<?php

class ModeloLogin {

    private $conexion;
    
    function __construct() {
        $this->conexion = $this->conexion();
    }

    public function conexion() {
        $this->conexion = new mysqli("localhost", "root", "", "bd_proyecto");
        $this->conexion->set_charset("utf8");

        return $this->conexion;
    }
}

?>