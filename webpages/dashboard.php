<?php

require_once "../bootstrap.php";
require_once "../PHP/Clases/Hotel.php";
require_once "../PHP/Clases/HotelRepository.php";


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
    <link rel="stylesheet" href="../css/style.css">
    <title>Schumacher Hotels</title>
</head>

<body>
    <nav class="navbar navbar-expand-lg navbar-dark  shadow">
        <div class="container">
            <a class="navbar-brand brand" href="#"><img src="../images/Logo/Logo.png" alt="Logo" class="logo-img"></a>
            <button class="navbar-toggler" data-bs-toggle="collapse" data-bs-target="#menu">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="menu">
                <ul class="navbar-nav mx-auto">
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" data-bs-toggle="dropdown">Hoteles</a>
                        <ul class="dropdown-menu">
                            <li><a class="dropdown-item">Madrid</a></li>
                            <li><a class="dropdown-item">París</a></li>
                            <li><a class="dropdown-item">Dubái</a></li>
                            <li><a class="dropdown-item">Maldivas</a></li>
                            <li><a class="dropdown-item">Nueva York</a></li>
                            <li><a class="dropdown-item">Tokio</a></li>
                            <li><a class="dropdown-item">Zúrich</a></li>
                        </ul>
                    </li>
                    <li class="nav-item"><a class="nav-link" href="#experiencias">Experiencias</a></li>
                    <li class="nav-item"><a class="nav-link" href="#estandar">Estándar 7</a></li>
                    <li class="nav-item"><a class="nav-link" href="#contacto">Contacto</a></li>
                </ul>
                <button class="btn btn-danger ms-lg-3" data-bs-toggle="modal" data-bs-target="#bookingModal">
                    Reservar
                </button>
            </div>
        </div>
    </nav>
    <section class="py-5">
        <div class="container">
            <div class="row">
                <?php foreach ($hoteles as $hotel): ?>
                    <div class="col-lg-3 col-md-4 p-2">
                        <div class="card h-100">
                            <img src="../images/Carrousel/Hotel.png" class="card-img-top">
                            <div class="card-body d-flex flex-column">
                                <p class="card-text descripcion"><?php echo $hotel->getDescripcion() ?></p>
                                <p class="card-text">Ciudad: <?php echo $hotel->getCiudad() ?> </p>
                                <p class="card-text">País: <?php echo $hotel->getPais() ?> </p>
                                <form action="" method="POST">
                                    <input type="hidden" id="id_hotel">
                                    <input type="submit" value="Ver Hotel" class="btn btn-hotel w-100 mt-auto"></input>
                                </form>
                            </div>
                        </div>
                    </div>
                <?php endforeach; ?>
            </div>
        </div>
    </section>
    <footer id="contacto" class="py-4">
        <div class="container text-center">
            <h5><img src="../images/Logo/Logo.png" alt="Logo" class="img-footer"></h5>
            <p>Madrid · París · Dubái · Maldivas · Nueva York · Tokio · Zúrich</p>
            <p> info@schumacherhotels.com | +34 912 345 678</p>
            <p class="small">© 2026 Schumacher – Colección Privada</p>
        </div>
    </footer>
</body>

</html>