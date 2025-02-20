<?php
$host = "localhost";
$usuario = "root";
$contrasena = "";
$base_de_datos = "bd_sistema_cobros";

$mysqli= new mysqli($host, $usuario, $contrasena, $base_de_datos);


// Crear la conexión
$conn = new mysqli($host, $usuario, $contrasena, $base_de_datos);

// Verificar la conexión
if ($mysqli->connect_error) {
    die("Error de conexión: " . $mysqli->connect_error);
}
?>