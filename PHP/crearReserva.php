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

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    // TODO: EL ID_USUARIO HABRA QUE OBTENERLO DE LA SESION
    $id_usuario = $_POST['id_usuario'] ?? ''; // TEMPORAL
    $id_habitacion = $_POST['id_habitacion'] ?? '';
    $fecha_inicio = $_POST['fecha_inicio'] ?? '';
    $fecha_final = $_POST['fecha_final'] ?? '';
    $numero_personas = $_POST['numero_personas'] ?? '1';

    // Pasar fechas a formato DateTime
    $fecha_inicio = new DateTime($fecha_inicio);
    $fecha_final = new DateTime($fecha_final);

    if ($fecha_inicio >= $fecha_final) {
        header('Location: index.php');
        exit();
    }

    // Comprobar si la habitacion ya esta reservada en esas fechas
    $disponible = $entityManager->getRepository(Reserva::class)
        ->comprobarDisponibilidad($fecha_inicio->format('Y-m-d'), $fecha_final->format('Y-m-d'), $id_habitacion);

    if (!$disponible) {
        header('Location: index.php');
        exit();
    }

    
    $usuario = $entityManager->find(Usuario::class, $id_usuario);
    $habitacion = $entityManager->find(Habitacion::class, $id_habitacion);

    // Comprobar que hay suficientes camas en la habitacion
    if ($numero_personas > $habitacion->getCamas()) {
        header('Location: index.php');
        exit();
    }

    // TODO: Habra que crear una columna precio_total en la tabla reserva y calcular el precio segun: precio_base de categoria * metros_cuadrados * 0.1 * noches
    
    $reserva = new Reserva();
    $reserva->setId_usuario($usuario);
    $reserva->setId_habitacion($habitacion);
    $reserva->setFecha_inicio($fecha_inicio);
    $reserva->setFecha_final($fecha_final);
    $reserva->setNumero_personas($numero_personas);
    $entityManager->persist($reserva);
    $entityManager->flush();

    header('Location: prueba.php');
    exit();
}