<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Equipo Estudiantil - Tec. Glicerio Gómez Igarza</title>
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
        h1, h2 {
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
        .card {
            background: rgba(255,255,255,0.1);
            border-radius: 12px;
            padding: 20px;
            box-shadow: 0 8px 24px rgba(0,0,0,0.3);
            text-align: center;
            transition: transform 0.3s;
        }
        .card:hover {
            transform: translateY(-5px);
            background: rgba(255,255,255,0.15);
        }
        .card h3 {
            color: #fbc02d;
        }
        .social-icons a {
            margin: 0 8px;
            color: white;
            font-size: 1.2rem;
            transition: color 0.3s;
        }
        .social-icons a:hover {
            color: #fbc02d;
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
    <h1 class="text-3xl font-extrabold tracking-wide">Instituto Superior Glicerio Gómez Igarza</h1>
    <a href="index.php" class="btn-primary">Volver al Inicio</a>
</nav>

<!-- SECCIÓN INTEGRANTES -->
<section class="max-w-7xl mx-auto px-4 mb-20">
    <h2 class="text-3xl font-bold mb-10 text-center">Nuestro Equipo Estudiantil</h2>
    <div class="grid grid-cols-1 md:grid-cols-2 gap-10">

        <!-- Integrante 1 -->
        <div class="card">
            <img src="img/ananias.jpg" alt="Ananias Caqui Pablo" class="w-32 h-32 mx-auto rounded-full mb-4 object-cover border-4 border-yellow-400">
            <h3 class="text-2xl font-semibold mb-2">Ananias, Caqui Pablo</h3>
            <p>Celular: 910275446 - 917119125</p>
            <p>Gmail: ananiascaqui10@gmail.com</p>
            <p>Programa Estudio: Arquitectura de Plataformas y Servicios de TI</p>
            <div class="social-icons mt-3">
                <a href="https://facebook.com/ana" target="_blank">Facebook</a>
                <a href="https://instagram.com/ana" target="_blank">Instagram</a>
                <a href="https://linkedin.com/in/ana" target="_blank">LinkedIn</a>
            </div>
        </div>

        <!-- Integrante 2 -->
        <div class="card">
            <img src="img/crisel.jpg" alt="Arturo Ramos Inga" class="w-32 h-32 mx-auto rounded-full mb-4 object-cover border-4 border-yellow-400">
            <h3 class="text-2xl font-semibold mb-2">Crisel Ines, Bravo Medrano</h3>
            <p>Celular: 925255041</p>
            <p>Gmail: bravomedranocrisel2004@gmail.com</p>
            <p>Programa Estudio: Arquitectura de Plataformas y Servicios de TI</p>
            <div class="social-icons mt-3">
                <a href="https://facebook.com/luis" target="_blank">Facebook</a>
                <a href="https://instagram.com/luis" target="_blank">Instagram</a>
                <a href="https://linkedin.com/in/luis" target="_blank">LinkedIn</a>
            </div>
        </div>

        <!-- Integrante 3 -->
        <div class="card">
            <img src="img/luz.jpg" alt="Nombre del Integrante 3" class="w-32 h-32 mx-auto rounded-full mb-4 object-cover border-4 border-yellow-400">
            <h3 class="text-2xl font-semibold mb-2">Luz Milagros Silva, Rojas </h3>
            <p>Celular: 989608173</p>
            <p>Gmail: silvarojasluz@gmail.com </p>
            <p>Programa Estudio: Arquitectura de Plataformas y Servicios de TI</p>
            <div class="social-icons mt-3">
                <a href="https://facebook.com/carla" target="_blank">Facebook</a>
                <a href="https://instagram.com/carla" target="_blank">Instagram</a>
                <a href="https://linkedin.com/in/carla" target="_blank">LinkedIn</a>
            </div>
        </div>

        <!-- Integrante 4 -->
        <div class="card">
            <img src="img/arturo.jpg" alt="Jorge Ruiz Salazar" class="w-32 h-32 mx-auto rounded-full mb-4 object-cover border-4 border-yellow-400">
            <h3 class="text-2xl font-semibold mb-2">Arturo Emiliano, Ramos Inga</h3>
            <p>Celular: 929950757</p>
            <p>Email: arturoemilianoramosinga@gmail.com</p>
            <p>Programa Estudio: Arquitectura de Plataformas y Servicios de TI</p>
            <div class="social-icons mt-3">
                <a href="https://facebook.com/jorge" target="_blank">Facebook</a>
                <a href="https://instagram.com/jorge" target="_blank">Instagram</a>
                <a href="https://linkedin.com/in/jorge" target="_blank">LinkedIn</a>
            </div>
        </div>

    </div>
</section>

<!-- FOOTER -->
<footer>
    © 2025 Instituto de Educación Superior Tecnológico Público "Glicerio Gómez Igarza". Todos los derechos reservados.
</footer>

</body>
</html>
