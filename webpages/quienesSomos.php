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
        <link rel="stylesheet" href="<?= CSS_URL ?>">
    </head>
    </head>

    <body class="home-page">
        <!-- Navbar -->
        <nav class="navbar navbar-expand-lg navbar fixed-top">
            <div class="container">
                <a class="navbar-brand brand" href="index.html">
                    <img src="../images/Logo/Logo.png" alt="Logo" class="logo-img">
                </a>
            </div>
        </nav>

        <!-- Hero Section -->
        <section class="hero-historia">
            <video autoplay muted loop playsinline class="hero-video">
                <source src="../images/Schumacher/Schumacher.mp4" type="video/mp4">
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
                    <h2 class="display-4 fw-bold text-white mt-3" style="font-family: 'Playfair Display', serif;">
                        ¿Qué nos define?
                    </h2>
                </div>

                <div class="row g-4">
                    <div class="col-md-4">
                        <div class="vision-card">
                            <div class="vision-icon"></div>
                            <h4>Velocidad & Precisión</h4>
                            <p>
                                Como en una carrera de F1, cada segundo cuenta. Nuestros servicios están optimizados
                                para ofrecerte eficiencia sin sacrificar la calidad. Check-in express, respuesta
                                inmediata a solicitudes, y atención predictiva.
                            </p>
                        </div>
                    </div>

                    <div class="col-md-4">
                        <div class="vision-card">
                            <div class="vision-icon"></div>
                            <h4>Ingeniería del Confort</h4>
                            <p>
                                Cada suite es diseñada con la misma meticulosidad que un auto de carreras. Ergonomía
                                perfecta, materiales de máxima calidad, y tecnología que anticipa tus necesidades antes
                                de que las expreses.
                            </p>
                        </div>
                    </div>

                    <div class="col-md-4">
                        <div class="vision-card">
                            <div class="vision-icon"></div>
                            <h4>Mentalidad Ganadora</h4>
                            <p>
                                No aceptamos el segundo lugar. El Estándar 7 significa que siempre vamos más allá de
                                las expectativas. Cada detalle, cada interacción, cada experiencia está diseñada para
                                ser memorable.
                            </p>
                        </div>
                    </div>
                </div>
            </div>
        </section>


        <section class="founder-section">
            <div class="container">
                <div class="row align-items-center">
                    <div class="col-lg-6 mb-4 mb-lg-0">
                        <div class="founder-img-container">
                            <img src="../images/Schumacher/Schumacher.jpg" alt="Michael Schumacher">
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
            </div>
        </section>

        <!-- CTA Section -->
        <section class="py-5" style="background: linear-gradient(135deg, #a60000 0%, #000000 100%);">
            <div class="container py-5 text-center">
                <h2 class="display-4 fw-bold text-white mb-4" style="font-family: 'Playfair Display', serif;">
                    Vive la Leyenda
                </h2>
                <p class="lead text-white mb-4">
                    Experimenta el Estándar 7 en cualquiera de nuestras siete propiedades alrededor del mundo.
                </p>
                <div class="d-flex gap-3 justify-content-center">
                    <a href="index.html" class="btn btn-light btn-lg px-5 rounded-pill">Explorar Hoteles</a>
                    <a href="contacto.html" class="btn btn-outline-light btn-lg px-5 rounded-pill">Contactar</a>
                </div>
            </div>
        </section>

        <?php include INCLUDES_PATH  . '/footer.php'; ?> <!-- FOOTER -->

        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
    </body>

    </html>