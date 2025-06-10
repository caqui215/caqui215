<?php
include 'db.php';
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Citas Registradas - Caninos y Felinos</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <style>
        body, html {
            height: 100%;
            margin: 0;
            font-family: 'Poppins', sans-serif;
        }

        .background-video {
            position: fixed;
            top: 0;
            left: 0;
            min-width: 100%;
            min-height: 100%;
            object-fit: cover;
            z-index: -1;
        }

        nav, section, footer {
            position: relative;
            z-index: 2;
        }

        .bg-overlay {
            background-color: rgba(0, 0, 0, 0);
            padding: 20px;
            border-radius: 10px;
        }

        .tabla {
            background-color: rgba(255, 255, 255, 0.06);
            backdrop-filter: blur(6px);
            color: #fff;
        }

        th {
            background-color: #fbc02d;
            color: black;
        }

        tr:nth-child(even) {
            background-color: rgba(255, 255, 255, 0.05);
        }

        .volver a {
            background-color: #fbc02d;
            padding: 10px 20px;
            color: black;
            text-decoration: none;
            border-radius: 10px;
            font-weight: bold;
            transition: background-color 0.3s;
        }

        .volver a:hover {
            background-color: #f9a825;
        }
    </style>
</head>
<body>

<!-- VIDEO DE FONDO -->
<video autoplay muted loop class="background-video">
    <source src="video/fon1.mp4" type="video/mp4">
    Tu navegador no soporta la etiqueta de video.
</video>

<!-- NAV -->
<nav class="bg-overlay">
    <div class="max-w-7xl mx-auto px-4 py-4 flex justify-between items-center">
        <h1 class="text-2xl font-bold text-yellow-600">Centro Veterinario Caninos y Felinos</h1>
        <a href="index.php" class="text-yellow-600 hover:underline text-lg">Regresar al Inicio</a>
    </div>
</nav>

<!-- CONTENIDO -->
<section class="max-w-7xl mx-auto py-12 px-4">
    <div class="bg-overlay">
        <h2 class="text-4xl font-bold text-center text-yellow-600 mb-10">Citas Registradas</h2>

        <div class="overflow-auto">
            <table class="w-full tabla text-sm rounded-xl overflow-hidden">
                <thead>
                    <tr>
                        <th class="p-3">ID</th>
                        <th class="p-3">Mascota</th>
                        <th class="p-3">Edad</th>
                        <th class="p-3">Raza</th>
                        <th class="p-3">Amo</th>
                        <th class="p-3">Fecha</th>
                        <th class="p-3">Hora</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    $sql = "SELECT * FROM citas ORDER BY fecha DESC, hora DESC";
                    $resultado = $conn->query($sql);

                    if ($resultado->num_rows > 0) {
                        while($fila = $resultado->fetch_assoc()) {
                            echo "<tr>";
                            echo "<td class='p-3'>" . $fila["id"] . "</td>";
                            echo "<td class='p-3'>" . htmlspecialchars($fila["mascota"]) . "</td>";
                            echo "<td class='p-3'>" . $fila["edad"] . "</td>";
                            echo "<td class='p-3'>" . htmlspecialchars($fila["raza"]) . "</td>";
                            echo "<td class='p-3'>" . htmlspecialchars($fila["amo"]) . "</td>";
                            echo "<td class='p-3'>" . $fila["fecha"] . "</td>";
                            echo "<td class='p-3'>" . $fila["hora"] . "</td>";
                            echo "</tr>";
                        }
                    } else {
                        echo "<tr><td colspan='7' class='text-center p-4'>No hay citas registradas</td></tr>";
                    }

                    $conn->close();
                    ?>
                </tbody>
            </table>
        </div>
    </div>
</section>

<!-- VOLVER -->
<div class="volver text-center my-8">
    <a href="index.php">← Volver al inicio</a>
</div>

<!-- FOOTER -->
<footer class="text-white text-center py-6">
    © 2025 Centro Veterinario Caninos y Felinos. Todos los derechos reservados.
</footer>

</body>
</html>
