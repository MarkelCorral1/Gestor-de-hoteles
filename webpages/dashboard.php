<?php
require_once '../config/config.php';

require_once "../bootstrap.php";
require_once PHP_PATH . "/Clases/Hotel.php";
require_once PHP_PATH . "/Clases/HotelRepository.php";


$hoteles = $entityManager->getRepository('Hotel')->findAll();

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

<body>
    <?php include INCLUDES_PATH . '/navbar.php'; ?> <!-- NAVBAR -->
    <section class="py-5">
        <div class="container">
            <div class="row">
                <?php foreach ($hoteles as $hotel): ?>
                    <div class="col-lg-3 col-md-4 p-2">
                        <div class="card h-100">
                            <img src="<?= IMAGES_URL ?>/Hoteles/<?= $hotel->getCiudad() ?>.png" class=" card-img-top">
                            <div class="card-body d-flex flex-column">
                                <p class="card-text descripcion"><?php echo $hotel->getDescripcion() ?></p>
                                <p class="card-text">Ciudad: <?php echo $hotel->getCiudad() ?> </p>
                                <p class="card-text">País: <?php echo $hotel->getPais() ?> </p>
                                <a href="listaHabitaciones.php?id_hotel=<?= $hotel->getId_hotel() ?>" data-id="<?= $hotel->getId_hotel() ?>" class="btn btn-hotel w-100 mt-auto">
                                    Ver Hotel
                                </a>
                            </div>
                        </div>
                    </div>
                <?php endforeach; ?>
            </div>
        </div>
    </section>
    <?php include INCLUDES_PATH . '/footer.php'; ?> <!-- FOOTER -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const botonesVer = document.querySelectorAll('.btn-hotel');

            let datosReserva = JSON.parse(sessionStorage.getItem('datos-reserva'));

            botonesVer.forEach(boton => {
                boton.addEventListener('click', function(e) {
                    const idHotel = this.getAttribute('data-id');

                    datosReserva.destino = idHotel;
                    sessionStorage.setItem('datos-reserva', JSON.stringify(datosReserva));
                });
            });
        });
    </script>
</body>

</html>