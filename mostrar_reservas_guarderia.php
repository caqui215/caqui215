-- Active: 1749505830300@@127.0.0.1@3306@veterinaria
<?php
$host = "localhost";
$user = "root";
$password = "";
$database = "veterinaria";

$conn = new mysqli($host, $user, $password, $database);
if ($conn->connect_error) {
    die("Error de conexión: " . $conn->connect_error);
}

$sql = "SELECT * FROM reservas_guarderia ORDER BY fecha_ingreso DESC";
$result = $conn->query($sql);
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8" />
    <title>Reservas Guardería Canina</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <style>
        .background-video {
            position: fixed;
            top: 0;
            left: 0;
            min-width: 100%;
            min-height: 100%;
            object-fit: cover;
            z-index: -1;
        }
        .bg-overlay {
            background-color: rgba(0,0,0,0.15);
            padding: 20px;
            border-radius: 10px;
        }
        body, html {
            height: 100%;
            margin: 0;
            font-family: 'Poppins', sans-serif;
            background: transparent;
            color: white;
        }
        nav, section, footer {
            position: relative;
            z-index: 2;
        }
        h1, h2, p {
            color: #fbc02d;
        }
        .btn-primary {
            background-color: #fbc02d;
            color: black;
            font-weight: 700;
            padding: 12px 30px;
            border-radius: 10px;
            text-decoration: none;
            transition: background-color 0.3s;
        }
        .btn-primary:hover {
            background-color: #f9a825;
        }
        table {
            background-color: rgba(255,255,255,0.1);
            border-radius: 10px;
            overflow: hidden;
        }
        th, td {
            color: white;
        }
        th {
            background-color: rgba(255, 193, 7, 0.8);
            color: black;
        }
        tr:nth-child(even) {
            background-color: rgba(255,255,255,0.05);
        }
        tr:hover {
            background-color: rgba(255,255,255,0.15);
        }
        footer {
            background-color: rgba(0,0,0,0.5);
            padding: 20px;
            text-align: center;
            font-size: 14px;
            color: white;
            margin-top: 50px;
            border-top: 1px solid #fbc02d;
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
<nav class="bg-overlay max-w-7xl mx-auto px-4 py-5 mb-10 flex justify-between items-center">
    <h1 class="text-3xl font-extrabold tracking-wide">Reservas Guardería</h1>
    <a href="guarderia.php" class="btn-primary">Volver a Guardería</a>
</nav>

<!-- TABLA DE RESERVAS -->
<section class="max-w-7xl mx-auto px-4 mb-20 bg-overlay p-6 rounded-lg shadow-lg">
    <h2 class="text-3xl font-bold mb-6 text-center">Listado de Reservas</h2>

    <div class="overflow-x-auto">
        <table class="min-w-full text-sm text-left">
            <thead>
                <tr>
                    <th class="px-6 py-3">Dueño</th>
                    <th class="px-6 py-3">Teléfono</th>
                    <th class="px-6 py-3">Mascota</th>
                    <th class="px-6 py-3">Raza</th>
                    <th class="px-6 py-3">Fecha Ingreso</th>
                    <th class="px-6 py-3">Registrado</th>
                </tr>
            </thead>
            <tbody>
                <?php if ($result && $result->num_rows > 0): ?>
                    <?php while ($row = $result->fetch_assoc()): ?>
                        <tr>
                            <td class="px-6 py-4"><?= htmlspecialchars($row['nombre_dueno']) ?></td>
                            <td class="px-6 py-4"><?= htmlspecialchars($row['telefono']) ?></td>
                            <td class="px-6 py-4"><?= htmlspecialchars($row['nombre_mascota']) ?></td>
                            <td class="px-6 py-4"><?= htmlspecialchars($row['raza']) ?></td>
                            <td class="px-6 py-4"><?= htmlspecialchars($row['fecha_ingreso']) ?></td>
                            <td class="px-6 py-4"><?= htmlspecialchars($row['creado_en']) ?></td>
                        </tr>
                    <?php endwhile; ?>
                <?php else: ?>
                    <tr>
                        <td colspan="6" class="px-6 py-4 text-center text-yellow-300">No hay reservas registradas.</td>
                    </tr>
                <?php endif; ?>
            </tbody>
        </table>
    </div>
</section>

<!-- FOOTER -->
<footer>
    © 2025 Centro Veterinario Caninos y Felinos. Todos los derechos reservados.
</footer>

</body>
</html>

<?php $conn->close(); ?>
