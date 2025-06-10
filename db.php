<?php
$host = "localhost";
$usuario = "root";
$contrasena = ""; // cambia si tu MySQL tiene contraseña
$base_de_datos = "veterinaria";

$conn = new mysqli($host, $usuario, $contrasena, $base_de_datos);

if ($conn->connect_error) {
    die("Conexión fallida: " . $conn->connect_error);
}
?>
