<?php
$host = "localhost";
$user = "root"; // Cambiar si tu usuario es otro
$password = ""; // Cambiar por tu contraseña
$database = "veterinaria";

// Crear conexión
$conn = new mysqli($host, $user, $password, $database);

// Verificar conexión
if ($conn->connect_error) {
    die("Conexión fallida: " . $conn->connect_error);
}

// Recoger datos del formulario
$nombre_dueno = $conn->real_escape_string($_POST['nombre_dueno']);
$telefono = $conn->real_escape_string($_POST['telefono']);
$nombre_mascota = $conn->real_escape_string($_POST['nombre_mascota']);
$raza = $conn->real_escape_string($_POST['raza']);
$fecha_ingreso = $conn->real_escape_string($_POST['fecha_ingreso']);

// Insertar en la base de datos
$sql = "INSERT INTO reservas_guarderia (nombre_dueno, telefono, nombre_mascota, raza, fecha_ingreso)
        VALUES ('$nombre_dueno', '$telefono', '$nombre_mascota', '$raza', '$fecha_ingreso')";

if ($conn->query($sql) === TRUE) {
    echo "<h2>✅ Reserva enviada con éxito.</h2><br>";
    echo "<a href='guarderia.php'>Volver</a>";
} else {
    echo "❌ Error al guardar: " . $conn->error;
}

$conn->close();
?>
