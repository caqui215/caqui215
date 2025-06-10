<?php
// index.php
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Caninos y Felinos</title>

    <style>
        /* Video de fondo */
        #video-background {
            position: fixed;
            top: 0;
            left: 0;
            width: 100vw;
            height: 100vh;
            object-fit: cover;
            z-index: -12;
            pointer-events: none;
        }

        html, body {
            margin: 0;
            padding: 0;
            font-family: 'Poppins', 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            height: 100%;
            color: white;
        }

        .container {
            width: 100%;
            padding: 0 20px;
            box-sizing: border-box;
        }

        /* Marco giratorio animado */
        .rotating-border {
            border: 5px solid transparent;
            border-radius: 0;
            animation: rotateBorder 6s linear infinite;
            background-color: transparent; /* fondo transparente */
        }

        @keyframes rotateBorder {
            0% {
                border-image: linear-gradient(360deg,rgb(238, 46, 145),rgb(23, 219, 245)) 1;
            }
            100% {
                border-image: linear-gradient(360deg,rgb(93, 251, 45),rgb(23, 27, 245)) 1;
            }
        }

        .header {
            text-align: center; /* centrado */
            padding: 30px 20px;
            background-color: transparent;
            color: #fff;
            text-shadow: 1px 1px 5px rgba(0,0,0,0.8);
        }

        .header h3 {
            margin: 0;
            font-size: 18px;
            text-transform: uppercase;
            font-weight: 600;
            color: #f9a825;
        }

        .header h2 {
            margin: 5px 0 0;
            font-size: 40px;
            font-weight: 700;
            color: #fff;
            text-shadow: 2px 2px 8px rgba(0,0,0,0.8);
        }

        .img-banner {
            margin-top: 15px;
        }

        .img-banner img {
            width: 200px;
            filter: drop-shadow(2px 2px 3px rgba(0,0,0,0.7));
        }

        .nav {
            display: flex;
            justify-content: center;
            gap: 50px;
            background-color: transparent;
            padding: 12px 0;
        }

        .nav a {
            color: #fff;
            font-weight: bold;
            text-decoration: none;
            text-shadow: 1px 1px 4px rgba(0,0,0,0.7);
            font-size: 18px;
            transition: color 0.3s ease;
        }

        .nav a:hover {
            text-decoration: underline;
            color: #fbc02d;
        }

        .info {
            display: flex;
            gap: 20px;
            padding: 20px 0 40px 0;
            flex-wrap: wrap;
        }

        .article {
            flex: 3;
            min-width: 280px;
        }

        .section {
            background-color: rgba(255, 255, 255, 0.15); /* muy transparente */
            border-radius: 12px;
            margin-bottom: 20px;
            padding: 20px;
            color: #fff;
            text-shadow: 1px 1px 3px rgba(0,0,0,0.8);
        }

        .section h2 {
            color: #fbc02d;
            margin-top: 0;
        }

        .preview {
            display: flex;
            align-items: center;
            gap: 15px;
            flex-wrap: wrap;
        }

        .preview p {
            flex: 1;
            font-size: 16px;
        }

        .preview img {
            width: 120px;
            height: auto;
            border-radius: 12px;
            filter: drop-shadow(1px 1px 3px rgba(0,0,0,0.6));
        }

        .section a {
            display: inline-block;
            margin-top: 10px;
            color: #fbc02d;
            text-decoration: none;
            font-weight: bold;
            text-shadow: 1px 1px 3px rgba(0,0,0,0.8);
        }

        .section a:hover {
            text-decoration: underline;
        }

        .aside {
            flex: 1;
            min-width: 280px;
            background-color: rgba(255, 255, 196, 0.15); /* amarillo transparente */
            padding: 20px;
            border-radius: 12px;
            color: #fff;
            text-shadow: 1px 1px 3px rgba(0,0,0,0.8);
        }

        .aside h2 {
            color: #fbc02d;
            margin-top: 0;
            font-weight: 700;
        }

        .aside form p {
            margin-bottom: 12px;
        }

        input[type="text"],
        input[type="number"],
        input[type="date"],
        input[type="time"] {
            width: 100%;
            padding: 8px;
            border: 1px solid rgba(255, 255, 255, 0.7);
            border-radius: 6px;
            background-color: rgba(255, 255, 255, 0.3);
            color: #000;
            font-weight: 600;
            font-size: 15px;
        }

        input[type="submit"] {
            width: 100%;
            background-color: rgba(67, 160, 71, 0.8);
            color: white;
            border: none;
            padding: 10px;
            margin-top: 10px;
            border-radius: 6px;
            font-weight: bold;
            cursor: pointer;
            transition: background-color 0.3s ease;
        }

        input[type="submit"]:hover {
            background-color: rgba(46, 125, 50, 0.9);
        }

        .aside a {
            display: block;
            text-align: center;
            margin-top: 10px;
            background-color: rgba(251, 192, 45, 0.8);
            padding: 8px;
            border-radius: 8px;
            color: white;
            text-decoration: none;
            font-weight: bold;
            transition: background-color 0.3s ease;
        }

        .aside a:hover {
            background-color: rgba(245, 127, 23, 0.9);
        }

        .footer {
            background-color: transparent;
            color: #fff;
            text-align: center;
            padding: 20px;
            text-shadow: 1px 1px 3px rgba(0,0,0,0.7);
            font-weight: 600;
            font-size: 16px;
        }

        /* Responsive */
        @media (max-width: 768px) {
            .info {
                flex-direction: column;
            }
        }
    </style>

    <!-- Fuente Poppins desde Google Fonts -->
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;600;700&display=swap" rel="stylesheet">

</head>
<body>

<!-- Video de fondo -->
<video autoplay muted loop playsinline id="video-background">
    <source src="video/fon1.mp4" type="video/mp4">
    Tu navegador no soporta el video de fondo.
</video>

<div class="container rotating-border">
    <header class="header">
        <h3>Centro Veterinario</h3>
        <h2>Caninos y Felinos</h2>
        <div class="img-banner">
            <img src="img/banner-cat-dog.png" alt="Perros y gatos">
        </div>
    </header>

    <nav class="nav">
        <a href="servicios.php">Servicios</a>
        <a href="productos.php">Productos</a>
        <a href="guarderia.php">Guardería</a>
        <a href="integrantes.php">Integrantes</a>
        <a href="ver_citas.php">Ver Citas</a>
    </nav>

    <div class="info">
        <article class="article">
            <section class="section">
                <h2>Cuidados y educación para su perro</h2>
                <div class="preview">
                    <p>Tu perro necesita una dieta equilibrada, rutinas de ejercicio diario, y socialización para desarrollar su personalidad saludable y obediente. ¡Un perro feliz es un perro activo!</p>
                    <img src="img/dog.png" alt="Perro feliz">
                </div>
                <a href="#">Ver más...</a>
            </section>
            <section class="section">
                <h2>Salir de viaje con su mascota</h2>
                <div class="preview">
                    <p>Antes de viajar, asegúrate de tener certificados de salud, vacunas y desparasitación actualizados. Algunas aerolíneas requieren requisitos adicionales.</p>
                    <img src="img/cat.png" alt="Gato viajero">
                </div>
                <a href="#">Ver más...</a>
            </section>
        </article>

        <aside class="aside">
            <h2>Solicitar cita médica</h2>
            <form action="guardar_cita.php" method="POST">
                <p>Mascota: <input type="text" name="mascota" required></p>
                <p>Edad: <input type="number" name="edad" required></p>
                <p>Raza: <input type="text" name="raza" required></p>
                <p>Amo: <input type="text" name="amo" required></p>
                <p>Fecha: <input type="date" name="fecha" required></p>
                <p>Hora: <input type="time" name="hora" required></p>
                <p><input type="submit" value="Validar cita"></p>
            </form>

            <a href="ver_citas.php">Ver citas registradas</a>
        </aside>
    </div>

    <footer class="footer">
        <p>Contáctanos</p>
        <p>Celular: 910275446</p>
        <p>Correo: ananiascaqui10@gmail.com</p>
    </footer>
</div>

</body>
</html>
