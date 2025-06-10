<?php
// ver_reservas.php
$host = "localhost";
$user = "root";       // Cambia según tu configuración
$password = "";       // Cambia según tu configuración
$dbname = "veterinaria";

$conn = new mysqli($host, $user, $password, $dbname);

if ($conn->connect_error) {
    die("Error de conexión: " . $conn->connect_error);
}

$sql = "SELECT * FROM reservas ORDER BY fecha DESC";
$result = $conn->query($sql);
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8" />
    <title>Reservas - Centro Veterinario Caninos y Felinos</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <style>
        /* Video fondo */
        .background-video {
            position: fixed;
            top: 0;
            left: 0;
            min-width: 100%;
            min-height: 100%;
            object-fit: cover;
            z-index: -1;
        }
        /* Overlay */
        .bg-overlay {
            background-color: rgba(0,0,0,0.1);
            padding: 20px;
            border-radius: 10px;
        }

        /* Tabla con efecto glass */
        table {
            width: 100%;
            border-collapse: collapse;
            background-color: rgba(255,255,255,0.1);
            backdrop-filter: blur(6px);
            color: white;
            border-radius: 10px;
            overflow: hidden;
        }
        th, td {
            padding: 12px 15px;
            text-align: center;
        }
        th {
            background-color: #fbc02d;
            color: black;
            text-transform: uppercase;
        }
        tbody tr:nth-child(even) {
            background-color: rgba(255,255,255,0.05);
        }
        tbody tr:hover {
            background-color: rgba(255,255,255,0.15);
        }

        /* Botón regresar */
        .btn-regresar {
            background-color: #fbc02d;
            color: black;
            font-weight: bold;
            padding: 12px 25px;
            border-radius: 10px;
            text-decoration: none;
            display: inline-block;
            margin-top: 20px;
            transition: background-color 0.3s;
        }
        .btn-regresar:hover {
            background-color: #f9a825;
        }

        /* Títulos */
        h1 {
            text-align: center;
            color: #fbc02d;
            font-weight: 800;
            margin-bottom: 30px;
        }

        body, html {
            height: 100%;
            margin: 0;
            font-family: 'Poppins', sans-serif;
            background: transparent;
            color: white;
        }

        nav, section, footer, .btn-regresar, h1, table {
            position: relative;
            z-index: 2;
        }

    </style>
</head>
<body>

<!-- VIDEO DE FONDO -->
<video autoplay muted loop class="background-video">
    <source src="video/fon1.mp4" type="video/mp4" />
    Tu navegador no soporta la etiqueta video.
</video>

<!-- NAV -->
<nav class="bg-overlay max-w-7xl mx-auto px-4 py-4 mb-6">
    <div class="flex justify-between items-center">
        <h1 class="text-2xl font-bold text-yellow-600">Centro Veterinario Caninos y Felinos</h1>
        <a href="index.php" class="text-yellow-600 hover:underline text-lg">Regresar al Inicio</a>
    </div>
</nav>

<!-- CONTENIDO -->
<section class="max-w-7xl mx-auto px-4">
    <div class="bg-overlay p-6 rounded-lg shadow-lg">
        <h1>Reservas Registradas</h1>

        <?php if ($result->num_rows > 0): ?>
            <div class="overflow-x-auto">
                <table>
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Nombre</th>
                            <th>Email</th>
                            <th>Teléfono</th>
                            <th>Servicio</th>
                            <th>Fecha de reserva</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php while($row = $result->fetch_assoc()): ?>
                        <tr>
                            <td><?= htmlspecialchars($row['id']) ?></td>
                            <td><?= htmlspecialchars($row['nombre']) ?></td>
                            <td><?= htmlspecialchars($row['email']) ?></td>
                            <td><?= htmlspecialchars($row['telefono']) ?></td>
                            <td><?= htmlspecialchars($row['servicio']) ?></td>
                            <td><?= htmlspecialchars($row['fecha']) ?></td>
                        </tr>
                        <?php endwhile; ?>
                    </tbody>
                </table>
            </div>
        <?php else: ?>
            <p class="text-center text-yellow-400 font-semibold mt-4">No hay reservas registradas aún.</p>
        <?php endif; ?>

        <div class="text-center">
            <a href="index.php" class="btn-regresar">← Regresar al Inicio</a>
        </div>
    </div>
</section>

<!-- FOOTER -->
<footer class="text-white text-center py-6 mt-12 relative z-2">
    © 2025 Centro Veterinario Caninos y Felinos. Todos los derechos reservados.
</footer>

</body>
</html>

<?php
$conn->close();
?>
