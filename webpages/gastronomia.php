<?php
require_once '../config/config.php';
?>

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Schumacher Hotels</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <link
        href="https://fonts.googleapis.com/css2?family=Montserrat:wght@300;400;600&family=Playfair+Display:wght@700&display=swap"
        rel="stylesheet">
    <link rel="stylesheet" href="<?= CSS_URL ?>">
</head>

<body class="page-restaurant">
    <nav class="navbar navbar-expand-lg navbar fixed-top">
        <div class="container">
            <a class="navbar-brand brand" href="index.php">
                <img src="<?= IMAGES_URL ?>/Logo/Logo.png" alt="Logo" class="logo-img">
            </a>
        </div>
    </nav>
    <!-- Hero -->
    <section class="rest-hero">
        <div class="rest-hero__bg">
            <img src="../images/Restaurante/yugo-the-bunker-platos-6.webp"></video>
        </div>
        <div class="rest-hero__vertical-text">
            <span>SCHUMACHER APEX</span>
            <span>シューマッハ・エイペックス</span>
        </div>
        <div class="rest-hero__content">
            <h1>
                <span>Experience</span>
                The Taste of Speed
            </h1>
        </div>
    </section>

    <!-- Concept Grid (Ingredientes/Técnica) -->
    <section class="rest-grid-section">
        <div class="grid-container">
            <!-- Item 1 -->
            <article class="grid-item">
                <span class="grid-item__kanji">食材</span>
                <div class="grid-item__content">
                    <h3>Ingredientes</h3>
                    <p>Selección diaria de los mejores mercados globales. Pescado volado directamente desde Tsukiji
                        para garantizar una frescura que compite con la velocidad.</p>
                </div>
            </article>

            <!-- Item 2 (Baja por el margin-top del CSS) -->
            <article class="grid-item">
                <span class="grid-item__kanji">技法</span>
                <div class="grid-item__content">
                    <h3>Técnica</h3>
                    <p>Precisión milimétrica en cada corte. Nuestros chefs ejecutan el arte del sushi con la misma
                        disciplina que un equipo de boxes en carrera.</p>
                </div>
            </article>
        </div>
    </section>

    <!-- Menú -->
    <section class="rest-menu-section">
        <div class="menu-header">
            <p>Descubre</p>
            <h2>Nuestros Menús</h2>
        </div>
        <div class="menu-options">
            <!-- Menú 1 -->
            <div class="menu-card">
                <div class="menu-card__jp-title">懐石</div>
                <h3>Kaiseki</h3>
                <span class="price-tag">150€</span>
                <p>Un viaje tradicional a través de las estaciones.</p>
            </div>
            <!-- Menú 2 -->
            <div class="menu-card">
                <div class="menu-card__jp-title">お任せ</div>
                <h3>Omakase</h3>
                <span class="price-tag">220€</span>
                <p>Confianza ciega en el chef. La experiencia definitiva.</p>
            </div>
            <!-- Menú 3 -->
            <div class="menu-card">
                <!-- "Schumacher Apex" en japonés que te di antes -->
                <div class="menu-card__jp-title">シューマッハ</div>
                <h3>Apex Legacy</h3>
                <span class="price-tag">190€</span>
                <p>Fusión italo-japonesa. Velocidad, precisión y pasión roja.</p>
            </div>
            <!-- Menú 4 -->
            <div class="menu-card">
                <!-- "Carne de Wagyu" en japonés -->
                <div class="menu-card__jp-title">和牛</div>
                <h3>Wagyu Gold</h3>
                <span class="price-tag">280€</span>
                <p>Selección premium de Kobe A5 y cortes exclusivos a la brasa.</p>
            </div>
        </div>
    </section>
</body>

</html>