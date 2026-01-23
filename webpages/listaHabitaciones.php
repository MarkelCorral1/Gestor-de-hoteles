<?php
require_once '../config/config.php';

require_once "../bootstrap.php";
require_once '../PHP/Clases/Hotel.php';
require_once '../PHP/Clases/HotelRepository.php';

$id_hotel = $_GET['id_hotel'] ?? '1';

$hotel = $entityManager->find('Hotel', $id_hotel);
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
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">

    <link rel="stylesheet" href="<?= CSS_URL ?>">
    <title>Habitaciones</title>
</head>

<body>

    <?php include INCLUDES_PATH . '/navbar.php'; ?>

    <!-- Boton modal reserva -->
    <button 
    type="button" 
    class="btn btn-primary" 
    data-bs-toggle="modal" 
    data-bs-target="#modal-reserva"
    style="position: fixed; bottom: 20px; left: 20px; z-index: 1050;">
    Reservar
</button>
    <div class="container my-4">
        <h3 class="text-center display-5 fw-bold text-uppercase my-4"><?= $hotel->getCiudad() ?>, <?= $hotel->getPais() ?></h3>
        <div class="row">

            <aside class="col-12 col-md-2 mb-4 mb-md-0 categories-nav d-flex flex-column justify-content-center" >
                <div class="w-100">
                    <h6 class="category-label">Categorías</h6>
                    <ul class="single-categories list-unstyled m-0 p-0 
                           d-flex flex-row flex-md-column 
                           justify-content-center align-items-center align-items-md-start 
                           gap-3">
                        <li class="categorie-item active" data-categoria="stroll" >Stroll</li>
                        <li class="categorie-item" data-categoria="lando">Lando</li>
                        <li class="categorie-item" data-categoria="alonso">Alonso</li>
                        <li class="categorie-item" data-categoria="senna">Senna</li>
                        <li class="categorie-item" data-categoria="schumacher">Schumacher</li>
                    </ul>
                </div>

            </aside>

            <main class="col-12 col-md-10">

                <div class="d-grid gap-2 img-categoria"
                    style="display: grid; grid-template-columns: repeat(5, 1fr); /* 5 columnas iguales */ grid-template-rows: repeat(4, 1fr);    /* 4 filas iguales de altura */height: 600px; /* Altura TOTAL fija para escritorio */ ">
                    <div class="rounded-2 overflow-hidden position-relative"
                        style="grid-column: span 4; grid-row: span 3;">
                        <img src="<?= IMAGES_URL ?>/habitaciones/Stroll_1.png"
                            class="w-100 h-100 object-fit-cover position-absolute top-0 start-0">
                    </div>

                    <div class="d-flex flex-column gap-2" style="grid-column: span 1; grid-row: span 3;">
                        <div class="flex-fill rounded-2 overflow-hidden position-relative">
                            <img src="<?= IMAGES_URL ?>/habitaciones/Stroll_2.png"
                                class="w-100 h-100 object-fit-cover position-absolute top-0 start-0">
                        </div>
                        <div class="flex-fill rounded-2 overflow-hidden position-relative">
                            <img src="<?= IMAGES_URL ?>/habitaciones/Stroll_3.png"
                                class="w-100 h-100 object-fit-cover position-absolute top-0 start-0">
                        </div>
                    </div>

                    <div class="rounded-2 overflow-hidden position-relative" style="grid-row: 4;">
                        <img src="<?= IMAGES_URL ?>/habitaciones/Stroll_4.png"
                            class="w-100 h-100 object-fit-cover position-absolute top-0 start-0">
                    </div>
                    <div class="rounded-2 overflow-hidden position-relative" style="grid-row: 4;">
                        <img src="<?= IMAGES_URL ?>/habitaciones/Stroll_5.png"
                            class="w-100 h-100 object-fit-cover position-absolute top-0 start-0">
                    </div>
                    <div class="rounded-2 overflow-hidden position-relative" style="grid-row: 4;">
                        <img src="<?= IMAGES_URL ?>/habitaciones/Stroll_6.png"
                            class="w-100 h-100 object-fit-cover position-absolute top-0 start-0">
                    </div>
                    <div class="rounded-2 overflow-hidden position-relative" style="grid-row: 4;">
                        <img src="<?= IMAGES_URL ?>/habitaciones/Stroll_7.png"
                            class="w-100 h-100 object-fit-cover position-absolute top-0 start-0">
                    </div>
                    <div class="rounded-2 overflow-hidden position-relative" style="grid-row: 4;">
                        <img src="<?= IMAGES_URL ?>/habitaciones/Stroll_8.png"
                            class="w-100 h-100 object-fit-cover position-absolute top-0 start-0">
                    </div>
                </div>

                <div id="info-categoria" class="mt-5 p-4 bg-white rounded shadow-sm border-start border-4 border-danger">
                    <div class="d-flex justify-content-between align-items-center mb-4">
                        <div>
                            <h2 id="cat-titulo" class="display-6 fw-bold text-uppercase m-0">Stroll</h2>
                            <p class="text-muted mb-0">
                                <i class="bi bi-arrows-fullscreen"></i> <span id="cat-metros">30</span> m² | 
                                <i class="bi bi-door-open"></i> <span id="cat-camas">2</span> Camas
                            </p>
                        </div>
                        <div class="text-end">
                            <p class="h6 text-muted mb-0">Desde</p>
                            <span id="cat-precio" class="h1 fw-bold text-dark">500</span><span class="h3 fw-bold">€</span>
                            <p class="text-muted small">por noche</p>
                        </div>
                    </div>

                    <hr>

                    <div class="row">
                        <div class="col-12">
                            <h5 class="fw-bold mb-3">Servicios Incluidos</h5>
                            <!-- Servicios -->
                            <div id="servicios-lista" class="d-flex flex-wrap align-items-center justify-content-evenly gap-2">
                                
                            </div>
                        </div>
                    </div>
                </div>
            </main>
        </div>
    </div>

    <!-- Modal reserva -->
    <div class="modal fade" id="modal-reserva" tabindex="-1">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h1 class="modal-title fs-5" id="exampleModalLabel">Reserva - <?= $hotel->getCiudad() ?>, <?= $hotel->getPais() ?></h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                </div>
            <div class="modal-body">
                <form id="form-reserva">
                    <input type="hidden" name="id_hotel" id="reserva-id-hotel" value="<?= $hotel->getId_hotel() ?>">
                    <input type="hidden" name="id_categoria" id="reserva-id-categoria" value="1">
                    <label for="reserva-fecha-entrada">Fecha de entrada</label>
                    <div class="mb-3"><input type="date" name="fecha_inicio" class="form-control" id="reserva-fecha-entrada"></div>
                    <label for="reserva-fecha-salida">Fecha de salida</label>
                    <div class="mb-3"><input type="date" name="fecha_final" class="form-control" id="reserva-fecha-salida"></div>
                    <label for="reserva-personas">Número de personas</label>
                    <div class="mb-3">
                        <select name="numero_personas" class="form-select" id="reserva-personas">
                            <option value="1">1</option>
                            <option value="2">2</option>
                            <option value="3">3</option>
                            <option value="4">4</option>
                        </select>
                    </div>
                    <button type="submit" class="btn btn-primary">Comprobar disponibilidad</button>
                </form>
            </div>
            <div class="modal-footer">
                <h3 id="reserva-total"></h3>
                <form action="<?= PHP_URL ?>/crearReserva.php" method="post">
                    <button type="submit" class="btn btn-primary">Reservar</button>
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cerrar</button>
                </form>
            </div>
            </div>
        </div>
    </div>

    <?php include INCLUDES_PATH . '/footer.php'; ?>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
    <script src="<?= JS_URL ?>/datosCategorias.js"></script>
    <script src="<?= JS_URL ?>/modalReserva.js"></script>
</body>

</html>