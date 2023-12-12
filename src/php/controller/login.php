<?php

class LoginController {

    private $modelo;

    public function __construct() {
        require_once 'model/modelo_login.php';
        $this->modelo = new ModeloLogin();
    }

    


}

?>