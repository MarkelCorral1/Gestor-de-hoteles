<?php
require_once '../config/config.php';

require_once "../bootstrap.php";
require_once PHP_PATH . "/Clases/Usuario.php";
require_once PHP_PATH . "/Clases/UsuarioRepository.php";
require_once PHP_PATH . "/Clases/Reserva.php";
require_once PHP_PATH . "/Clases/ReservaRepository.php";
require_once PHP_PATH . "/Clases/Habitacion.php";
require_once PHP_PATH . "/Clases/HabitacionRepository.php";
require_once PHP_PATH . "/Clases/Hotel.php";
require_once PHP_PATH . "/Clases/HotelRepository.php";
require_once PHP_PATH . "/Clases/Categoria.php";
require_once PHP_PATH . "/Clases/CategoriaRepository.php";

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
<style>
    .admin-user {
        background-color: #590000 !important;
    }
</style>

<body class="pagina-gestion">
    <?php include INCLUDES_PATH  . '/navbar.php'; ?> <!-- NAVBAR -->

        <div class="container min-vh-100 py-5">
            <h1>Gestión de Usuarios</h1>

            <!-- Filtros -->
            <div class="row mb-4 p-3 bg-dark text-white rounded">
                <div class="col-lg-4 mb-3">
                    <label for="filtroTipo" class="form-label">Filtrar por Tipo:</label>
                    <select id="filtroTipo" class="form-select">
                        <option value="">Todos</option>
                        <option value="admin">Admin</option>
                        <option value="normal">Normal</option>
                    </select>
                </div>
                <div class="col-lg-4 mb-3">
                    <label for="filtroUsername" class="form-label">Filtrar por Nombre:</label>
                    <input type="text" id="filtroUsername" class="form-control">
                </div>
                <div class="col-lg-4 mb-3">
                    <label for="filtroEmail" class="form-label">Filtrar por Email:</label>
                    <input type="text" id="filtroEmail" class="form-control">
                </div>
            </div>

            <div id="mensajeError" class="alert alert-danger" style="display: none;"></div>
            <div id="usuariosContainer" class="row"></div>

            <div id="mensajeVacio" class="reservas-vacio" style="display: none;"></div>
        </div>

        <div class="modal fade" id="editarUsuarioModal" tabindex="-1" aria-hidden="true">
        <div class="modal-dialog">
            <form id="editarUsuarioForm" class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Editar usuario</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                </div>

                <div class="modal-body">

                    <input type="hidden" name="id_usuario" id="id_usuario">

                    <div class="mb-3">
                        <label class="form-label">Nombre de usuario</label>
                        <input type="text" name="username" id="edit-username" class="form-control" required>
                    </div>

                    <div class="mb-3">
                        <label class="form-label">Email</label>
                        <input type="email" name="email" id="edit-email" class="form-control" required>
                    </div>

                    <div class="mb-3">
                        <label class="form-label">Tipo</label>
                        <select name="tipo" id="edit-tipo" class="form-select">
                            <option value="admin">Admin</option>
                            <option value="normal">Normal</option>
                        </select>
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
    <script src="<?= JS_URL ?>/rellenarModalUsuario.js"></script>
    <script src="<?= JS_URL ?>/gestionUsuarios.js"></script>
</body>

</html>