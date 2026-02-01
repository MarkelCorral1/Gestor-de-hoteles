<?php
require_once '../config/config.php';

require_once "../bootstrap.php";
require_once PHP_PATH . "/Clases/Usuario.php";
require_once PHP_PATH . "/Clases/UsuarioRepository.php";

// Buscar el usuario en la base de datos y comprobar si es admin
$usuario = $entityManager->getRepository('Usuario')
    ->findBy(['tipo' => 'admin', 'username' => $_COOKIE["usuario"]]);

if (!$usuario) { // si no es admin
    header('Location: index.php');
    exit();
}
?>
<!DOCTYPE html>
<html lang="en">

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
<body class="pagina-gestion">
    <?php include INCLUDES_PATH  . '/navbar.php'; ?> <!-- NAVBAR -->

        <div class="container min-vh-100 py-5">
            <h1>Gestión de Reservas</h1>

            <!-- Filtros -->
            <div class="row mb-4 p-3 bg-dark text-white rounded">
                <div class="col-lg-4 mb-3">
                    <label for="filtroCiudad" class="form-label">Filtrar por Ciudad:</label>
                    <select id="filtroCiudad" class="form-select">
                    </select>
                </div>
                <div class="col-lg-4 mb-3">
                    <label for="filtroUsuario" class="form-label">Filtrar por Usuario:</label>
                    <input type="text" id="filtroUsuario" class="form-control">
                </div>
                <div class="col-lg-2 col-6">
                    <label for="filtroPrecioMinimo" class="form-label">Precio Minimo (€):</label>
                    <input type="number" id="filtroPrecioMinimo" class="form-control" placeholder="Sin límite" min="0">
                </div>
                <div class="col-lg-2 col-6">
                    <label for="filtroPrecioMaximo" class="form-label">Precio Máximo (€):</label>
                    <input type="number" id="filtroPrecioMaximo" class="form-control" placeholder="Sin límite" min="0">
                </div>
            </div>

            <div id="mensajeError" class="alert alert-danger" style="display: none;"></div>
            <div id="reservasContainer" class="reservas-container row"></div>

            <div id="mensajeVacio" class="reservas-vacio" style="display: none;"></div>
        </div>

        <!-- MODAL EDICION -->
        <div class="modal fade" id="editarReservaModal" tabindex="-1" aria-hidden="true">
        <div class="modal-dialog">
            <form id="editarReservaForm" class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Editar reserva</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                </div>

                <div class="modal-body">

                    <input type="hidden" name="id_reserva" id="id_reserva">

                    <div class="mb-3">
                        <label class="form-label">Fecha inicio</label>
                        <input type="date" name="fecha_inicio" id="edit-fecha_inicio" class="form-control" required>
                    </div>

                    <div class="mb-3">
                        <label class="form-label">Fecha final</label>
                        <input type="date" name="fecha_fin" id="edit-fecha_fin" class="form-control" required>
                    </div>

                    <div class="mb-3">
                        <label class="form-label">Precio total</label>
                        <input type="number" name="precio_total" id="edit-precio_total" class="form-control" required>
                    </div>

                </div>

                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">
                        Cancelar
                    </button>
                    <button type="submit" class="btn btn-primary">
                        Guardar cambios
                    </button>
                </div>
            </form>
        </div>
    </div>

    <?php include INCLUDES_PATH  . '/footer.php'; ?> <!-- FOOTER -->

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
    <script src="<?= JS_URL ?>/rellenarModalReserva.js"></script>
    <script src="<?= JS_URL ?>/gestionReservas.js"></script>
</body>

</html>