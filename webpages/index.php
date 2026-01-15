<?php
    require_once '../config/config.php';
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Schumacher Hotels</title>
</head>

<body>
    <!DOCTYPE html>
    <html lang="es">

    <head>
        <meta charset="UTF-8">
        <title>Schumacher | Colección Privada de Hoteles</title>
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
        <link
            href="https://fonts.googleapis.com/css2?family=Montserrat:wght@300;400;600&family=Playfair+Display:wght@700&display=swap"
            rel="stylesheet">
        <link rel="stylesheet" href="<?= CSS_URL ?>/style.css">
    </head>

    <body>
        <?php include INCLUDES_PATH  . '/navbar.php'; ?> <!-- NAVBAR -->

        <section class="hero-container position-relative">
            <!-- Carrusel de Fondo -->
            <div id="heroCarousel" class="carousel slide carousel-fade" data-bs-ride="carousel">
                <div class="carousel-inner">
                    <div class="carousel-item active" data-bs-interval="3000">
                        <div class="hero-slide"
                            style="background-image: url('<?= IMAGES_URL ?>/Carrousel/Gym\ Shumaccer.png');"></div>
                    </div>
                    <div class="carousel-item" data-bs-interval="3000">
                        <div class="hero-slide" style="background-image: url('<?= IMAGES_URL ?>/Carrousel/Hotel.png');"></div>
                    </div>
                    <div class="carousel-item" data-bs-interval="3000">
                        <div class="hero-slide"
                            style="background-image: url('<?= IMAGES_URL ?>/Carrousel/Restaurante\ shumacker.png');"></div>
                    </div>
                    <div class="carousel-item" data-bs-interval="3000">
                        <div class="hero-slide"
                            style="background-image: url('<?= IMAGES_URL ?>/Carrousel/Spa\ Shumacker.png');"></div>
                    </div>
                    <div class="carousel-item" data-bs-interval="3000">
                        <div class="hero-slide"
                            style="background-image: url('<?= IMAGES_URL ?>/Carrousel/Trayectoria\ Schumaccer.png');">
                        </div>
                    </div>
                    <div class="carousel-item" data-bs-interval="3000">
                        <div class="hero-slide" style="background-image: url('<?= IMAGES_URL ?>/Carrousel/Vestibulo.png');">
                        </div>
                    </div>
                    <div class="carousel-item" data-bs-interval="3000">
                        <div class="hero-slide"
                            style="background-image: url('<?= IMAGES_URL ?>/Carrousel/Zona\ de\ estar\ Shumacer.png');">
                        </div>
                    </div>
                    <div class="carousel-item" data-bs-interval="3000">
                        <div class="hero-slide"
                            style="background-image: url('<?= IMAGES_URL ?>/Carrousel/Zona\ de\ simuladores.png');">
                        </div>
                    </div>
                    <div class="carousel-item" data-bs-interval="3000">
                        <div class="hero-slide"
                            style="background-image: url('<?= IMAGES_URL ?>/Carrousel/Zona\ de\ trofeos.png');">
                        </div>
                    </div>
                </div>
            </div>

            <div class="hero-overlay d-flex align-items-center">
                <div class="container text-center text-white">
                    <span class="subtitle">COLECCIÓN PRIVADA</span>
                    <h1 class="display-4 mt-3">Siete Hoteles. Un Solo Estándar.</h1>
                    <p class="lead mt-3">
                        Schumacher es una franquicia exclusiva de siete hoteles siete estrellas en los destinos más
                        icónicos del mundo.
                    </p>


                    <div class="search-box mt-5 mx-auto col-lg-10 shadow p-4 rounded"
                        style="background-color: rgba(255,255,255,0.2); backdrop-filter: blur(10px); border: 1px solid rgba(255,255,255,0.3);">
                        <form class="row g-2">
                            <div class="col-md-3">
                                <select class="form-select bg-white">
                                    <option>Destino</option>
                                    <option>Madrid</option>
                                    <option>París</option>
                                    <option>Dubái</option>
                                    <option>Maldivas</option>
                                    <option>Nueva York</option>
                                    <option>Tokio</option>
                                    <option>Zúrich</option>
                                </select>
                            </div>
                            <div class="col-md-2"><input type="date" class="form-control"></div>
                            <div class="col-md-2"><input type="date" class="form-control"></div>
                            <div class="col-md-2">
                                <select class="form-select">
                                    <option>1</option>
                                    <option>2</option>
                                    <option>3</option>
                                    <option>4+</option>
                                </select>
                            </div>
                            <div class="col-md-3">
                                <button class="btn btn-danger w-100">Buscar Disponibilidad</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </section>

        <section id="experiencias" class="py-5 bg-light">
            <div class="container text-center">
                <span class="subtitle">EXPERIENCIAS GLOBALES</span>
                <h2 class="mb-5">Lujo Sin Fronteras</h2>

                <div class="row g-4">
                    <div class="col-md-4">
                        <div class="p-4 bg-white shadow-sm rounded">
                            <div class="exp-icon">♡</div>
                            <h5 class="mt-3">Escapadas Privadas</h5>
                            <p>Diseñadas a medida en cualquiera de nuestros destinos.</p>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="p-4 bg-white shadow-sm rounded">
                            <div class="exp-icon">✈</div>
                            <h5 class="mt-3">Traslados Exclusivos</h5>
                            <p>Jets privados y helicópteros a disposición.</p>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="p-4 bg-white shadow-sm rounded">
                            <div class="exp-icon">☆</div>
                            <h5 class="mt-3">Experiencias 7</h5>
                            <p>Acceso a eventos y servicios irrepetibles.</p>
                        </div>
                    </div>
                </div>
            </div>
        </section>

<section id="acercadelRestaurante" class="bg-dark text-white overflow-hidden">
    <div class="container">
        <div class="row align-items-center min-vh-75 py-5">
            
            <!-- Lado Izquierdo: Imágenes Circulares -->
            <div class="col-md-6 position-relative d-flex justify-content-center align-items-center">
                <!-- Imagen Principal -->
                <div class="rounded-circle overflow-hidden shadow-lg border border-3 border-secondary" style="width: 350px; height: 350px;">
                    <img src="<?= IMAGES_URL ?>/Restaurante/comida1.webp" class="w-100 h-100 object-fit-cover" alt="Restaurante">
                </div>
                <!-- Imagen Decorativa Flotante (Opcional para dar estilo) -->
                <div class="rounded-circle overflow-hidden position-absolute border border-4 border-dark shadow d-none d-lg-block" 
                    style="width: 150px; height: 150px; bottom: -20px; right: 50px;">
                    <img src="<?= IMAGES_URL ?>/Restaurante/comida2.png" class="w-100 h-100 object-fit-cover" alt="Plato">
                </div>
            </div>

            <!-- Lado Derecho: Contenido -->
            <div class="col-md-6 p-lg-5 text-start">
                <h3 class="display-3 fw-bold text-white">Gastronomia de excepción.</h3>
                <img src="<?= IMAGES_URL ?>/Restaurante/michellin.png" alt="michellin" class="img-fluid" width="65px">
                <p class="lead fw-normal text-secondary mb-4">
                    Descubre la esencia culinaria detrás de Apex. Cocina de vanguardia diseñada para paladares exigentes.
                    Perfeccion tecnica y sabores incomparables en cada plato.
                </p>
                <div class="d-flex gap-3">
                    <a class="btn btn-outline-light btn-lg px-4 rounded-pill" href="#">Saber más</a>
                    <a class="btn btn-outline-danger btn-lg px-4 rounded-pill" href="#">Reservar</a>
                </div>
            </div>
        </div>
    </div>
</section>

 <div class="container">
        <div class="row align-items-center min-vh-75 py-5">
            <!-- Lado Izquierdo: Contenido -->
            <div class="col-md-6 p-lg-5 text-start">
                <span class="text-danger fw-bold text-uppercase tracking-wider">Experiencia Gastronómica</span>
                <h3 class="display-3 fw-bold text-dark mb-4">Brunch <span class="text-outline">Apex</span></h3>
                <p class="lead fw-normal text-secondary mb-4">
                Un brunch de vanguardia donde la alta cocina se fusiona con la sofisticación matutina.
                Maridajes exclusivos, técnica impecable y sabores sublimes diseñados para redefinir tu mañana
                </p>
                <div class="d-flex gap-3">
                    <a class="btn btn-outline-dark btn-lg px-4 rounded-pill" href="#">Saber más</a>
                    <a class="btn btn-danger btn-lg px-4 rounded-pill" href="#">Reservar</a>
                </div>
            </div>

            <!-- Lado Derecho: Composición de Imágenes -->
            <div class="col-md-6">
                <div class="img-container-floating d-flex justify-content-center align-items-center">
                    
                    <!-- Imagen Principal (Centro) -->
                    <div class="hover-card float-1 rounded-circle border border-3 border-white" 
                        style="width: 320px; height: 320px; z-index: 5;">
                        <img src="<?= IMAGES_URL ?>/Brunch/desayuno4.png" class="w-100 h-100 object-fit-cover" alt="Plato Principal">
                    </div>

                    <!-- Imagen 2 (Arriba Izquierda) -->
                    <div class="hover-card float-2 rounded-circle position-absolute border border-4 border-white d-none d-lg-block" 
                        style="width: 160px; height: 160px; top: 10%; left: 5%; z-index: 4;">
                        <img src="<?= IMAGES_URL ?>/Brunch/desayuno2.png" class="w-100 h-100 object-fit-cover" alt="Detalle 1">
                    </div>

                    <!-- Imagen 3 (Abajo Derecha) -->
                    <div class="hover-card float-3 rounded-circle position-absolute border border-4 border-white d-none d-lg-block" 
                        style="width: 180px; height: 180px; bottom: 5%; right: 5%; z-index: 6;">
                        <img src="<?= IMAGES_URL ?>/Brunch/desayuno3.png" class="w-100 h-100 object-fit-cover" alt="Detalle 2">
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- SECCIÓN: CONFERENCIAS Y EVENTOS -->
<section class="bg-dark py-5 overflow-hidden">
    <div class="container py-5">
        <div class="row mb-5">
            <div class="col-lg-6">
                <span class="text-danger fw-bold text-uppercase tracking-widest">Elite</span>
                <h2 class="display-3 fw-bold text-white">Centros de <span class="text-outline-white">Impacto</span></h2>
            </div>
        </div>

        <!-- Galería Interactiva de Conferencias -->
        <div class="apex-gallery-container">
            
            <div class="apex-card">
                <img src="<?= IMAGES_URL ?>/salas/salas1.jpg" alt="Summit Hall">
                <div class="apex-card-content">
                    <h4 class="fw-bold">Summit Hall</h4>
                    <p class="small text-secondary">Con la mejor tecnología del mercado</p>
                    <button class="btn btn-sm btn-outline-danger rounded-pill">Ver detalles</button>
                </div>
            </div>
 
            <div class="apex-card">
                <img src="<?= IMAGES_URL ?>/salas/videojuegos.jpg" alt="The Boardroom">
                <div class="apex-card-content">
                    <h4 class="fw-bold">Sala de videojuegos</h4>
                    <p class="small text-secondary">Totalmente equipada con todo lo que te puedes imaginar</p>
                </div>
            </div>

            <div class="apex-card">
                <img src="<?= IMAGES_URL ?>/salas/casino.jpg" alt="Apex Lounge">
                <div class="apex-card-content">
                    <h4 class="fw-bold">Apex Casino</h4>
                    <p class="small text-secondary"> </p>
                </div>
            </div>

        </div>
    </div>
</section>

<!-- SECCIÓN: CINEMA  -->
<section class="bg-white py-5">
    <div class="container py-5">
        <div class="row mb-5 text-end">
            <div class="col-lg-12">
                <span class="text-danger fw-bold text-uppercase">Entertainment Studio</span>
                <h2 class="display-3 fw-bold text-dark">Apex <span class="text-danger">Cinema</span></h2>
            </div>
        </div>

        <div class="apex-gallery-container" style="height: 600px;">
            
            <!-- Tarjeta 1: Cine Interior -->
            <div class="apex-card shadow-lg">
                <img src="<?= IMAGES_URL ?>/cinema/interior1.PNG" alt="Indoor Cinema">
                <div class="apex-card-content">
                    <h3 class="fw-bold">Indoor Luxury</h3>
                    <p>Sonido Dolby Atmos y asientos de cuero calefactados.</p>
                    <a href="#" class="text-white fw-bold text-decoration-none small">RESERVAR SESIÓN PRIVADA →</a>
                </div>
            </div>

            <!-- Tarjeta 2: Cine Exterior -->
            <div class="apex-card shadow-lg">
                <img src="<?= IMAGES_URL ?>/cinema/exterior3.jpg" alt="Outdoor Cinema">
                <div class="apex-card-content">
                    <h3 class="fw-bold">Sky Cinema</h3>
                    <p>Cine bajo las estrellas con servicio de catering gourmet.</p>
                    <a href="#" class="text-white fw-bold text-decoration-none small">VER CARTELERA →</a>
                </div>
            </div>

        </div>
    </div>
</section>




        <section id="estandar" class="py-5">
            <div class="container text-center">
                <span class="subtitle">NUESTRO ESTÁNDAR</span>
                <h2>¿Qué Significa 7 Estrellas?</h2>
                <p class="mt-3 col-lg-8 mx-auto">
                    Atención personalizada 24/7, suites excepcionales,
                    privacidad absoluta y experiencias diseñadas exclusivamente
                    para cada huésped. No seguimos estándares. Los creamos.
                </p>
            </div>
        </section>

        <?php include INCLUDES_PATH  . '/footer.php'; ?> <!-- FOOTER -->
        
        <div class="modal fade" id="bookingModal" tabindex="-1">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title">Solicitud de Reserva</h5>
                        <button class="btn-close" data-bs-dismiss="modal"></button>
                    </div>
                    <div class="modal-body">
                        <form>
                            <input class="form-control mb-3" placeholder="Nombre completo">
                            <input class="form-control mb-3" type="email" placeholder="Correo electrónico">
                            <select class="form-select mb-3">
                                <option>Selecciona hotel</option>
                                <option>Madrid</option>
                                <option>París</option>
                                <option>Dubái</option>
                                <option>Maldivas</option>
                                <option>Nueva York</option>
                                <option>Tokio</option>
                                <option>Zúrich</option>
                            </select>
                            <button class="btn btn-danger w-100">Enviar solicitud</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>

    </body>

    </html>
</body>

</html>