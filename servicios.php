<?php
// Configuración de la base de datos
$host = "localhost";
$dbname = "veterinaria";
$user = "root";
$pass = "";

try {
  $pdo = new PDO("mysql:host=$host;dbname=$dbname;charset=utf8", $user, $pass);
  $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
  die("Error de conexión a la base de datos: " . $e->getMessage());
}

$mensaje_enviado = false;

if ($_SERVER["REQUEST_METHOD"] == "POST") {
  $nombre = htmlspecialchars(trim($_POST['nombre']));
  $email = htmlspecialchars(trim($_POST['email']));
  $telefono = htmlspecialchars(trim($_POST['telefono']));
  $servicio = htmlspecialchars(trim($_POST['servicio']));

  if ($nombre && $email && $telefono && $servicio) {
    $stmt = $pdo->prepare("INSERT INTO reservas (nombre, email, telefono, servicio) VALUES (?, ?, ?, ?)");
    if ($stmt->execute([$nombre, $email, $telefono, $servicio])) {
      $mensaje_enviado = true;
    }
  }
}
?>

<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1" />
  <title>Centro Veterinario Caninos y Felinos - Servicios</title>
  <script src="https://cdn.tailwindcss.com"></script>
  <style>
    body, html {
      height: 100%;
      margin: 0;
      font-family: 'Poppins', sans-serif;
      z-index: 1;
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
      padding: 10px;
      border-radius: 50px;
    }

    input, button {
      background-color: rgba(0, 0, 0, 0);
      color: #fff;
    }

    input::placeholder {
      color: #ccc;
    }

    input:focus {
      outline: none;
      border-color: #fbc02d;
      background-color: rgba(0, 0, 0, 0);
    }

    .bg-white {
      background-color: rgba(0, 0, 0, 0) !important;
      backdrop-filter: blur(10px);
      color: #fff;
    }

    footer {
      background-color: rgba(0, 0, 0, 0);
      color: #fff;
    }

    .text-yellow-600 {
      color: #fbc02d;
    }

    .text-yellow-600:hover {
      color: #f9a825;
    }

    .bg-yellow-600 {
      background-color: #fbc02d;
    }

    .bg-yellow-600:hover {
      background-color: #f9a825;
    }

    .bg-green-100 {
      background-color: #d0f0c0;
      color: #2e7d32;
    }

    .bg-green-500 {
      background-color: #4caf50;
    }

    .bg-green-500:hover {
      background-color: #388e3c;
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
  <nav class="bg-overlay shadow-md mx-auto mt-4 max-w-6xl rounded-xl">
    <div class="flex justify-center space-x-12 py-4">
      <a href="index.php" class="text-yellow-600 text-lg font-semibold hover:underline">Inicio</a>
      <a href="ver_reservas.php" class="text-yellow-600 text-lg font-semibold hover:underline">Ver Reservas</a>
    </div>
  </nav>

  <!-- HERO -->
  <section class="text-center py-20 bg-overlay mt-10 max-w-4xl mx-auto">
    <h2 class="text-5xl font-bold mb-4 text-white">Bienvenido al Centro Veterinario</h2>
    <p class="text-lg text-white">Cuidamos a tus mascotas como parte de nuestra familia.</p>
  </section>

  <!-- SERVICIOS Y FORMULARIO -->
  <section id="servicios" class="max-w-7xl mx-auto py-16 px-4">
    <div class="bg-overlay">
      <h2 class="text-3xl font-bold text-center mb-10 text-yellow-600">Consulta y Reserva</h2>
      <div class="grid md:grid-cols-2 gap-8 items-start justify-center">

        <!-- Servicio -->
        <div class="bg-white rounded-xl shadow p-6 text-center">
          <img src="img/ca1.jpeg" alt="Consulta Médica" class="rounded-lg mb-4 w-[300px] h-[350px] object-cover mx-auto">
          <h3 class="text-xl font-semibold mb-2">Ananias Caqui Pablo</h3>
          <p class="mb-4">Desarrollador del pagina.</p>
          <a href="https://wa.me/51910275446" target="_blank" class="bg-green-500 text-white px-6 py-2 rounded hover:bg-green-600 inline-block">WhatsApp</a>
        </div>

        <!-- Formulario -->
        <div class="bg-white rounded-xl shadow p-6">
          <h2 class="text-2xl font-bold mb-6 text-yellow-600 text-center">Reservar Consulta Médica</h2>

          <?php if ($mensaje_enviado): ?>
            <div class="bg-green-100 text-green-800 p-4 rounded mb-6 text-center font-semibold">¡Tu reserva ha sido enviada con éxito!</div>
          <?php endif; ?>

          <form method="POST" action="#servicios" class="space-y-4">
            <input name="nombre" type="text" placeholder="Nombre completo" class="w-full p-3 border border-yellow-400 rounded-lg" required>
            <input name="email" type="email" placeholder="Correo electrónico" class="w-full p-3 border border-yellow-400 rounded-lg" required>
            <input name="telefono" type="tel" placeholder="Teléfono" class="w-full p-3 border border-yellow-400 rounded-lg" required>
            <input type="hidden" name="servicio" value="Consulta Médica">
            <button type="submit" class="bg-yellow-600 text-white px-6 py-3 rounded hover:bg-yellow-700 w-full">Enviar Reserva</button>
          </form>
        </div>

      </div>
    </div>
  </section>

  <!-- FOOTER -->
  <footer class="text-white py-6 text-center mt-10 rounded-t-xl max-w-7xl mx-auto">
    © 2025 Centro Veterinario Caninos y Felinos. Todos los derechos reservados.
  </footer>

</body>
</html>
