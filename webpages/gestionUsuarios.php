<?php
require_once "../bootstrap.php";
require_once "../PHP/Clases/Usuario.php";
require_once "../PHP/Clases/UsuarioRepository.php";
require_once "../PHP/Clases/Reserva.php";
require_once "../PHP/Clases/ReservaRepository.php";
require_once "../PHP/Clases/Habitacion.php";
require_once "../PHP/Clases/HabitacionRepository.php";
require_once "../PHP/Clases/Hotel.php";
require_once "../PHP/Clases/HotelRepository.php";
require_once "../PHP/Clases/Categoria.php";
require_once "../PHP/Clases/CategoriaRepository.php";

// Buscar el usuario en la base de datos y comprobar si es admin
$usuario = $entityManager->getRepository('Usuario')
    ->findBy(['tipo' => 'admin', 'username' => $_COOKIE["usuario"]]);

if (!$usuario) { // si no es admin
    header('Location: index.html');
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
    <link rel="stylesheet" href="../css/style.css">
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
    <div class="container">
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
                <button class="btn btn-primary">Editar</button>
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
                        <p>ID habitacion: <?= $reserva->getId_habitacion ()->getId_habitacion() ?></p>
                        <p>Fecha inicio: <?= $reserva->getFecha_inicio()->format('Y-m-d') ?></p>
                        <p>Fecha final: <?= $reserva->getFecha_final()->format('Y-m-d') ?></p>
                    <?php endforeach; ?>
                </div>
            </div>
            <?php endforeach; ?>
        </div>
            
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>