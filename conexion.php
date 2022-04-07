<?php
$servidor = "localhost";
$user = "root";
$password = "";
$db="marvel";

// Conexion
$conexion = new mysqli($servidor, $user, $password,$db);

// Verificar conexion
if ($conexion->connect_error) {
    die("Algo salio mal: " . $conexion->connect_error);
}

//echo "Conectado con exito";

mysqli_set_charset($conexion,"utf8");


?>