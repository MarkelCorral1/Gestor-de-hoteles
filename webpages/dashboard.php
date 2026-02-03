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
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.1/font/bootstrap-icons.css">

<style>
    /* RESET Y FONDO SECCIÓN */
    .royelle-section { 
        background: linear-gradient(180deg, black 80px, #cab59d 110px, #d5c2ac 125px);
        padding: 80px 0 !important; 
        font-family: 'Montserrat', sans-serif;
    }

    /* CABECERA DE SECCIÓN */
    .royelle-subtitle { color: #a60000; letter-spacing: 4px; font-weight: 700; font-size: 0.8rem; margin: 0; }
    .royelle-title { font-family: 'Playfair Display', serif; font-size: 2.8rem; color: #1a1a1a; margin-top: 10px; }
    .royelle-line { width: 50px; height: 2px; background: #a60000; margin: 20px auto 50px; }

    /* CARD DESIGN */
    .royelle-card { 
        background: white !important; 
        border-radius: 20px !important; 
        overflow: hidden !important; 
        box-shadow: 0 15px 45px rgba(0,0,0,0.08) !important;
        border: none !important;
        transition: transform 0.4s ease;
    }
    .royelle-card:hover { transform: translateY(-10px); }

    /* IMAGEN */
    .royelle-img-container { height: 280px !important; position: relative; overflow: hidden; }
    .royelle-img-container img { width: 100% !important; height: 100% !important; object-fit: cover !important; }
    
    .royelle-badge {
        position: absolute; bottom: 20px; left: 20px;
        background: #2c4a44; color: white; padding: 6px 15px;
        font-size: 0.7rem; text-transform: uppercase; border-radius: 5px; font-weight: 600;
    }

    /* CONTENIDO */
    .royelle-content { padding: 30px !important; }
    .royelle-top { display: flex; justify-content: space-between; align-items: center; margin-bottom: 10px; }
    .stars { color: #a60000; letter-spacing: 2px; }
    .rating { font-weight: 700; font-size: 0.9rem; color: #1a1a1a; }
    
    .hotel-name { font-family: 'Playfair Display', serif !important; font-size: 1.8rem !important; color: #1a1a1a !important; margin: 10px 0 !important; }
    .location-text { color: #888; font-size: 0.9rem; margin-bottom: 20px; }

    /* ICONOS DE CARACTERÍSTICAS */
    .royelle-icons { 
        display: flex; 
        justify-content: space-between; 
        border-top: 1px solid #eee; 
        border-bottom: 1px solid #eee;
        padding: 15px 0 !important; 
        margin: 20px 0 !important;
    }
    .royelle-icons span { font-size: 0.75rem; color: #666; display: flex; align-items: center; gap: 5px; }
    .royelle-icons i { color: #a60000; font-size: 1rem; }

    /* BOTÓN */
    .royelle-action-btn { 
        display: block !important;
        text-align: center !important;
        padding: 15px !important;
        border: 1px solid #1a1a1a !important;
        border-radius: 12px !important;
        color: #1a1a1a !important;
        text-decoration: none !important;
        font-weight: 700 !important;
        font-size: 0.8rem !important;
        letter-spacing: 1px;
        transition: 0.3s;
    }
    .royelle-action-btn:hover { background: #1a1a1a !important; color: white !important; }

    /* HERO */
    .hero-luxury {
        height: 60vh;
        background: linear-gradient(rgba(0,0,0,0.5), rgba(0,0,0,0.5)), url('https://images.unsplash.com/photo-1542314831-068cd1dbfeeb?q=80&w=2070') center/cover no-repeat;
        display: flex; align-items: center; justify-content: center;
    }
    .subtitle-hero { color: #a60000; letter-spacing: 8px; font-weight: 600; font-size: 0.9rem; display: block; margin-bottom: 10px; }
</style>

<body>
    <?php include INCLUDES_PATH . '/navbar.php'; ?>

  <div class="hero-luxury">
    <div class="container text-center">
        <span class="subtitle-hero">SCHUMACHER SELECTION</span>
        <h1 class="display-1 font-playfair text-white">Experience Excellence</h1>
    </div>
</div>

<section class="royelle-section">
    <div class="container">
        <div class="text-center mb-5">
            <br>
            <h2 class="royelle-title">El lujo en tu ciudad favorita</h2>
            <div class="royelle-line"></div>
        </div>

        <div class="row">
            <?php foreach ($hoteles as $hotel): ?>
                <div class="col-lg-4 col-md-6 mb-5">
                    <div class="royelle-card">
                        <div class="royelle-img-container">
                            <img src="<?= IMAGES_URL ?>/Hoteles/<?= $hotel->getCiudad() ?>.png" alt="<?= $hotel->getCiudad() ?>">
                            <div class="royelle-badge">7 Stars Hotel</div>
                        </div>
                        
                        <div class="royelle-content">
                            <div class="royelle-top">
                                <span class="stars">★★★★★★★</span>
                                <span class="rating">7.0</span>
                            </div>
                            <h3 class="hotel-name"><?php echo $hotel->getCiudad() ?></h3>
                            <p class="location-text"><?php echo $hotel->getPais() ?></p>
                            
                            <div class="royelle-icons">

                            </div>

                            <a href="<?= PAGINAS_URL ?>/listaHabitaciones.php?id_hotel=<?= $hotel->getId_hotel() ?>" 
                               class="royelle-action-btn btn-hotel" 
                               data-id="<?= $hotel->getId_hotel() ?>">
                                RESERVAR <i class="bi bi-arrow-right"></i>
                            </a>
                        </div>
                    </div>
                </div>
            <?php endforeach; ?>
        </div>
    </div>
</section>
    <?php include INCLUDES_PATH . '/footer.php'; ?>
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