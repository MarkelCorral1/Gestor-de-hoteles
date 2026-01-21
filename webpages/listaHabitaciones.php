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
    <title>Habitaciones</title>
</head>

<body>

    <?php include INCLUDES_PATH . '/navbar.php'; ?>

    <div class="container my-4">
        <div class="row">

            <aside class="col-12 col-md-2 mb-4 mb-md-0 categories-nav d-flex flex-column justify-content-center" >
                <div class="w-100">
                    <h6 class="category-label">Categorías</h6>
                    <ul class="single-categories list-unstyled m-0 p-0 
                           d-flex flex-row flex-md-column 
                           justify-content-center align-items-center align-items-md-start 
                           gap-3">
                        <li class="categorie-item active">Stroll</li>
                        <li class="categorie-item">Lando</li>
                        <li class="categorie-item">Alonso</li>
                        <li class="categorie-item">Senna</li>
                        <li class="categorie-item">Schumacher</li>
                    </ul>
                </div>

            </aside>

            <main class="col-12 col-md-10">

                <div class="d-grid gap-2"
                    style="display: grid; grid-template-columns: repeat(5, 1fr); /* 5 columnas iguales */ grid-template-rows: repeat(4, 1fr);    /* 4 filas iguales de altura */height: 600px; /* Altura TOTAL fija para escritorio */ ">
                    <div class="rounded-2 overflow-hidden position-relative"
                        style="grid-column: span 4; grid-row: span 3;">
                        <img src="<?= IMAGES_URL ?>/habitaciones/Stroll_1.png"
                            class="w-100 h-100 object-fit-cover position-absolute top-0 start-0" alt="Main">
                    </div>

                    <div class="d-flex flex-column gap-2" style="grid-column: span 1; grid-row: span 3;">
                        <div class="flex-fill rounded-2 overflow-hidden position-relative">
                            <img src="<?= IMAGES_URL ?>/habitaciones/Stroll_2.png"
                                class="w-100 h-100 object-fit-cover position-absolute top-0 start-0" alt="Side 1">
                        </div>
                        <div class="flex-fill rounded-2 overflow-hidden position-relative">
                            <img src="<?= IMAGES_URL ?>/habitaciones/Stroll_3.png"
                                class="w-100 h-100 object-fit-cover position-absolute top-0 start-0" alt="Side 2">
                        </div>
                    </div>

                    <div class="rounded-2 overflow-hidden position-relative" style="grid-row: 4;">
                        <img src="<?= IMAGES_URL ?>/habitaciones/Stroll_4.png"
                            class="w-100 h-100 object-fit-cover position-absolute top-0 start-0" alt="Thumb 1">
                    </div>
                    <div class="rounded-2 overflow-hidden position-relative" style="grid-row: 4;">
                        <img src="<?= IMAGES_URL ?>/habitaciones/Stroll_2.png"
                            class="w-100 h-100 object-fit-cover position-absolute top-0 start-0" alt="Thumb 2">
                    </div>
                    <div class="rounded-2 overflow-hidden position-relative" style="grid-row: 4;">
                        <img src="<?= IMAGES_URL ?>/habitaciones/Stroll_3.png"
                            class="w-100 h-100 object-fit-cover position-absolute top-0 start-0" alt="Thumb 3">
                    </div>
                    <div class="rounded-2 overflow-hidden position-relative" style="grid-row: 4;">
                        <img src="<?= IMAGES_URL ?>/habitaciones/Stroll_1.png"
                            class="w-100 h-100 object-fit-cover position-absolute top-0 start-0" alt="Thumb 4">
                    </div>
                    <div class="rounded-2 overflow-hidden position-relative" style="grid-row: 4;">
                        <img src="<?= IMAGES_URL ?>/habitaciones/Stroll_2.png"
                            class="w-100 h-100 object-fit-cover position-absolute top-0 start-0" alt="Thumb 5">
                    </div>
                </div>
            </main>
        </div>
    </div>

    <?php include INCLUDES_PATH . '/footer.php'; ?>

</body>

</html>