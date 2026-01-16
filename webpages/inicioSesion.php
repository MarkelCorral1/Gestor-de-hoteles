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
    <link rel="stylesheet" href="<?= CSS_URL ?>/style.css">
    <title>Schumacher Hotels</title>
</head>

<body class="inicioSesion">
    <?php include INCLUDES_PATH  . '/navbar.php'; ?> <!-- NAVBAR -->
    <section class="min-vh-100">
        <div class="container-session border rounded shadow-sm justify-content-center align-items-center p-4 mt-5">
            <h3 class="text-center mb-4">Iniciar Sesión</h3>
            <form class="session" id="sessionStart">
    
                <div class="mb-3">
                    <label for="username" class="form-label">Nombre de usuario</label>
                    <input type="text" class="form-control" id="username" name="username" required>
                </div>
    
                <div class="mb-3">
                    <label for="password" class="form-label">Contraseña</label>
                    <input type="password" class="form-control" id="password" name="password" required>
                </div>
    
                <div class="text-center">
                    <button type="submit" class="btn btn-dark">Inicio Sesión</button>
                </div>
                
            </form>
            <div class="text-center mb-4 mt-5">
                <button type="button" class="btn btn-dark"><a href="registro.php">Registrarse</a></button>
            </div>
            <div class="d-flex justify-content-center mt-4">
                <img src="<?= IMAGES_URL ?>/Logo/Logo.png" class="rounded" alt="Logotipo" width="60">
            </div>
            <div id="respuesta-form" class="text-center bg-opacity-25 rounded"></div>
        </div>
    </section>

    <?php include INCLUDES_PATH  . '/footer.php'; ?> <!-- FOOTER -->

    <script src="<?= JS_URL ?>/inicioSesion.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>