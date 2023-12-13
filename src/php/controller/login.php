<?php
require_once getcwd() . '/src/php/model/modelo_login.php';
require_once getcwd() . '/src/php/view/vista_login.php';

class LoginController {

    private $modelo;
    public $vista;

    public function __construct() {
        require_once getcwd() .  '/src/php/model/modelo_login.php';
        $this->modelo = new ModeloLogin();
        $this->vista = 'vista_login';
    }

    public function mostrarLogin() {
        require_once 'src/php/view/vista_login.php'; // Corregimos la ruta de la vista
    }

    public function login() {
        $username = $_POST['correo'];
        $password = $_POST['password'];
    
        $login = $this->modelo->login($username, $password);
    
        if (is_array($login)) {
            $_SESSION['idUsuario'] = $login['idUsuario'];
            $_SESSION['correo'] = $login['correo'];
            $_SESSION['nombre'] = $login['nombre'];
            $_SESSION['perfil'] = $login['perfil'];

            $this->vista = $_SESSION['perfil'];
        } 
    }
    
    public function mostrarVista() {
        require_once 'src/php/view/vista_' . $this->vista . '.php';
    }
}
?>
