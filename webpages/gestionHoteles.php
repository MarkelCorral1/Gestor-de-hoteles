<?php
    require_once '../config/config.php';
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Schumacher Hotels</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@300;400;600&family=Playfair+Display:wght@700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="<?= CSS_URL ?>/style.css">
</head>
<body>
    <?php include INCLUDES_PATH  . '/navbar.php'; ?> <!-- NAVBAR -->
    
    <div class="container min-vh-100">
        <h1>Gestión de Hoteles</h1>
        <div class="row">
            <!-- Agregar la lógica para mostrar y gestionar los hoteles y las habitaciones de los hoteles (En un desplegable) -->
        </div>
    </div>

    <?php include INCLUDES_PATH  . '/footer.php'; ?> <!-- FOOTER -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>