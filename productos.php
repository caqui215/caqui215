<?php
// CONEXIÓN A LA BASE DE DATOS
$servername = "localhost";
$username = "root";
$password = "";
$database = "veterinaria";

$conn = new mysqli($servername, $username, $password, $database);
if ($conn->connect_error) {
  die("Conexión fallida: " . $conn->connect_error);
}

// Lista de productos
$productos = [
  ['nombre' => "Alimento Premium", 'descripcion' => "Nutrición balanceada para perros adultos.", 'precio' => 65.00, 'imagen' => "img/producto1.jpg"],
  ['nombre' => "Juguete Mordedor", 'descripcion' => "Ideal para mantener dientes limpios.", 'precio' => 18.50, 'imagen' => "img/producto2.jpg"],
  ['nombre' => "Collar Antipulgas", 'descripcion' => "Protección efectiva por 8 meses.", 'precio' => 35.00, 'imagen' => "img/producto3.avif"],
  ['nombre' => "Shampoo Medicado", 'descripcion' => "Especial para piel sensible.", 'precio' => 22.90, 'imagen' => "img/producto4.jpg"],
  ['nombre' => "Arenero Higiénico", 'descripcion' => "Para gatos exigentes.", 'precio' => 55.00, 'imagen' => "img/producto5.jpg"],
  ['nombre' => "Comedero Doble", 'descripcion' => "Acero inoxidable antideslizante.", 'precio' => 30.00, 'imagen' => "img/producto6.jpg"],
  ['nombre' => "Cepillo para Mascotas", 'descripcion' => "Elimina el pelo muerto fácilmente.", 'precio' => 12.00, 'imagen' => "img/producto7.webp"],
  ['nombre' => "Transportadora Plástica", 'descripcion' => "Ideal para viajes seguros.", 'precio' => 80.00, 'imagen' => "img/producto8.jpg"],
  ['nombre' => "Rascador de Gato", 'descripcion' => "Divertido y resistente.", 'precio' => 48.00, 'imagen' => "img/producto9.webp"],
  ['nombre' => "Cortaúñas Profesional", 'descripcion' => "Diseñado para mascotas pequeñas.", 'precio' => 10.00, 'imagen' => "img/producto10.webp"],
  ['nombre' => "Pechera con Correa", 'descripcion' => "Tamaño mediano, ajustable.", 'precio' => 38.00, 'imagen' => "img/producto11.jpg"],
  ['nombre' => "Vitaminas Caninas", 'descripcion' => "Refuerza defensas y energía.", 'precio' => 29.90, 'imagen' => "img/producto12.jpg"],
  ['nombre' => "Arena para Gatos", 'descripcion' => "Ultra absorbente y sin olor.", 'precio' => 25.00, 'imagen' => "img/producto13.jpg"],
  ['nombre' => "Juguete de Cuerda", 'descripcion' => "Estimula el juego y la mordida.", 'precio' => 14.50, 'imagen' => "img/producto14.webp"],
  ['nombre' => "Bebedero Automático", 'descripcion' => "Agua fresca todo el día.", 'precio' => 40.00, 'imagen' => "img/producto15.jpg"],
  ['nombre' => "Toallitas Húmedas", 'descripcion' => "Limpieza rápida sin enjuague.", 'precio' => 9.90, 'imagen' => "img/producto16.webp"],
  ['nombre' => "Pelota Interactiva", 'descripcion' => "Se mueve sola para mayor diversión.", 'precio' => 33.00, 'imagen' => "img/producto17.avif"],
  ['nombre' => "Cama Acolchada", 'descripcion' => "Suave, lavable y resistente.", 'precio' => 75.00, 'imagen' => "img/producto18.png"],
  ['nombre' => "Kit Dental", 'descripcion' => "Cepillo y pasta dental para mascotas.", 'precio' => 19.00, 'imagen' => "img/producto19.jpg"],
  ['nombre' => "Collar Luminoso", 'descripcion' => "Para paseos nocturnos seguros.", 'precio' => 16.90, 'imagen' => "img/producto20.jpg"],
];

// Procesar compra
if ($_SERVER["REQUEST_METHOD"] === "POST" && isset($_POST['producto_id'], $_POST['metodo_pago'])) {
  $productoId = intval($_POST['producto_id']);
  $metodoPago = $_POST['metodo_pago'];

  if (isset($productos[$productoId])) {
    $producto = $productos[$productoId];
    $nombre = $producto['nombre'];
    $precio = floatval($producto['precio']);

    $stmt = $conn->prepare("INSERT INTO ventas (producto, precio, metodo_pago) VALUES (?, ?, ?)");
    $stmt->bind_param("sds", $nombre, $precio, $metodoPago);
    $stmt->execute();
    $stmt->close();

    $mensaje = "Producto agregado al carrito con éxito.";
  }
}
?>

<!-- HTML -->
<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1" />
  <title>Productos - Centro Veterinario</title>
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
      top: 0; left: 0;
      min-width: 100%; min-height: 100%;
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
    .bg-white {
      background-color: rgba(255, 255, 255, 0.05) !important;
      backdrop-filter: blur(6px);
      color: #fff;
    }
    footer {
      background-color: rgba(0, 0, 0, 0);
      color: #fff;
    }
    .text-yellow-600 { color: #fbc02d; }
    .text-yellow-600:hover { color: #f9a825; }
    .precio { color: #fbc02d; font-weight: bold; }
    .form-compra select, .form-compra button {
      margin-top: 10px;
    }
    .form-compra img {
      width: 100px;
      margin-top: 10px;
    }
  </style>
</head>
<body>

<video autoplay muted loop class="background-video">
  <source src="video/fon1.mp4" type="video/mp4">
</video>

<nav class="bg-overlay shadow-md">
  <div class="max-w-7xl mx-auto px-4 py-4 flex justify-between items-center">
    <h1 class="text-2xl font-bold text-yellow-600">Centro Veterinario Caninos y Felinos</h1>
    <a href="index.php" class="text-yellow-600 hover:underline text-lg">Regresar al Inicio</a>
  </div>
</nav>

<section class="max-w-7xl mx-auto py-16 px-4">
  <div class="bg-overlay">
    <h2 class="text-4xl font-bold text-center text-yellow-600 mb-12">Nuestros Productos</h2>

    <?php if (isset($mensaje)): ?>
      <div class="text-green-300 text-center font-semibold mb-6"><?= $mensaje ?></div>
    <?php endif; ?>

    <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-4 gap-6">
      <?php foreach ($productos as $index => $producto): ?>
        <div class="bg-white rounded-xl shadow p-4 text-center">
          <img src="<?= $producto['imagen'] ?>" alt="<?= $producto['nombre'] ?>" class="w-[200px] h-[200px] object-cover mx-auto mb-4 rounded-lg">
          <h3 class="text-lg font-semibold mb-2"><?= $producto['nombre'] ?></h3>
          <p class="text-sm mb-2"><?= $producto['descripcion'] ?></p>
          <span class="precio">S/ <?= number_format($producto['precio'], 2) ?></span>

          <!-- Formulario para agregar al carrito -->
          <form method="POST" class="form-compra">
            <input type="hidden" name="producto_id" value="<?= $index ?>">
            <select name="metodo_pago" class="w-full mt-3 text-black rounded p-2" required>
              <option value="BCP">BCP</option>
              <option value="YAPE">YAPE</option>
            </select>

            <div class="mt-2">
              <img src="img/bcp.jpg" alt="BCP" class="inline-block mr-2" style="width:40px;">
              <img src="img/yape.png" alt="Yape" class="inline-block" style="width:40px;">
            </div>

            <div class="text-sm mt-2">
              <p><strong>BCP:</strong> 999-888-777</p>
              <p><strong>YAPE:</strong> 988-777-666</p>
            </div>

            <button type="submit" class="mt-3 bg-yellow-500 hover:bg-yellow-600 text-black font-bold py-2 px-4 rounded-lg w-full">Agregar al Carrito</button>
          </form>
        </div>
      <?php endforeach; ?>
    </div>
  </div>
</section>

<footer class="text-white py-6 text-center">
  © 2025 Centro Veterinario Caninos y Felinos. Todos los derechos reservados.
</footer>

</body>
</html>
