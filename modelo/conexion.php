<?php
$servidor = "localhost";
$nombreusuario = "root";
$password = "";
$database = "sisil";

$conexion = new mysqli($servidor, $nombreusuario, $password, $database);
$conexion->set_charset("utf8");
?>