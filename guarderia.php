<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8" />
    <title>Guardería Canina - Centro Veterinario Caninos y Felinos</title>
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
        .service-card {
            background: rgba(255,255,255,0.1);
            border-radius: 12px;
            padding: 20px;
            text-align: center;
            box-shadow: 0 8px 24px rgba(0,0,0,0.3);
            transition: transform 0.3s;
        }
        .service-card:hover {
            transform: translateY(-8px);
            background: rgba(255,255,255,0.15);
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
    <h1 class="text-3xl font-extrabold tracking-wide">Guardería Canina</h1>
    <a href="index.php" class="btn-primary">Volver al Inicio</a>
    <div class="text-center mt-4">
    <a href="mostrar_reservas_guarderia.php" class="btn-primary">Ver Reservas</a>
</div>

</nav>


<!-- SECCIÓN PRESENTACIÓN -->
<section class="max-w-7xl mx-auto px-4 text-center mb-16">
    <h2 class="text-4xl font-extrabold mb-4">Cuidado Profesional para tu Mejor Amigo</h2>
    <p class="text-yellow-400 max-w-3xl mx-auto text-lg leading-relaxed">
        Nuestra guardería canina ofrece un ambiente seguro, divertido y saludable para que tu mascota
        se sienta feliz mientras tú estás ocupado. Atención personalizada, juegos, y mucho cariño.
    </p>
</section>

<!-- SECCIÓN SERVICIOS -->
<section class="max-w-7xl mx-auto px-4 mb-20">
    <h2 class="text-3xl font-bold mb-10 text-center">Servicios que Ofrecemos</h2>
    <div class="grid grid-cols-1 md:grid-cols-3 gap-10">
        <div class="service-card">
            <img src="img/zj.jpg" alt="Juegos para perros" class="mx-auto rounded-lg mb-5 w-full h-48 object-cover shadow-lg" />
            <h3 class="text-2xl font-semibold mb-3">Zona de Juegos</h3>
            <p>Amplias áreas de juego supervisadas para que tu perro socialice y se divierta.</p>
        </div>
        <div class="service-card">
            <img src="img/AP.webp" alt="Cuidado personalizado" class="mx-auto rounded-lg mb-5 w-full h-48 object-cover shadow-lg" />
            <h3 class="text-2xl font-semibold mb-3">Atención Personalizada</h3>
            <p>Control de alimentación, descanso y necesidades especiales según cada mascota.</p>
        </div>
        <div class="service-card">
            <img src="img/HB.jpg" alt="Higiene de mascotas" class="mx-auto rounded-lg mb-5 w-full h-48 object-cover shadow-lg" />
            <h3 class="text-2xl font-semibold mb-3">Higiene y Baños</h3>
            <p>Servicios de baño y limpieza para mantener a tu perro siempre fresco y saludable.</p>
        </div>
    </div>
</section>

<!-- SECCIÓN RESERVAS -->
<section class="max-w-7xl mx-auto px-4 mb-20 bg-overlay p-8 rounded-lg shadow-lg">
    <h2 class="text-3xl font-bold mb-6 text-center">Reserva tu Espacio</h2>
    <form action="procesar_reserva_guarderia.php" method="POST" class="max-w-xl mx-auto space-y-6 text-black">
        <div>
            <label for="nombre" class="block font-semibold mb-1">Nombre del dueño</label>
            <input type="text" id="nombre" name="nombre_dueno" required class="w-full rounded px-4 py-2" placeholder="Tu nombre completo" />
        </div>
        <div>
            <label for="telefono" class="block font-semibold mb-1">Teléfono</label>
            <input type="tel" id="telefono" name="telefono" required class="w-full rounded px-4 py-2" placeholder="Número de contacto" />
        </div>
        <div>
            <label for="mascota" class="block font-semibold mb-1">Nombre de la mascota</label>
            <input type="text" id="mascota" name="nombre_mascota" required class="w-full rounded px-4 py-2" placeholder="Nombre de tu perro" />
        </div>
        <div>
            <label for="raza" class="block font-semibold mb-1">Raza</label>
            <input type="text" id="raza" name="raza" required class="w-full rounded px-4 py-2" placeholder="Raza de la mascota" />
        </div>
        <div>
            <label for="fecha" class="block font-semibold mb-1">Fecha de ingreso</label>
            <input type="date" id="fecha" name="fecha_ingreso" required class="w-full rounded px-4 py-2" />
        </div>
        <div class="text-center">
            <button type="submit" class="btn-primary">Enviar Reserva</button>
        </div>
    </form>
</section>

<!-- FOOTER -->
<footer>
    © 2025 Centro Veterinario Caninos y Felinos. Todos los derechos reservados.
</footer>

</body>
</html>
