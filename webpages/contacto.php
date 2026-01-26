<?php require_once '../config/config.php'; ?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Schumacher | Colección Privada de Hoteles</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@300;400;600&family=Playfair+Display:wght@700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="<?= CSS_URL ?>">
</head>
<body>
    <?php include INCLUDES_PATH . '/navbar.php'; ?>

    <div class="contactogrid">

        <div class="formulario">
            <div class="container-form">
                <form action="<?= PHP_URL ?>/procesar_contacto.php" method="POST">
                    <div class="mb-3">
                        <div>
                            <h1>Escríbenos</h1>
                        </div>
                        <div class="form-text">Nunca compartiremos su correo electrónico con nadie más.</div>
                    </div>
                    <div class="mb-3">
                        <b>Nombre</b>
                        <label for="nombre" class="form-label"><b class="text-danger">*</b></label>
                        <input type="text" name="nombre" class="form-control" id="nombre" required>
                    </div>
                    <div class="mb-3">
                        <b>Email</b>
                        <label for="email" class="form-label"><b class="text-danger">*</b></label>
                        <input type="email" name="email" class="form-control" id="email" required>
                    </div>
                    <div class="mb-3">
                        <b>Número de teléfono</b>
                        <label for="phone" class="form-label"></label>
                        <input type="tel" name="phone" class="form-control" id="phone">
                    </div>
                    <div class="form-group">
                        <b>Cuéntanos</b>
                        <label for="cuentanos"><b class="text-danger">*</b></label>
                        <textarea class="form-control" name="cuentanos" id="cuentanos" rows="6"></textarea>
                    </div>
                    <div class="mb-3 form-check"><br>
                        <input type="checkbox" class="form-check-input" id="check" required>
                        <label class="form-check-label" for="check">
                            <b class="text-danger">* </b><b>Acepto las condiciones de tratamiento de datos.</b>
                        </label>
                    </div>
                    <div>
                        <button type="submit" class="btn btn-primary" id="boton-contacto">Enviar</button>
                    </div>
                </form>
            </div>
        </div>

        <div class="card1 container pt-5">
            <div class="card py-2">
                <h1 class="py-2 text-white text-center">Datos de contacto</h1>
                <div class="card-body">
                    <h5 class="text-white">Horario</h5>
                    <p>Abierto todos los días del año.</p></p> Check-in: 15:00h | Check-out: 12:00h.</p>

                    <h5 class="text-white pt-1">Recepción</h5>
                    <p>Servicio de atención multilingüe disponible las 24 horas.</p>

                    <h5 class="text-white pt-1">Dirección</h5>
                    <p>Calle del Gran Premio, 12, Ciudad de la Velocidad, 28005 Madrid, España.</p>

                    <h5 class="text-white pt-1">Teléfono</h5>
                    <p>+34 912 345 678 | Reservas: +34 912 345 670</p>

                    <h5 class="text-white pt-1">Email</h5>
                    <p>contacto@hotelschumacher.com | reservas@hotelschumacher.com</p>
                </div>
            </div>
        </div>

        

        <div class="footer1">
            <?php include INCLUDES_PATH . '/footer.php'; ?>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>