<?php

session_start();

if (!isset($_GET["controlador"])) {
    $_GET["controlador"] = constant("DEFAULT_CONTROLLER");
}

// Si no hay acción en la URL, se usa la acción por defecto
if (!isset($_GET["action"])) {
    $_GET["action"] = constant("DEFAULT_ACTION");
}

// Se crea el nombre del controlador
$controller = $_GET["controlador"] . "Controller";

// Se crea el nombre del archivo que contiene el controlador

$controllerFile = "src/php/controller/" . $controller . ".php";



?>