<?php require_once '../config/config.php'; ?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Contacto | Schumacher Hotels</title>
    
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@300;400;600&family=Playfair+Display:wght@700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="<?= CSS_URL ?>">
    <link rel="stylesheet" href="https://unpkg.com/leaflet@1.9.4/dist/leaflet.css" />
</head>
    <?php include INCLUDES_PATH . '/navbar.php'; ?>

    <div class="contactogrid"> 
        <div class="cabecera">
            <span class="hero-subtitle">ESTAMOS AQUÍ PARA TI</span>
            <h1 class="display-4 fw-bold text-white">Contáctanos</h1>
        </div>

        <div class="formulario">
            <div class="container-form">
                <form action="<?= PHP_URL ?>/procesar_contacto.php" method="POST">
                    <h3 class="mb-4 text-white">Envíanos un Mensaje</h3>
                    <div class="mb-3">
                        <label class="form-label text-white">Nombre <b class="text-danger">*</b></label>
                        <input type="text" name="nombre" class="form-control" required>
                    </div>
                    <div class="mb-3">
                        <label class="form-label text-white">Email <b class="text-danger">*</b></label>
                        <input type="email" name="email" class="form-control" required>
                    </div>
                    <div class="mb-3">
                        <label class="form-label text-white">Teléfono</label>
                        <input type="tel" name="phone" class="form-control">
                    </div>
                    <div class="mb-3">
                        <label class="form-label text-white">Mensaje <b class="text-danger">*</b></label>
                        <textarea class="form-control" name="cuentanos" rows="4" required></textarea>
                    </div>
                    <div class="mb-3 form-check text-white-50">
                        <input type="checkbox" class="form-check-input" id="check" required>
                        <label class="form-check-label small" for="check">Acepto las condiciones de tratamiento de datos.</label>
                    </div>
                    <button type="submit" class="btn-enviar">ENVIAR MENSAJE</button>
                </form>
            </div>
        </div>

        <div class="card1">
            <div class="mapa-container">
                <div id="map"></div> 
                <div class="info-central mt-4 text-start text-white">
                    <h5 class="text-danger">Sede Central - Madrid</h5>
                    <p class="small mb-1"><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-geo-alt" viewBox="0 0 16 16">
  <path d="M12.166 8.94c-.524 1.062-1.234 2.12-1.96 3.07A32 32 0 0 1 8 14.58a32 32 0 0 1-2.206-2.57c-.726-.95-1.436-2.008-1.96-3.07C3.304 7.867 3 6.862 3 6a5 5 0 0 1 10 0c0 .862-.305 1.867-.834 2.94M8 16s6-5.686 6-10A6 6 0 0 0 2 6c0 4.314 6 10 6 10"/>
  <path d="M8 8a2 2 0 1 1 0-4 2 2 0 0 1 0 4m0 1a3 3 0 1 0 0-6 3 3 0 0 0 0 6"/>
</svg> Calle del Gran Premio, 12</p>
                    <p class="small"><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-telephone" viewBox="0 0 16 16">
  <path d="M3.654 1.328a.678.678 0 0 0-1.015-.063L1.605 2.3c-.483.484-.661 1.169-.45 1.77a17.6 17.6 0 0 0 4.168 6.608 17.6 17.6 0 0 0 6.608 4.168c.601.211 1.286.033 1.77-.45l1.034-1.034a.678.678 0 0 0-.063-1.015l-2.307-1.794a.68.68 0 0 0-.58-.122l-2.19.547a1.75 1.75 0 0 1-1.657-.459L5.482 8.062a1.75 1.75 0 0 1-.46-1.657l.548-2.19a.68.68 0 0 0-.122-.58zM1.884.511a1.745 1.745 0 0 1 2.612.163L6.29 2.98c.329.423.445.974.315 1.494l-.547 2.19a.68.68 0 0 0 .178.643l2.457 2.457a.68.68 0 0 0 .644.178l2.189-.547a1.75 1.75 0 0 1 1.494.315l2.306 1.794c.829.645.905 1.87.163 2.611l-1.034 1.034c-.74.74-1.846 1.065-2.877.702a18.6 18.6 0 0 1-7.01-4.42 18.6 18.6 0 0 1-4.42-7.009c-.362-1.03-.037-2.137.703-2.877z"/>
</svg> +34 912 345 678</p>
                </div>
            </div>
        </div>

        <div class="api-hoteles-section">
            <div class="text-center mb-5">
                <h2 class="display-5 font-playfair text-white">Nuestra Colección</h2>
                <div class="divider mx-auto" style="width: 60px; height: 3px; background-color: #dc3545;"></div>
            </div>
            
            <div id="hotel-list" class="row g-4 px-4">
                <div class="text-center">
                    <div class="spinner-border text-danger" role="status"></div>
                </div>
            </div>
        </div>
    </div>       

    <?php include INCLUDES_PATH . '/footer.php'; ?>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
    <script src="https://unpkg.com/leaflet@1.9.4/dist/leaflet.js"></script>
    
    <script>
        const coordenadasHoteles = {
            "Madrid": [40.4167, -3.7037],
            "Barcelona": [41.3851, 2.1734],
            "París": [48.8566, 2.3522],
            "Londres": [51.5074, -0.1278],
            "Roma": [41.9028, 12.4964],
            "Ámsterdam": [52.3676, 4.9041],
            "Berlín": [52.5200, 13.4050],
            "Lisboa": [38.7223, -9.1393],
            "Bruselas": [50.8503, 4.3517],
            "Viena": [48.2082, 16.3738],
            "Praga": [50.0755, 14.4378],
            "Zurich": [47.3769, 8.5417],
            "Estocolmo": [59.3293, 18.0686],
            "Copenhague": [55.6761, 12.5683]
        };

        const map = L.map('map').setView([40.4167, -3.7037], 13);
        L.tileLayer('https://{s}.basemaps.cartocdn.com/dark_all/{z}/{x}/{y}{r}.png', {
            attribution: '&copy; OpenStreetMap'
        }).addTo(map);
        
        L.marker([40.4167, -3.7037]).addTo(map).bindPopup('Sede Central Schumacher');

        function irAlMapa(nombreCiudad) {
            const coords = coordenadasHoteles[nombreCiudad];
            if (coords) {
                map.setView(coords, 14);
                L.marker(coords).addTo(map).bindPopup(`<b>Hotel Schumacher</b><br>${nombreCiudad}`).openPopup();
                document.getElementById('map').scrollIntoView({ behavior: 'smooth', block: 'center' });
            }
        }

        async function cargarHoteles() {
            try {
                const response = await fetch('<?= PHP_URL ?>/get_hoteles_publico.php');
                const data = await response.json();
                const container = document.getElementById('hotel-list');

                if (data.estado === 'success') {
                    container.innerHTML = ''; 
                    data.hoteles.forEach(hotel => {
                        container.innerHTML += `
                            <div class="col-12 col-md-6 col-lg-4">
                                <div class="hotel-card-api">
                                    <span class="badge bg-danger mb-2">${hotel.pais}</span>
                                    <h3>${hotel.ciudad}</h3>
                                    <p class="small">${hotel.descripcion}</p>
                                    <button class="btn btn-sm btn-outline-danger w-100 mt-3 fw-bold" 
                                            onclick="irAlMapa('${hotel.ciudad}')">
                                        VER UBICACIÓN
                                    </button>
                                </div>
                            </div>`;
                    });
                }
            } catch (error) {
                container.innerHTML = '<p class="text-center text-white">Error al cargar hoteles.</p>';
            }
        }
        document.addEventListener('DOMContentLoaded', cargarHoteles);
    </script>
</body>
</html>