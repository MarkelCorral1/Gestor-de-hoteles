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
    <link rel="stylesheet" href="<?= CSS_URL ?>/style.css">
</head>
<style>
    .admin-user {
        background-color: #aeffe9;
    }

    .normal-user {
        background-color: #e1fff8;
    }

    .reservas {
        background-color: rgba(0, 0, 0, 0.1);
    }
</style>

<body>
    <?php include INCLUDES_PATH  . '/navbar.php'; ?> <!-- NAVBAR -->

    <div class="container min-vh-100">
        <h1>Gestión de Usuarios</h1>
        <div class="row">
            <?php
            $usuarios = $entityManager->getRepository('Usuario')->findAll();
            foreach ($usuarios as $usuario) :
                $tipoUsuario = $usuario->getTipo() === 'admin' ? 'admin-user' : 'normal-user';
            ?>
                <div class="usuario <?= $tipoUsuario ?> col-lg-3 col-md-4 col-sm-6 p-3 border rounded">
                    <h2><?= $usuario->getUsername() ?></h2>
                    <p class="tipo"><?= $usuario->getTipo() ?></p>
                    <button
                        class="btn btn-primary btn-editar"
                        data-bs-toggle="modal"
                        data-bs-target="#editarUsuarioModal"
                        data-id="<?= $usuario->getId_usuario() ?>"
                        data-username="<?= $usuario->getUsername() ?>"
                        data-tipo="<?= $usuario->getTipo() ?>">
                        Editar
                    </button>
                    <button
                        class="btn btn-secondary"
                        data-bs-toggle="collapse"
                        data-bs-target="#reservas-<?= $usuario->getId_usuario() ?>">
                        Ver reservas
                    </button>
                    <div id="reservas-<?= $usuario->getId_usuario() ?>" class="collapse reservas rounded mt-3 p-2">
                        <?php
                        $reservas = $entityManager->getRepository('Reserva')->findBy(['id_usuario' => $usuario->getId_usuario()]);
                        foreach ($reservas as $reserva) :
                        ?>
                            <p>ID habitacion: <?= $reserva->getId_habitacion()->getId_habitacion() ?></p>
                            <p>Fecha inicio: <?= $reserva->getFecha_inicio()->format('Y-m-d') ?></p>
                            <p>Fecha final: <?= $reserva->getFecha_final()->format('Y-m-d') ?></p>
                        <?php endforeach; ?>
                    </div>
                </div>
            <?php endforeach; ?>
        </div>

    </div>

    <div class="modal fade" id="editarUsuarioModal" tabindex="-1" aria-hidden="true">
        <div class="modal-dialog">
            <form method="POST" action="<?= PHP_URL ?>/editarUsuario.php" class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Editar usuario</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                </div>

                <div class="modal-body">

                    <input type="hidden" name="id_usuario" id="edit-id">

                    <div class="mb-3">
                        <label class="form-label">Nombre de usuario</label>
                        <input type="text" name="username" id="edit-username" class="form-control" required>
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
</body>

</html>