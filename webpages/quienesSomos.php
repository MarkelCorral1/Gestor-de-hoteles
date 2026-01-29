<?php
require_once '../config/config.php';
?>

    <!DOCTYPE html>
    <html lang="es">

    <head>
        <meta charset="UTF-8">
        <title>Schumacher | Colección Privada de Hoteles</title>
        <meta name="viewport" content="width=device-width, initial-scale=1">
            <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/remixicon/4.6.0/remixicon.min.css">
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
        <link
            href="https://fonts.googleapis.com/css2?family=Montserrat:wght@300;400;600&family=Playfair+Display:wght@700&display=swap"
            rel="stylesheet">
        <link rel="stylesheet" href="<?= CSS_URL ?>">
        <!-- SWIPER CSS -->
        <link rel="stylesheet" href="../scss/swiper-bundle.min.css">
    </head>
    </head>

    <body class="home-page">
        <!-- Navbar -->
        <nav class="navbar navbar-expand-lg navbar fixed-top">
            <div class="container">
                <a class="navbar-brand brand" href="index.php">
                    <img src="<?= IMAGES_URL ?>/Logo/Logo.png" alt="Logo" class="logo-img">
                </a>
            </div>
        </nav>

        <!-- Hero Section -->
        <section class="hero-historia">
            <video autoplay muted loop playsinline class="video-story">
        <source src="<?= IMAGES_URL ?>/Carrousel/schumacherstory.webm" type="video/webm">
        <!-- Fallback: si el video no carga, se se muestra una imagen -->
        <img src="<?= IMAGES_URL ?>/Carrousel/Zona de trofeos.png" alt="story">
    </video>
            <div class="hero-content">
                <span class="hero-subtitle">NUESTRA HISTORIA</span>
                <h1>LA LEYENDA</h1>
                <p class="lead mt-3">Donde la velocidad se encuentra con la elegancia</p>
            </div>
            <div class="scroll-indicator">
                <span></span>
            </div>
        </section>

        <!-- Intro Section -->
        <section class="py-5" style="background: #000;">
            <div class="container py-5">
                <div class="row justify-content-center">
                    <div class="col-lg-10 text-center">
                        <span class="text-danger fw-bold text-uppercase" style="letter-spacing:30px;">EL ORIGEN</span>
                        <h2 class="display-4 fw-bold text-white mt-3 mb-4" style="font-family: 'Playfair Display', serif;">
                            De la Pista a la Hospitalidad
                        </h2>
                        <p class="lead text-white-50 mb-4" style="line-height: 1">
                            Schumacher Hotels nació de una visión extraordinaria: trasladar la precisión, velocidad y excelencia
                            de la Fórmula 1 al mundo de la hospitalidad de lujo. Inspirado por la leyenda del automovilismo,
                            Michael Schumacher, nuestro fundador imaginó una cadena de hoteles que desafiara todos los estándares
                            conocidos.
                        </p>
                        <p class="lead text-white-50" style="line-height: 1;">
                            No se conformó con cinco estrellas. Creó el <strong class="text-danger">Estándar 7</strong>.
                        </p>
                    </div>

                </div>
            </div>
            <div class="text-center mb-5 pb-5">
                <span class="text-danger fw-bold text-uppercase" style="letter-spacing: 4px;">NUESTRA TRAYECTORIA</span>
                <h2 class="display-4 fw-bold text-white mt-3" style="font-family: 'Playfair Display', serif;">
                    Línea del Tiempo
                </h2>
            </div>
        </section>
        <!-- Timeline Section -->
        <section class="timeline-section">
            <div class="timeline-line"></div>
            <div class="container">
                <div class="timeline-item">
                    <div class="timeline-year">2010</div>
                    <div class="timeline-content">
                        <h3>La Visión</h3>
                        <p>
                            Después de retirarse de la competición, Michael Schumacher concibe la idea de crear hoteles
                            que reflejen su filosofía de vida: precisión absoluta, velocidad estratégica y excelencia
                            sin compromisos. El concepto del "Estándar 7" nace en una conversación con arquitectos de
                            Dubai.
                        </p>
                    </div>
                </div>

                <div class="timeline-item">
                    <div class="timeline-year">2012</div>
                    <div class="timeline-content">
                        <h3>Primer Hotel - Dubai</h3>
                        <p>
                            Se inaugura el primer Schumacher en Dubai, revolucionando la industria hotelera con servicios
                            nunca antes vistos: helipuerto privado, pista de carreras F1 en miniatura, y suites diseñadas
                            por ingenieros aeroespaciales para maximizar el descanso y recuperación.
                        </p>
                    </div>
                </div>

                <div class="timeline-item">
                    <div class="timeline-year">2015</div>
                    <div class="timeline-content">
                        <h3>Expansión Global</h3>
                        <p>
                            La franquicia se expande estratégicamente a París, Nueva York y Tokio. Cada hotel es diseñado
                            específicamente para su ubicación, manteniendo el Estándar 7 pero adaptándose a la cultura
                            local. Se introduce el concepto de "tiempo de pit stop": check-in en menos de 90 segundos.
                        </p>
                    </div>
                </div>

                <div class="timeline-item">
                    <div class="timeline-year">2018</div>
                    <div class="timeline-content">
                        <h3>Innovación Tecnológica</h3>
                        <p>
                            Schumacher Hotels implementa tecnología de simulación F1 en todos sus gimnasios y zonas de
                            entretenimiento. Se convierte en la primera cadena hotelera en ofrecer experiencias de
                            realidad virtual con simuladores profesionales de carreras.
                        </p>
                    </div>
                </div>

                <div class="timeline-item">
                    <div class="timeline-year">2021</div>
                    <div class="timeline-content">
                        <h3>Reconocimiento Mundial</h3>
                        <p>
                            Los siete hoteles Schumacher son oficialmente reconocidos con el Estándar 7 estrellas por
                            organizaciones internacionales de hospitalidad. Se establecen en Madrid, Maldivas y Zúrich,
                            completando la red global de excelencia.
                        </p>
                    </div>
                </div>

                <div class="timeline-item">
                    <div class="timeline-year">2024</div>
                    <div class="timeline-content">
                        <h3>El Legado Continúa</h3>
                        <p>
                            Con siete propiedades en las capitales más estratégicas del mundo, Schumacher Hotels se
                            consolida como la franquicia de lujo más exclusiva del planeta. Más de 500,000 huéspedes
                            VIP han experimentado el Estándar 7.
                        </p>
                    </div>
                </div>
            </div>
        </section>


        <!-- Vision Section -->
<section class="vision-section">
    <div class="container">
        <div class="text-center mb-5 pb-5">
            <span class="text-danger fw-bold text-uppercase" style="letter-spacing: 4px;">NUESTROS PILARES</span>
            <h2 class="display-4 fw-bold text-white mt-3" style="font-family: 'Playfair Display', serif;">¿Qué nos define?</h2>
        </div>

        <div class="vision-container-wrapper">
            <div class="vision__swiper swiper">
                <div class="swiper-wrapper">
                    <!-- Card 1 -->
                    <div class="swiper-slide">
                        <div class="vision-card">
                            <div class="vision-icon">
                                <svg xmlns="http://www.w3.org" width="30" height="30" fill="currentColor" class="bi bi-speedometer" viewBox="0 0 16 16"><path d="M8 2a.5.5 0 0 1 .5.5V4a.5.5 0 0 1-1 0V2.5A.5.5 0 0 1 8 2M3.732 3.732a.5.5 0 0 1 .707 0l.915.914a.5.5 0 1 1-.708.708l-.914-.915a.5.5 0 0 1 0-.707M2 8a.5.5 0 0 1 .5-.5h1.586a.5.5 0 0 1 0 1H2.5A.5.5 0 0 1 2 8m9.5 0a.5.5 0 0 1 .5-.5h1.5a.5.5 0 0 1 0 1H12a.5.5 0 0 1-.5-.5m.754-4.246a.39.39 0 0 0-.527-.02L7.547 7.31A.91.91 0 1 0 8.85 8.569l3.434-4.297a.39.39 0 0 0-.029-.518z"/><path fill-rule="evenodd" d="M6.664 15.889A8 8 0 1 1 9.336.11a8 8 0 0 1-2.672 15.78zm-4.665-4.283A11.95 11.95 0 0 1 8 10c2.186 0 4.236.585 6.001 1.606a7 7 0 1 0-12.002 0"/></svg>
                            </div>
                            <h4>Velocidad & Precisión</h4>
                            <p>Como en una carrera de F1, cada segundo cuenta. Nuestros servicios están optimizados para ofrecerte eficiencia sin sacrificar la calidad.</p>
                        </div>
                    </div>
                    <!-- Card 2 -->
                    <div class="swiper-slide">
                        <div class="vision-card">
                            <div class="vision-icon">
                                <svg xmlns="http://www.w3.org" width="30" height="30" fill="currentColor" class="bi bi-house-gear" viewBox="0 0 16 16"><path d="M7.293 1.5a1 1 0 0 1 1.414 0L11 3.793V2.5a.5.5 0 0 1 .5-.5h1a.5.5 0 0 1 .5.5v3.293l2.354 2.353a.5.5 0 0 1-.708.708L8 2.207l-5 5V13.5a.5.5 0 0 0 .5.5h4a.5.5 0 0 1 0 1h-4A1.5 1.5 0 0 1 2 13.5V8.207l-.646.647a.5.5 0 1 1-.708-.708z"/><path d="M11.886 9.46c.18-.613 1.048-.613 1.229 0l.043.148a.64.64 0 0 0 .921.382l.136-.074c.561-.306 1.175.308.87.869l-.075.136a.64.64 0 0 0 .382.92l.149.045c.612.18.612 1.048 0 1.229l-.15.043a.64.64 0 0 0-.38.921l.074.136c.305.561-.309 1.175-.87.87l-.136-.075a.64.64 0 0 0-.92.382l-.045.149c-.18.612-1.048.612-1.229 0l-.043-.15a.64.64 0 0 0-.921-.38l-.136.074c-.561.305-1.175-.309-.87-.87l.075-.136a.64.64 0 0 0-.382-.92l-.148-.044c-.613-.181-.613-1.049 0-1.23l.148-.043a.64.64 0 0 0 .382-.921l-.074-.136c-.306-.561.308-1.175.869-.87l.136.075a.64.64 0 0 0 .92-.382zM14 12.5a1.5 1.5 0 1 0-3 0 1.5 1.5 0 0 0 3 0"/></svg>
                            </div>
                            <h4>Ingeniería del Confort</h4>
                            <p>Cada suite es diseñada con la misma meticulosidad que un auto de carreras. Ergonomía perfecta y materiales de máxima calidad.</p>
                        </div>
                    </div>
                    <!-- Card 3 -->
                    <div class="swiper-slide">
                        <div class="vision-card">
                            <div class="vision-icon">
                                <svg xmlns="http://www.w3.org" width="30" height="30" fill="currentColor" class="bi bi-trophy-fill" viewBox="0 0 16 16"><path d="M2.5.5A.5.5 0 0 1 3 0h10a.5.5 0 0 1 .5.5q0 .807-.034 1.536a3 3 0 1 1-1.133 5.89c-.79 1.865-1.878 2.777-2.833 3.011v2.173l1.425.356c.194.048.377.135.537.255L13.3 15.1a.5.5 0 0 1-.3.9H3a.5.5 0 0 1-.3-.9l1.838-1.379c.16-.12.343-.207.537-.255L6.5 13.11v-2.173c-.955-.234-2.043-1.146-2.833-3.012a3 3 0 1 1-1.132-5.89A33 33 0 0 1 2.5.5m.099 2.54a2 2 0 0 0 .72 3.935c-.333-1.05-.588-2.346-.72-3.935m10.083 3.935a2 2 0 0 0 .72-3.935c-.133 1.59-.388 2.885-.72 3.935"/></svg>
                            </div>
                            <h4>Mentalidad Ganadora</h4>
                            <p>No aceptamos el segundo lugar. El Estándar 7 significa ir siempre más allá de las expectativas del cliente.</p>
                        </div>
                    </div>
                </div>
                <div class="swiper-pagination"></div>
            </div>
            <!-- Botones -->
            <div class="swiper-button-prev vision-prev"></div>
            <div class="swiper-button-next vision-next"></div>
        </div>
    </div>
</section>


        <section class="founder-section">
            <div class="container">
                <div class="row align-items-center">
                    <div class="col-lg-6 mb-4 mb-lg-0">
                        <div class="founder-img-container">
                            <img src="<?= IMAGES_URL ?>/Schumacher/SPEED.jpg" alt="Michael Schumacher">
                        </div>
                    </div>
                    <div class="col-lg-6">
                        <span class="text-danger fw-bold text-uppercase" style="letter-spacing: 4px;">LA INSPIRACIÓN</span>
                        <h2 class="display-4 fw-bold text-white mt-3 mb-4" style="font-family: 'Playfair Display', serif;">
                            La Filosofía Schumacher
                        </h2>
                        <p class="text-white-50 mb-4" style="line-height: 1.9; font-size: 1.1rem;">
                            Michael Schumacher siempre creyó que la excelencia no era un objetivo, sino un estilo de vida.
                            Esta filosofía impregna cada aspecto de nuestros hoteles, desde el diseño arquitectónico hasta
                            el último detalle del servicio.
                        </p>
                        <div class="founder-quote">
                            "En las carreras aprendí que la perfección está en los detalles. Un segundo puede cambiar
                            todo. En Schumacher Hotels, aplicamos esa misma mentalidad: cada momento de tu estancia
                            debe ser excepcional."
                            <div class="mt-3 text-danger">- Filosofía Fundacional</div>
                        </div>
                        <p class="text-white-50" style="line-height: 1.9; font-size: 1.1rem;">
                            Los hoteles no son solo un lugar para dormir, son santuarios donde la velocidad del mundo
                            moderno se encuentra con la calma absoluta del lujo atemporal.
                        </p>
                    </div>
                </div>
        </section>

        <!-- CTA Section -->
        <section class="py-5" style="background:linear-gradient(135deg, #610000 0%, #0d0d0d 100%)">
            <div class="container py-5 text-center">
                <h2 class="display-4 fw-bold text-white mb-4" style="font-family: 'Playfair Display', serif;">
                    Vive la Leyenda
                </h2>
                <p class="lead text-white mb-4">
                    Experimenta el verdadero placer de lo bueno.
                </p>
                <div class="d-flex gap-3 justify-content-center">
                    <a href="<?= PAGINAS_URL ?>/dashboard.php" class="btn btn-outline-danger btn-lg px-4 rounded-pill">Explorar Hoteles</a>
                    <a href="<?= PAGINAS_URL ?>/contacto.php" class="btn btn-outline-light btn-lg px-4 rounded-pill">Contactar</a>
                </div>
            </div>
        </section>

        <?php include INCLUDES_PATH  . '/footer.php'; ?> <!-- FOOTER -->
        <script src="../JS/swipercard.js"></script>
        <script src="../JS/swiper-bundle.min.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
    </body>

    </html>