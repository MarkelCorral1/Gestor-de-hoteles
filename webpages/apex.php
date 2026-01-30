<?php
require_once '../config/config.php';

?>
<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Brunch - Hotel Schumacher</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <link
        href="https://fonts.googleapis.com/css2?family=Montserrat:wght@300;400;600&family=Playfair+Display:wght@700&display=swap"
        rel="stylesheet">
    <link rel="stylesheet" href="<?= CSS_URL ?>">
</head>

<body class="apex-page">
    <nav class="navbar navbar-expand-lg navbar fixed-top">
        <div class="container">
            <a class="navbar-brand brand" href="<?= PAGINAS_URL ?>/index.php">
                <img src="<?= IMAGES_URL ?>/Logo/Logo.png" alt="Logo" class="logo-img">
            </a>
        </div>
    </nav>

    <!-- HERO SECTION -->
    <section class="brunch-hero">
        <div class="hero-overlay">
            <div class="container">
                <span class="subtitle">Sábados y Domingos 10:00 - 14:00</span>
                <h1 class="hero-title">Sunday Drive</h1>
                <p class="hero-description">El brunch donde la pasión italiana se encuentra con la mañana perfecta</p>
            </div>
        </div>
    </section>

    <!-- SECCIÓN: THE BAKERY -->
    <section class="brunch-section bg-black">
        <div class="container">
            <div class="section-header">
                <span class="section-number">01</span>
                <h2>The Bakery</h2>
                <div class="red-line"></div>
            </div>

            <div class="brunch-grid">
                <div class="brunch-item">
                    <div class="item-header">
                        <h3>Croissant di Parma</h3>
                        <span class="dots"></span>
                        <span class="price">8€</span>
                    </div>
                    <p class="item-desc">Croissant artesanal relleno de jamón di Parma y burrata cremosa.</p>
                </div>

                <div class="brunch-item">
                    <div class="item-header">
                        <h3>Pain au Chocolat "Pole Position"</h3>
                        <span class="dots"></span>
                        <span class="price">6€</span>
                    </div>
                    <p class="item-desc">Hojaldre crujiente con doble carga de chocolate Valrhona.</p>
                </div>

                <div class="brunch-item">
                    <div class="item-header">
                        <h3>Focaccia del Paddock</h3>
                        <span class="dots"></span>
                        <span class="price">9€</span>
                    </div>
                    <p class="item-desc">Focaccia recién horneada con tomate confitado, albahaca y aceite de trufa.</p>
                </div>
            </div>
        </div>
    </section>

    <!-- SECCIÓN: EGGS & CLASSICS -->
    <section class="brunch-section bg-dark-gray">
        <div class="container">
            <div class="section-header">
                <span class="section-number">02</span>
                <h2>Eggs & Classics</h2>
                <div class="red-line"></div>
            </div>

            <div class="brunch-grid">
                <div class="brunch-item">
                    <div class="item-header">
                        <h3>Benedict Maranello</h3>
                        <span class="dots"></span>
                        <span class="price">18€</span>
                    </div>
                    <p class="item-desc">Huevos pochados sobre panceta ahumada, salsa holandesa con toque de pimentón
                        rojo.</p>
                </div>

                <div class="brunch-item">
                    <div class="item-header">
                        <h3>Shakshuka "Monza"</h3>
                        <span class="dots"></span>
                        <span class="price">16€</span>
                    </div>
                    <p class="item-desc">Huevos escalfados en salsa de tomate especiado, pimientos rojos y feta griega.
                    </p>
                </div>

                <div class="brunch-item">
                    <div class="item-header">
                        <h3>Scrambled Truffle Royale</h3>
                        <span class="dots"></span>
                        <span class="price">22€</span>
                    </div>
                    <p class="item-desc">Huevos revueltos con trufa negra rallada, servidos con brioche tostado.</p>
                </div>

                <div class="brunch-item">
                    <div class="item-header">
                        <h3>Tortilla Española de Ibérico</h3>
                        <span class="dots"></span>
                        <span class="price">14€</span>
                    </div>
                    <p class="item-desc">Nuestra interpretación cremosa con chorizo ibérico y patatas confitadas.</p>
                </div>
            </div>
        </div>
    </section>

    <!-- SECCIÓN: HEALTHY BOWLS -->
    <section class="brunch-section bg-black">
        <div class="container">
            <div class="section-header">
                <span class="section-number">03</span>
                <h2>Light & Power</h2>
                <div class="red-line"></div>
            </div>

            <div class="brunch-grid">
                <div class="brunch-item">
                    <div class="item-header">
                        <h3>Açai Victory Bowl</h3>
                        <span class="dots"></span>
                        <span class="price">12€</span>
                    </div>
                    <p class="item-desc">Açai orgánico, granola casera, frutos rojos, coco rallado y miel de acacia.</p>
                </div>

                <div class="brunch-item">
                    <div class="item-header">
                        <h3>Avocado Toast "Silverstone"</h3>
                        <span class="dots"></span>
                        <span class="price">13€</span>
                    </div>
                    <p class="item-desc">Pan de masa madre, aguacate cremoso, huevo poché, chile rojo y microgreens.</p>
                </div>

                <div class="brunch-item">
                    <div class="item-header">
                        <h3>Greek Yogurt Parfait</h3>
                        <span class="dots"></span>
                        <span class="price">10€</span>
                    </div>
                    <p class="item-desc">Yogur griego, compota de frutos del bosque, nueces caramelizadas.</p>
                </div>
            </div>
        </div>
    </section>

    <!-- SECCIÓN: MORNING COCKTAILS (Grid Visual de 2 columnas) -->
    <section class="brunch-cocktails">
        <div class="container">
            <div class="section-header text-center">
                <span class="subtitle">Fuel for Champions</span>
                <h2>Morning Cocktails</h2>
                <div class="red-line mx-auto"></div>
            </div>

            <div class="cocktail-grid">
                <!-- Tarjeta 1 -->
                <div class="cocktail-card">
                    <h4>Monza Mimosa</h4>
                    <p>Prosecco DOC, zumo de naranja sanguina, toque de Grand Marnier.</p>
                    <span class="cocktail-price">12€</span>
                </div>

                <!-- Tarjeta 2 -->
                <div class="cocktail-card">
                    <h4>Silverstone Mary</h4>
                    <p>Vodka premium, tomate, tabasco ahumado, apio fresco y especias secretas.</p>
                    <span class="cocktail-price">14€</span>
                </div>

                <!-- Tarjeta 3 -->
                <div class="cocktail-card">
                    <h4>Bellini Paddock</h4>
                    <p>Puré de melocotón blanco, Prosecco helado, frambuesas frescas.</p>
                    <span class="cocktail-price">13€</span>
                </div>

                <!-- Tarjeta 4 -->
                <div class="cocktail-card">
                    <h4>Espresso Martini "Pit Stop"</h4>
                    <p>Vodka, licor de café italiano, espresso doble, cacao en polvo.</p>
                    <span class="cocktail-price">15€</span>
                </div>
            </div>
        </div>
    </section>

    <!-- SECCIÓN: DULCES (Postre/Finales) -->
    <section class="brunch-section bg-dark-gray">
        <div class="container">
            <div class="section-header">
                <span class="section-number">04</span>
                <h2>Sweet Finish</h2>
                <div class="red-line"></div>
            </div>

            <div class="brunch-grid">
                <div class="brunch-item">
                    <div class="item-header">
                        <h3>Pancakes "Maranello"</h3>
                        <span class="dots"></span>
                        <span class="price">11€</span>
                    </div>
                    <p class="item-desc">Torre de pancakes esponjosos, sirope de arce, fresas frescas y nata montada.
                    </p>
                </div>

                <div class="brunch-item">
                    <div class="item-header">
                        <h3>French Toast Racing</h3>
                        <span class="dots"></span>
                        <span class="price">12€</span>
                    </div>
                    <p class="item-desc">Pan brioche caramelizado, plátano flameado, helado de vainilla bourbon.</p>
                </div>

                <div class="brunch-item">
                    <div class="item-header">
                        <h3>Tiramisú Morning Edition</h3>
                        <span class="dots"></span>
                        <span class="price">9€</span>
                    </div>
                    <p class="item-desc">Versión ligera con mascarpone, café expreso y cacao amargo.</p>
                </div>
            </div>
        </div>
    </section>

    <?php include INCLUDES_PATH . '/footer.php'; ?>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>

</body>

</html>