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
    // TODO: Mirar errores
    $id_usuario = $_COOKIE['usuario'] ?? ''; // TEMPORAL
    $id_habitacion = $_COOKIE['id_habitacion'] ?? '';
    $fecha_inicio = $_COOKIE['fecha_inicio'] ?? '';
    $fecha_final = $_COOKIE['fecha_final'] ?? '';
    $numero_personas = $_COOKIE['numero_personas'] ?? '1';

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
    if ($numero_personas > $categoria->getCamas()) {
        header('Location: index.php');
        exit();
    }

    // El precio total se calcula como: precio_base_categoria * numero_dias
    $precio_total = $habitacion->getId_categoria()->getPrecio_base()
        * $fecha_inicio->diff($fecha_final)->days;
    
    $reserva = new Reserva();
    $reserva->setId_usuario($usuario);
    $reserva->setId_habitacion($habitacion);
    $reserva->setFecha_inicio($fecha_inicio);
    $reserva->setFecha_final($fecha_final);
    $reserva->setNumero_personas($numero_personas);
    $reserva->setPrecio_total($precio_total);
    $entityManager->persist($reserva);
    $entityManager->flush();

    header('Location: index.php');
    exit();
}