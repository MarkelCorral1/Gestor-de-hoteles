<?php
require_once '../config/config.php';
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
    <title>Document</title>
</head>

<body>

    <?php include INCLUDES_PATH . '/navbar.php'; ?>

    <div class="container my-4">
        <!-- Fila Superior: Altura forzada 400px para evitar huecos -->
        <!-- 'overflow-hidden' evita que si una imagen es muy grande rompa el redondeado -->
        <div class="row g-2 mb-2 overflow-hidden" style="height: 400px;">

            <!-- Imagen Principal (Izquierda) -->
            <div class="col-md-8 h-100">
                <!-- h-100 y w-100 para que llene su celda -->
                <img src="<?= IMAGES_URL ?>/habitaciones/Stroll_1.png" class="gallery__main-img h-100 w-100"
                    alt="Vista Principal">
            </div>

            <!-- Columna Derecha (2 imágenes apiladas) -->
            <div class="col-md-4 h-100 d-flex flex-column gap-2">

                <!-- Foto lateral superior (50% altura) -->
                <!-- Metemos la img en un div h-50 para controlar mejor el overflow -->
                <div class="h-50 w-100 overflow-hidden">
                    <img src="<?= IMAGES_URL ?>/habitaciones/Stroll_2.png" class="gallery__side-img h-100 w-100"
                        alt="Detalle 1">
                </div>

                <!-- Foto lateral inferior (50% altura) -->
                <div class="h-50 w-100 overflow-hidden">
                    <img src="<?= IMAGES_URL ?>/habitaciones/Stroll_3.png" class="gallery__side-img h-100 w-100"
                        alt="Detalle 2">
                </div>
            </div>
        </div>

        <!-- Fila Inferior: Tira de miniaturas -->
        <!-- row-cols-5 asegura distribución exacta en 5 columnas -->
        <div class="row g-2 row-cols-5">
            <div class="col">
                <img src="<?= IMAGES_URL ?>/habitaciones/Stroll_4.png" class="gallery__thumb" alt="Vista baño">
            </div>
            <div class="col">
                <!-- Repetimos imagen o ponemos otra diferente -->
                <img src="<?= IMAGES_URL ?>/habitaciones/Stroll_2.png" class="gallery__thumb" alt="Vista cama">
            </div>
            <div class="col">
                <img src="<?= IMAGES_URL ?>/habitaciones/Stroll_3.png" class="gallery__thumb" alt="Detalle escritorio">
            </div>
            <div class="col">
                <img src="<?= IMAGES_URL ?>/habitaciones/Stroll_1.png" class="gallery__thumb" alt="Vista terraza">
            </div>

        </div>
    </div>

    <?php include INCLUDES_PATH . '/footer.php'; ?>

</body>

</html>