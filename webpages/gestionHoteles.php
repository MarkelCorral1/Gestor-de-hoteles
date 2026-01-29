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
<body>
    <?php include INCLUDES_PATH  . '/navbar.php'; ?> <!-- NAVBAR -->

        <div class="container min-vh-100 py-5">
            <h1>Gestión de Hoteles</h1>
            <div id="mensajeError" class="alert alert-danger" style="display: none;"></div>
            <div id="hotelesContainer" class="row"></div>
        </div>
        
        <!-- MODAL EDICION -->
        <div class="modal fade" id="editarHotelModal" tabindex="-1" aria-hidden="true">
        <div class="modal-dialog">
            <form method="POST" action="<?= PHP_URL ?>/editarHotel.php" class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Editar hotel</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                </div>

                <div class="modal-body">

                    <input type="hidden" name="id_hotel" id="id_hotel">

                    <div class="mb-3">
                        <label class="form-label">Pais hotel</label>
                        <input type="text" name="pais" id="edit-pais" class="form-control" required>
                    </div>

                    <div class="mb-3">
                        <label class="form-label">Ciudad hotel</label>
                        <input type="text" name="ciudad" id="edit-ciudad" class="form-control" required>
                    </div>

                    <div class="mb-3">
                        <label class="form-label">Descripcion</label>
                        <textarea type="text" name="descripcion" id="edit-descripcion" class="form-control" rows="5" required></textarea>
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
    <script src="<?= JS_URL ?>/rellenarModalHotel.js"></script>
    <script src="<?= JS_URL ?>/gestionHoteles.js"></script>
</body>

</html>