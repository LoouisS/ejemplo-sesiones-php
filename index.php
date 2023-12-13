<?php

session_start();

require_once getcwd() . "/src/php/config/config.php";


if (!isset($_GET['controlador'])) {
    $_GET["controlador"] = constant("DEFAULT_CONTROLLER");
}

if (!isset($_GET['action'])) {
    $_GET["action"] = constant("DEFAULT_ACTION");
}

// Ruta al controlador

$ruta_controlador = "src/php/controller/" . strtolower($_GET["controlador"]) . ".php";

// Cargamos el controlador

require getcwd() . "/" . $ruta_controlador;

$nombre_controlador = $_GET["controlador"] . "Controller";
$controlador = new $nombre_controlador();

$datos["datos"] = array();
if (method_exists($controlador, $_GET["action"])) {
    $datos["datos"] = $controlador->{$_GET["action"]}();
}

if ($_GET["action"] == constant("DEFAULT_ACTION")) {
    require_once getcwd() . "/src/php/view/" . $controlador->vista . ".php";
} else {
    require_once getcwd() . "/src/php/view/vista_" . $controlador->vista . ".php";
}
?>
