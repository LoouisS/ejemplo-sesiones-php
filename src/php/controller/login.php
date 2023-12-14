<?php

class LoginController {

    private $modelo;
    public $vista;

    public function __construct() {
        require_once getcwd() .  '/src/php/model/modelo_login.php';
        $this->modelo = new ModeloLogin();
        $resultadoConsulta = $this->modelo->comprobarSuperAdmin();
    
        if ($resultadoConsulta !== false && $resultadoConsulta->num_rows > 0) {
            $this->vista = 'vista_login';
        } else {
            $this->vista = 'vista_super_admin';
        }
    }

    public function mostrarLogin() {
        if ($this->vista === 'vista_login') {
            require_once 'src/php/view/vista_login.php';
        } else {
            require_once 'src/php/view/vista_super_admin.php';
        }
    }

    public function login() {
        $correo = $_POST['correo'];
        $password = $_POST['password'];

        $resultado = $this->modelo->login($correo, $password);    
        if ($resultado !== false) {
            $perfil = $resultado['perfil'];
            if ($perfil === 'a') {
                $this->vista = 'vista_admin';
                require_once 'src/php/view/vista_admin.php';
            } elseif ($perfil === 'b') {
                $this->vista = 'vista_subadmin';
                require_once 'src/php/view/vista_subadmin.php';
            } 
        } else {
            header('Location: index.php?controller=login&action=mostrarLogin&error=1');
        }
    }
    

    public function altaSuperAdmin() {
        $correo = $_POST['correo'];
        $password = $_POST['password'];
        $this->modelo->crearSuperAdmin($correo, $password);
        $this->vista = 'vista_login';
        $this->mostrarLogin();
    }

    public function altaSubAdmin() {
        $correo = $_POST['correo'];
        $password = $_POST['password'];
        $this->modelo->crearAdmin($correo, $password);
        $this->vista = 'vista_login';
        $this->mostrarLogin();
    }




}

?>
