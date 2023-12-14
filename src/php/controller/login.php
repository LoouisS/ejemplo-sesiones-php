<?php

class LoginController {

    private $modelo;

    public function __construct() {
        require_once getcwd() . '/src/php/model/modelo_login.php';
        $this->modelo = new ModeloLogin();
        $resultadoConsulta = $this->modelo->comprobarSuperAdmin();

        if ($resultadoConsulta !== false && $resultadoConsulta->num_rows > 0) {
            $_SESSION['vista'] = 'vista_login';
        } else {
            $_SESSION['vista'] = 'vista_super_admin';
        }
    }

    public function mostrarLogin() {
        if ($_SESSION['vista'] === 'vista_login') {
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
            $_SESSION['perfil'] = $perfil;

            if ($perfil === 'a') {
                $_SESSION['vista'] = 'vista_admin';

                $minijuegos = $this->modelo->obtenerMinijuegosSinSubadmin();
                $_SESSION['minijuegos'] = $minijuegos;

                require_once 'src/php/view/vista_admin.php';
            } elseif ($perfil === 'b') {
                $_SESSION['vista'] = 'vista_subadmin';

                // Mostramos los minijuegos que tiene asignados el subadministrador
                $minijuegos = $this->modelo->obtenerMinijuegosSubadmin($resultado['idUsuario']);

                require_once 'src/php/view/vista_subadmin.php';
            }
        } else {
            header('Location: index.php?controller=login&action=mostrarLogin&error=1');
        }
    }

    public function cerrarSesion() {
        session_unset();
        session_destroy();
        header('Location: index.php?controller=login&action=mostrarLogin');
    }

    public function altaSuperAdmin() {
        $correo = $_POST['correo'];
        $password = $_POST['password'];
        $this->modelo->crearSuperAdmin($correo, $password);
        $_SESSION['vista'] = 'vista_login';
        $this->mostrarLogin();
    }

    public function altaSubAdmin() {
        $correo = $_POST['correo'];
        $password = $_POST['password'];

        $this->modelo->crearAdmin($correo, $password);

        $_SESSION['vista'] = 'vista_login';
        $this->mostrarLogin();
    }
}

?>
