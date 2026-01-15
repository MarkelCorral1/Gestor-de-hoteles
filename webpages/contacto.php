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

        <div class="contactogrid">
            <div class="cabecera mt-5">
                <h1>Contacto</h1>
            </div>
            <div class="formulario">
                <div class="container-form d-flex justify-content-center align-items-center min-vh-100">
                    <form class="">
                        <div class="mb-3">
                            <div>
                                <h1>Escríbenos</h1>
                            </div>
                            <div class="form-text">Nunca compartiremos su correo electrónico con nadie más.</div>
                        </div>
                        <div class="mb-3">
                            <b>Nombre</b>
                            <label for="nombre" class="form-label"><b class="text-danger">*</b></label>
                            <input type="text" class="form-control" id="" required>
                        </div>
                        <div class="mb-3">
                            <b>Email</b>
                            <label for="email" class="form-label"><b class="text-danger">*</b></label>
                            <input type="email" class="form-control" id="" required>
                        </div>
                        <div class="mb-3">
                            <b>Número de teléfono</b>
                            <label for="phone" class="form-label"></label>
                            <input type="phone" class="form-control" id="">
                        </div>
                        <div class="form-group">
                            <b>Cuéntanos</b>
                            <label for="cuentanos"><b class="text-danger">*</b></label>
                            <textarea class="form-control" id="cuentanos" rows="3"></textarea>
                        </div>
                        <div class="mb-3 form-check"><br>
                            <input type="checkbox" class="form-check-input" id="" required>
                            <label class="form-check-label" for="checkbox"><b class="text-danger">* </b><b>Acepto las
                                    condiciones de tratamiento de datos.</b></label>
                        </div>
                        <div>
                            <button type="submit" class="btn btn-primary" required>Enviar</button>
                        </div>
                    </form>
                </div>
            </div>
            <div class="card1">
                <h1>Datos de contacto</h1>
                <div class="card">
                    <div class="card-body">
                        <h5>Examp</h5>
                        <p>Aquí ira la imnformación de contacto del hotel</p>
                    </div>
                </div>
            </div>
            <div class="card2">
                <h1>Información general</h1>
                <div class="card">
                    <div class="card-body">
                        <h5>Example</h5>
                        <p>Aquí ira la imnformación de contacto del hotel</p>
                    </div>
                </div>
            </div>
        </div>

        <?php include INCLUDES_PATH  . '/footer.php'; ?> <!-- FOOTER -->

        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
    </body>

    </html>
</body>

</html>