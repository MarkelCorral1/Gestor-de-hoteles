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
        <img src="<?= IMAGES_URL ?>/Carrousel/Zona de trofeos.png" alt="Fondo de inicio">
    </video>

    <div class="login-container">
        <div class="login-card">
            <div class="logo-container">
                <a href="index.php">
                    <img src="<?= IMAGES_URL ?>/Logo/Logo.png" alt="Schumacher Logo">
                </a>
            </div>

            <h1 class="login-title">Crea tu Cuenta</h1>
            <p class="login-subtitle">Únete a la Excelencia</p>

            <div class="login-form">
                <form id="sessionStart">

                <div class="mb-3">
                        <label for="username" class="session-label">Correo Electronico</label>
                        <input type="text" class="form-control session-control" id="correo" name="correo" placeholder="usuario@gmail.com" required>
                    </div>

                    <div class="mb-3">
                        <label for="username" class="session-label">Nombre de usuario</label>
                        <input type="text" class="form-control session-control" id="username" name="username" placeholder="Usuario" required>
                    </div>

                    <div class="mb-3">
                        <label for="password-1" class="session-label">Contraseña</label>
                        <input type="password" class="form-control session-control" id="password-1" name="password-1" placeholder="••••••••" required>
                    </div>

                    <div class="mb-4">
                        <label for="password-2" class="session-label">Confirmar Contraseña</label>
                        <input type="password" class="form-control session-control" id="password-2" name="password-2" placeholder="••••••••" required>
                    </div>

                    <button type="submit" class="btn-login">Registrarse</button>
                </form>

                <div class="divider">
                    <span>O</span>
                </div>

                <div class="registrarse-link">
                    <span>¿Ya tienes cuenta?</span>
                    <a href="inicioSesion.php"> Inicia Sesión</a>
                </div>

                <div id="respuesta-form" class="mt-3 text-center"></div>
            </div>
   
        </div>
    </div>

    <script src="<?= JS_URL ?>/registro.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>