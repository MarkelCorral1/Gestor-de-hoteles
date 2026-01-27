<?php
require_once '../config/config.php';

if (isset($_COOKIE["usuario"])) {
    header('Location: index.php');
    exit();
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <link
        href="https://fonts.googleapis.com/css2?family=Montserrat:wght@300;400;600&family=Playfair+Display:wght@700&display=swap"
        rel="stylesheet">
    <link rel="stylesheet" href="<?= CSS_URL ?>">
    <title>Schumacher Hotels</title>
</head>

<body class="inicioSesion">
    <video autoplay muted loop playsinline class="video-bg">
        <source src="<?= IMAGES_URL ?>/Carrousel/videolujo.webm" type="video/webm">
        <!-- Fallback: si el video no carga, se se muestra una imagen -->
        <img src="<?= IMAGES_URL ?>/Carrousel/Zona de trofeos.png" alt="Fondo de inicio">
    </video>
    <div class="login-container">
        <div class="login-card">
            <div class="logo-container">
            <a href="<?= PAGINAS_URL ?>/index.php">
        <img src="<?= IMAGES_URL ?>/Logo/Logo.png"  alt="Schumacher Logo">
            </a>
        </div>


            <h1 class="login-title">Bienvenido</h1>
            <p class="login-subtitle">Acceso Exclusivo</p>

        <div class="login-form">
            <h3 class="text-center text-white mb-4">Iniciar Sesión</h3>
            <form class="session" id="sessionStart">
    
                <div class="mb-3">
                    <label for="username" class="form-label text-white">Nombre de usuario</label>
                    <input type="text" class="form-control" id="username" name="username" required>
                </div>
    
                <div class="mb-3">
                    <label for="password" class="form-label text-white">Contraseña</label>
                    <input type="password" class="form-control" id="password" name="password" required>
                </div>
                
                <div class="remember-me">
                    <input type="checkbox" id="remember">
                    <label for="remember">Recordar mi sesión</label>
                </div>
                                <div class="forgot-password">
                    <a href="#">¿Olvidaste tu contraseña?</a>
                </div>


                    <button type="submit" class="btn-login">Inicio Sesión</button>
                
            </form>

            <div class="divider">
                <span>O</span>
            </div>


            <div class="registrarse-link">
                <span>¿No tienes una cuenta?</span>
                <a href="<?= PAGINAS_URL ?>/registro.php"> Regístrate aquí</a>
            </div>

            <div id="respuesta-form" class="mt-3 text-center"></div>
        </div>
    </div>
    <script src="<?= JS_URL ?>/inicioSesion.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>