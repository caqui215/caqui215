<?php
include 'db.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $mascota = $_POST['mascota'];
    $edad = $_POST['edad'];
    $raza = $_POST['raza'];
    $amo = $_POST['amo'];
    $fecha = $_POST['fecha'];
    $hora = $_POST['hora'];

    $sql = "INSERT INTO citas (mascota, edad, raza, amo, fecha, hora)
            VALUES ('$mascota', '$edad', '$raza', '$amo', '$fecha', '$hora')";

    if ($conn->query($sql) === TRUE) {
        echo "<script>alert('Cita registrada exitosamente'); window.location.href='index.php';</script>";
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }

    $conn->close();
}
?>
