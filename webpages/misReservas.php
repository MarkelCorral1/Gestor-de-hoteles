<?php
require_once '../config/config.php';
require_once '../bootstrap.php';

if (!isset($_COOKIE["usuario"])) {
    header('Location: index.php');
    exit();
}
?>

<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@300;400;600&family=Playfair+Display:wght@700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="<?= CSS_URL ?>">
    <title>Mis Reservas - Schumacher Hotels</title>
</head>

<body>
    <?php include INCLUDES_PATH . '/navbar.php'; ?>

    <section class="min-vh-100 py-5">
        <div class="container">
            <h1 class="reservas-titulo">Mis Reservas</h1>
            
            <div id="mensajeError" class="reservas-error alert" style="display: none;"></div>
            
            <div id="reservasContainer" class="reservas-container row"></div>
            
            <div id="mensajeVacio" class="reservas-vacio" style="display: none;">
                <h5>No tienes reservas aún. <a href="<?= PAGINAS_URL ?>/dashboard.php">Haz una reserva ahora</a></h5>
            </div>

        </div>
    </section>

    <?php include INCLUDES_PATH . '/footer.php'; ?>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
    <script src="<?= JS_URL ?>/misReservas.js"></script>
</body>

</html>
