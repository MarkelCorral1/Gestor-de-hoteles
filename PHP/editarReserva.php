<?php
require_once '../config/config.php';

require_once "../bootstrap.php";
require_once '../PHP/Clases/Habitacion.php';
require_once '../PHP/Clases/HabitacionRepository.php';
require_once '../PHP/Clases/Usuario.php';
require_once '../PHP/Clases/UsuarioRepository.php';
require_once '../PHP/Clases/Hotel.php';
require_once '../PHP/Clases/HotelRepository.php';
require_once '../PHP/Clases/Categoria.php';
require_once '../PHP/Clases/CategoriaRepository.php';
require_once '../PHP/Clases/Reserva.php';
require_once '../PHP/Clases/ReservaRepository.php';


$id = $_POST['id_reserva'] ?? '';
$fecha_inicio = new DateTime($_POST['fecha_inicio']) ?? '';
$fecha_fin = new DateTime($_POST['fecha_fin']) ?? '';
$precio_total = $_POST['precio_total'] ?? '';

// Validar que la fecha de inicio sea anterior a la fecha de fin
if ($fecha_inicio >= $fecha_fin) {
    header('Location: ' . PAGINAS_URL . '/gestionUsuarios.php');
    exit();
}

$reserva = $entityManager->find('Reserva', $id);
$reserva->setFecha_inicio($fecha_inicio);
$reserva->setFecha_final($fecha_fin);
$reserva->setPrecio_total($precio_total);

$entityManager->flush();

header('Location: ' . PAGINAS_URL . '/gestionUsuarios.php');
exit();