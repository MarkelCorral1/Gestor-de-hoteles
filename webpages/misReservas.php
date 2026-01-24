<?php
require_once '../config/config.php';
require_once '../bootstrap.php';

if (!isset($_COOKIE["usuario"])) {
    header('Location: index.php');
    exit();
}
?>

<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@300;400;600&family=Playfair+Display:wght@700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="<?= CSS_URL ?>">
    <title>Mis Reservas - Schumacher Hotels</title>
</head>

<body>
    <?php include INCLUDES_PATH . '/navbar.php'; ?>

    <section class="min-vh-100 py-5">
        <div class="container">
            <h1 class="reservas-titulo">Mis Reservas</h1>
            
            <div id="reservasContainer" class="reservas-container row"></div>
            
            <div id="mensajeVacio" class="reservas-vacio" style="display: none;">
                <h5>No tienes reservas aún. <a href="dashboard.php">Haz una reserva ahora</a></h5>
            </div>

            <div id="mensajeError" class="reservas-error alert" style="display: none;"></div>
        </div>
    </section>

    <?php include INCLUDES_PATH . '/footer.php'; ?>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
    <script>
        // Cargar las reservas cuando se carga la página
        document.addEventListener('DOMContentLoaded', cargarReservas);

        function cargarReservas() {
            fetch('<?= PHP_URL ?>/getReservas.php')
                .then(response => {
                    if (!response.ok) {
                        throw new Error(`HTTP error! status: ${response.status}`);
                    }
                    return response.json();
                })
                .then(data => {
                    if (data.error) {
                        mostrarError(data.error);
                        return;
                    }

                    if (data.reservas.length === 0) {
                        document.getElementById('mensajeVacio').style.display = 'block';
                        return;
                    }

                    mostrarReservas(data.reservas);
                })
                .catch(error => {
                    console.error('Error:', error);
                    mostrarError('Error al cargar las reservas');
                });
        }

        function mostrarReservas(reservas) {
            const container = document.getElementById('reservasContainer');
            container.innerHTML = '';

            let html = '';

            reservas.forEach(reserva => {
                const fechaInicio = new Date(reserva.fecha_inicio.split('/').reverse().join('-'));
                const esPasada = new Date() > fechaInicio;
                const clasesPasada = esPasada ? 'reserva-pasada' : '';
                const estadoTexto = esPasada ? '(Pasada)' : '';

                html += `
                    <div class="col-lg-6 col-md-12 mb-4">
                        <div class="card reserva-card h-100 ${clasesPasada}">
                            <div class="card-header">
                                <h5 class="reserva-ciudad mb-0">${reserva.hotel_ciudad}</h5>
                            </div>
                            <div class="card-body">
                                <div class="row mb-3">
                                    <div class="col-6">
                                        <p class="reserva-label mb-2">Habitación:</p>
                                        <p class="reserva-dato">${reserva.categoria_nombre} #${reserva.id_habitacion}</p>
                                    </div>
                                    <div class="col-6">
                                        <p class="reserva-label mb-2">ID Reserva:</p>
                                        <p class="reserva-dato">${reserva.id_reserva}</p>
                                    </div>
                                </div>
                                
                                <div class="row mb-3">
                                    <div class="col-6">
                                        <p class="reserva-label mb-2">Entrada:</p>
                                        <p class="reserva-dato">${reserva.fecha_inicio}</p>
                                    </div>
                                    <div class="col-6">
                                        <p class="reserva-label mb-2">Salida:</p>
                                        <p class="reserva-dato">${reserva.fecha_final}</p>
                                    </div>
                                </div>

                                <div class="row mb-3">
                                    <div class="col-6">
                                        <p class="reserva-label mb-2">Duración:</p>
                                        <p class="reserva-dato">${reserva.dias} noches</p>
                                    </div>
                                    <div class="col-6">
                                        <p class="reserva-label mb-2">Personas:</p>
                                        <p class="reserva-dato">${reserva.numero_personas}</p>
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-12">
                                        <p class="reserva-label mb-2">Precio Total:</p>
                                        <p class="reserva-precio">${reserva.precio_total} €</p>
                                    </div>
                                </div>

                                <p class="reserva-estado">${estadoTexto}</p>
                            </div>
                        </div>
                    </div>
                `;
            });

            container.innerHTML = html;
        }

        function mostrarError(mensaje) {
            const errorDiv = document.getElementById('mensajeError');
            errorDiv.textContent = mensaje;
            errorDiv.style.display = 'block';
        }
    </script>
</body>

</html>
